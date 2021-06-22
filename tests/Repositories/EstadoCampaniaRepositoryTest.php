<?php namespace Tests\Repositories;

use App\Models\Campanias\EstadoCampania;
use App\Repositories\Campanias\EstadoCampaniaRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EstadoCampaniaRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var EstadoCampaniaRepository
     */
    protected $estadoCampaniaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estadoCampaniaRepo = \App::make(EstadoCampaniaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_estado_campania()
    {
        $estadoCampania = factory(EstadoCampania::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('campanias.estadosCampania.store');
        $response = $this->post($url, $estadoCampania); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoEstadoCampania = EstadoCampania::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($estadoCampania, $objetoEstadoCampania),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $estadoCampania); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_estado_campania()
    {
        $estadoCampania = factory(EstadoCampania::class)->create();
        $dbEstadoCampania = $this->estadoCampaniaRepo->find($estadoCampania->id);
        $dbEstadoCampania = $dbEstadoCampania->toArray();
        $this->assertTrue($this->sonDatosIguales($estadoCampania->toArray(),$dbEstadoCampania),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_estado_campania()
    {
        //Se crea un objeto y se generan datos para edición  
        $estadoCampania = factory(EstadoCampania::class)->create();
        $fakeEstadoCampania = factory(EstadoCampania::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('campanias.estadosCampania.update', $estadoCampania->id);
        $response = $this->patch($url,$fakeEstadoCampania); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoEstadoCampania = EstadoCampania::find($estadoCampania->id);
        $this->assertTrue($this->sonDatosIguales($fakeEstadoCampania, $objetoEstadoCampania->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_estado_campania()
    {
        $estadoCampania = factory(EstadoCampania::class)->create();
        $resp = $this->estadoCampaniaRepo->delete($estadoCampania->id);
        $this->assertNull(EstadoCampania::find($estadoCampania->id), 'El modelo no debe existir en BD.');
    }
}
