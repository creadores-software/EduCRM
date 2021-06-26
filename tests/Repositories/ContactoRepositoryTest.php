<?php namespace Tests\Repositories;

use App\Models\Contactos\Contacto;
use App\Repositories\Contactos\ContactoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ContactoRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var ContactoRepository
     */
    protected $contactoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->contactoRepo = \App::make(ContactoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_contacto()
    {
        $contacto = factory(Contacto::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('contactos.contactos.store');
        $response = $this->post($url, $contacto); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();            
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoContacto = Contacto::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($contacto, $objetoContacto),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $contacto); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_contacto()
    {
        $contacto = factory(Contacto::class)->create();
        $dbContacto = $this->contactoRepo->find($contacto->id);
        $dbContacto = $dbContacto->toArray();
        $this->assertTrue($this->sonDatosIguales($contacto->toArray(),$dbContacto),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_contacto()
    {
        //Se crea un objeto y se generan datos para edición  
        $contacto = factory(Contacto::class)->create();
        $fakeContacto = factory(Contacto::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('contactos.contactos.update', $contacto->id);
        $response = $this->patch($url,$fakeContacto); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoContacto = Contacto::find($contacto->id);
        $this->assertTrue($this->sonDatosIguales($fakeContacto, $objetoContacto->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_contacto()
    {
        $contacto = factory(Contacto::class)->create();
        $resp = $this->contactoRepo->delete($contacto->id);
        $this->assertNull(Contacto::find($contacto->id), 'El modelo no debe existir en BD.');
    }
}
