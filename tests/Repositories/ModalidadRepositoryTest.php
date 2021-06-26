<?php namespace Tests\Repositories;

use App\Models\Formaciones\Modalidad;
use App\Repositories\Formaciones\ModalidadRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ModalidadRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var ModalidadRepository
     */
    protected $modalidadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->modalidadRepo = \App::make(ModalidadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_modalidad()
    {
        $modalidad = factory(Modalidad::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('formaciones.modalidades.store');
        $response = $this->post($url, $modalidad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoModalidad = Modalidad::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($modalidad, $objetoModalidad),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $modalidad); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_modalidad()
    {
        $modalidad = factory(Modalidad::class)->create();
        $dbModalidad = $this->modalidadRepo->find($modalidad->id);
        $dbModalidad = $dbModalidad->toArray();
        $this->assertTrue($this->sonDatosIguales($modalidad->toArray(),$dbModalidad),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_modalidad()
    {
        //Se crea un objeto y se generan datos para edición  
        $modalidad = factory(Modalidad::class)->create();
        $fakeModalidad = factory(Modalidad::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('formaciones.modalidades.update', $modalidad->id);
        $response = $this->patch($url,$fakeModalidad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoModalidad = Modalidad::find($modalidad->id);
        $this->assertTrue($this->sonDatosIguales($fakeModalidad, $objetoModalidad->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_modalidad()
    {
        $modalidad = factory(Modalidad::class)->create();
        $resp = $this->modalidadRepo->delete($modalidad->id);
        $this->assertNull(Modalidad::find($modalidad->id), 'El modelo no debe existir en BD.');
    }
}
