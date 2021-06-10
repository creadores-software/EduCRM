<?php namespace Tests\Repositories;

use App\Models\Parametros\ActividadOcio;
use App\Repositories\Parametros\ActividadOcioRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ActividadOcioRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var ActividadOcioRepository
     */
    protected $actividadOcioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->actividadOcioRepo = \App::make(ActividadOcioRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_actividad_ocio()
    {
        $actividadOcio = factory(ActividadOcio::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.actividadesOcio.store');
        $response = $this->post($url, $actividadOcio); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoActividadOcio = ActividadOcio::latest()->first()->toArray();
        $this->assertModelData($actividadOcio, $objetoActividadOcio,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $actividadOcio); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_actividad_ocio()
    {
        $actividadOcio = factory(ActividadOcio::class)->create();
        $dbActividadOcio = $this->actividadOcioRepo->find($actividadOcio->id);
        $dbActividadOcio = $dbActividadOcio->toArray();
        $this->assertModelData($actividadOcio->toArray(), $dbActividadOcio);
    }

    /**
     * @test editar
     */
    public function test_editar_actividad_ocio()
    {
        //Se crea un objeto y se generan datos para edición  
        $actividadOcio = factory(ActividadOcio::class)->create();
        $fakeActividadOcio = factory(ActividadOcio::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.actividadesOcio.update', $actividadOcio->id);
        $response = $this->patch($url,$fakeActividadOcio); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoActividadOcio = ActividadOcio::find($actividadOcio->id);
        $this->assertModelData($fakeActividadOcio, $objetoActividadOcio->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $actividadOcio = factory(ActividadOcio::class)->create(); 
        $url = route('parametros.actividadesOcio.update', $actividadOcio->id);
        $response = $this->patch($url, $fakeActividadOcio); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_actividad_ocio()
    {
        $actividadOcio = factory(ActividadOcio::class)->create();
        $resp = $this->actividadOcioRepo->delete($actividadOcio->id);
        $this->assertNull(ActividadOcio::find($actividadOcio->id), 'El modelo no debe existir en BD.');
    }
}
