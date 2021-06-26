<?php namespace Tests\Repositories;

use App\Models\Campanias\EstadoInteraccion;
use App\Repositories\Campanias\EstadoInteraccionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EstadoInteraccionRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var EstadoInteraccionRepository
     */
    protected $estadoInteraccionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estadoInteraccionRepo = \App::make(EstadoInteraccionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_estado_interaccion()
    {
        $estadoInteraccion = factory(EstadoInteraccion::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('campanias.estadosInteraccion.store');
        $response = $this->post($url, $estadoInteraccion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoEstadoInteraccion = EstadoInteraccion::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($estadoInteraccion, $objetoEstadoInteraccion),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $estadoInteraccion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_estado_interaccion()
    {
        $estadoInteraccion = factory(EstadoInteraccion::class)->create();
        $dbEstadoInteraccion = $this->estadoInteraccionRepo->find($estadoInteraccion->id);
        $dbEstadoInteraccion = $dbEstadoInteraccion->toArray();
        $this->assertTrue($this->sonDatosIguales($estadoInteraccion->toArray(),$dbEstadoInteraccion),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_estado_interaccion()
    {
        //Se crea un objeto y se generan datos para edición  
        $estadoInteraccion = factory(EstadoInteraccion::class)->create();
        $fakeEstadoInteraccion = factory(EstadoInteraccion::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('campanias.estadosInteraccion.update', $estadoInteraccion->id);
        $response = $this->patch($url,$fakeEstadoInteraccion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoEstadoInteraccion = EstadoInteraccion::find($estadoInteraccion->id);
        $this->assertTrue($this->sonDatosIguales($fakeEstadoInteraccion, $objetoEstadoInteraccion->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_estado_interaccion()
    {
        $estadoInteraccion = factory(EstadoInteraccion::class)->create();
        $resp = $this->estadoInteraccionRepo->delete($estadoInteraccion->id);
        $this->assertNull(EstadoInteraccion::find($estadoInteraccion->id), 'El modelo no debe existir en BD.');
    }
}
