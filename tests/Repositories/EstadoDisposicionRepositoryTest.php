<?php namespace Tests\Repositories;

use App\Models\Parametros\EstadoDisposicion;
use App\Repositories\Parametros\EstadoDisposicionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EstadoDisposicionRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var EstadoDisposicionRepository
     */
    protected $estadoDisposicionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estadoDisposicionRepo = \App::make(EstadoDisposicionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_estado_disposicion()
    {
        $estadoDisposicion = factory(EstadoDisposicion::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.estadosDisposicion.store');
        $response = $this->post($url, $estadoDisposicion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoEstadoDisposicion = EstadoDisposicion::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($estadoDisposicion, $objetoEstadoDisposicion),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $estadoDisposicion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_estado_disposicion()
    {
        $estadoDisposicion = factory(EstadoDisposicion::class)->create();
        $dbEstadoDisposicion = $this->estadoDisposicionRepo->find($estadoDisposicion->id);
        $dbEstadoDisposicion = $dbEstadoDisposicion->toArray();
        $this->assertTrue($this->sonDatosIguales($estadoDisposicion->toArray(),$dbEstadoDisposicion),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_estado_disposicion()
    {
        //Se crea un objeto y se generan datos para edición  
        $estadoDisposicion = factory(EstadoDisposicion::class)->create();
        $fakeEstadoDisposicion = factory(EstadoDisposicion::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.estadosDisposicion.update', $estadoDisposicion->id);
        $response = $this->patch($url,$fakeEstadoDisposicion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoEstadoDisposicion = EstadoDisposicion::find($estadoDisposicion->id);
        $this->assertTrue($this->sonDatosIguales($fakeEstadoDisposicion, $objetoEstadoDisposicion->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_estado_disposicion()
    {
        $estadoDisposicion = factory(EstadoDisposicion::class)->create();
        $resp = $this->estadoDisposicionRepo->delete($estadoDisposicion->id);
        $this->assertNull(EstadoDisposicion::find($estadoDisposicion->id), 'El modelo no debe existir en BD.');
    }
}
