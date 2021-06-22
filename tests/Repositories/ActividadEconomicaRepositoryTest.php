<?php namespace Tests\Repositories;

use App\Models\Entidades\ActividadEconomica;
use App\Repositories\Entidades\ActividadEconomicaRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ActividadEconomicaRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var ActividadEconomicaRepository
     */
    protected $actividadEconomicaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->actividadEconomicaRepo = \App::make(ActividadEconomicaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_actividad_economica()
    {
        $actividadEconomica = factory(ActividadEconomica::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('entidades.actividadesEconomicas.store');
        $response = $this->post($url, $actividadEconomica); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoActividadEconomica = ActividadEconomica::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($actividadEconomica, $objetoActividadEconomica),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $actividadEconomica); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_actividad_economica()
    {
        $actividadEconomica = factory(ActividadEconomica::class)->create();
        $dbActividadEconomica = $this->actividadEconomicaRepo->find($actividadEconomica->id);
        $dbActividadEconomica = $dbActividadEconomica->toArray();
        $this->assertTrue($this->sonDatosIguales($actividadEconomica->toArray(),$dbActividadEconomica),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_actividad_economica()
    {
        //Se crea un objeto y se generan datos para edición  
        $actividadEconomica = factory(ActividadEconomica::class)->create();
        $fakeActividadEconomica = factory(ActividadEconomica::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('entidades.actividadesEconomicas.update', $actividadEconomica->id);
        $response = $this->patch($url,$fakeActividadEconomica); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoActividadEconomica = ActividadEconomica::find($actividadEconomica->id);
        $this->assertTrue($this->sonDatosIguales($fakeActividadEconomica, $objetoActividadEconomica->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_actividad_economica()
    {
        $actividadEconomica = factory(ActividadEconomica::class)->create();
        $resp = $this->actividadEconomicaRepo->delete($actividadEconomica->id);
        $this->assertNull(ActividadEconomica::find($actividadEconomica->id), 'El modelo no debe existir en BD.');
    }
}
