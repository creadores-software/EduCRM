<?php namespace Tests\Repositories;

use App\Models\Parametros\ActitudServicio;
use App\Repositories\Parametros\ActitudServicioRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ActitudServicioRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var ActitudServicioRepository
     */
    protected $actitudServicioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->actitudServicioRepo = \App::make(ActitudServicioRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_actitud_servicio()
    {
        $actitudServicio = factory(ActitudServicio::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.actitudesServicio.store');
        $response = $this->post($url, $actitudServicio); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoActitudServicio = ActitudServicio::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($actitudServicio, $objetoActitudServicio),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $actitudServicio); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_actitud_servicio()
    {
        $actitudServicio = factory(ActitudServicio::class)->create();
        $dbActitudServicio = $this->actitudServicioRepo->find($actitudServicio->id);
        $dbActitudServicio = $dbActitudServicio->toArray();
        $this->assertTrue($this->sonDatosIguales($actitudServicio->toArray(),$dbActitudServicio),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_actitud_servicio()
    {
        //Se crea un objeto y se generan datos para edición  
        $actitudServicio = factory(ActitudServicio::class)->create();
        $fakeActitudServicio = factory(ActitudServicio::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.actitudesServicio.update', $actitudServicio->id);
        $response = $this->patch($url,$fakeActitudServicio); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoActitudServicio = ActitudServicio::find($actitudServicio->id);
        $this->assertTrue($this->sonDatosIguales($fakeActitudServicio, $objetoActitudServicio->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_actitud_servicio()
    {
        $actitudServicio = factory(ActitudServicio::class)->create();
        $resp = $this->actitudServicioRepo->delete($actitudServicio->id);
        $this->assertNull(ActitudServicio::find($actitudServicio->id), 'El modelo no debe existir en BD.');
    }
}
