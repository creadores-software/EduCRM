<?php namespace Tests\Repositories;

use App\Models\Contactos\InformacionEscolar;
use App\Repositories\Contactos\InformacionEscolarRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class InformacionEscolarRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var InformacionEscolarRepository
     */
    protected $informacionEscolarRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->informacionEscolarRepo = \App::make(InformacionEscolarRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_informacion_escolar()
    {
        $informacionEscolar = factory(InformacionEscolar::class)->make()->toArray();
        $informacionEscolar['testRepository']=true;
        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('contactos.informacionesEscolares.store');
        $response = $this->post($url, $informacionEscolar); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoInformacionEscolar = InformacionEscolar::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($informacionEscolar, $objetoInformacionEscolar),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        unset($informacionEscolar['testRepository']);
        $response = $this->post($url, $informacionEscolar); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_informacion_escolar()
    {
        $informacionEscolar = factory(InformacionEscolar::class)->create();
        $dbInformacionEscolar = $this->informacionEscolarRepo->find($informacionEscolar->id);
        $dbInformacionEscolar = $dbInformacionEscolar->toArray();
        $this->assertTrue($this->sonDatosIguales($informacionEscolar->toArray(),$dbInformacionEscolar),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_informacion_escolar()
    {
        //Se crea un objeto y se generan datos para edición  
        $informacionEscolar = factory(InformacionEscolar::class)->create();
        $fakeInformacionEscolar = factory(InformacionEscolar::class)->make()->toArray();  
        $fakeInformacionEscolar['testRepository']=true;
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('contactos.informacionesEscolares.update', $informacionEscolar->id);
        $response = $this->patch($url,$fakeInformacionEscolar); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoInformacionEscolar = InformacionEscolar::find($informacionEscolar->id);
        $this->assertTrue($this->sonDatosIguales($fakeInformacionEscolar, $objetoInformacionEscolar->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_informacion_escolar()
    {
        $informacionEscolar = factory(InformacionEscolar::class)->create();
        $resp = $this->informacionEscolarRepo->delete($informacionEscolar->id);
        $this->assertNull(InformacionEscolar::find($informacionEscolar->id), 'El modelo no debe existir en BD.');
    }
}
