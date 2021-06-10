<?php namespace Tests\Repositories;

use App\Models\Formaciones\NivelFormacion;
use App\Repositories\Formaciones\NivelFormacionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class NivelFormacionRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var NivelFormacionRepository
     */
    protected $nivelFormacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->nivelFormacionRepo = \App::make(NivelFormacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_nivel_formacion()
    {
        $nivelFormacion = factory(NivelFormacion::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('formaciones.nivelesFormacion.store');
        $response = $this->post($url, $nivelFormacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoNivelFormacion = NivelFormacion::latest()->first()->toArray();
        $this->assertModelData($nivelFormacion, $objetoNivelFormacion,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $nivelFormacion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_nivel_formacion()
    {
        $nivelFormacion = factory(NivelFormacion::class)->create();
        $dbNivelFormacion = $this->nivelFormacionRepo->find($nivelFormacion->id);
        $dbNivelFormacion = $dbNivelFormacion->toArray();
        $this->assertModelData($nivelFormacion->toArray(), $dbNivelFormacion);
    }

    /**
     * @test editar
     */
    public function test_editar_nivel_formacion()
    {
        //Se crea un objeto y se generan datos para edición  
        $nivelFormacion = factory(NivelFormacion::class)->create();
        $fakeNivelFormacion = factory(NivelFormacion::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('formaciones.nivelesFormacion.update', $nivelFormacion->id);
        $response = $this->patch($url,$fakeNivelFormacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoNivelFormacion = NivelFormacion::find($nivelFormacion->id);
        $this->assertModelData($fakeNivelFormacion, $objetoNivelFormacion->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $nivelFormacion = factory(NivelFormacion::class)->create(); 
        $url = route('formaciones.nivelesFormacion.update', $nivelFormacion->id);
        $response = $this->patch($url, $fakeNivelFormacion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_nivel_formacion()
    {
        $nivelFormacion = factory(NivelFormacion::class)->create();
        $resp = $this->nivelFormacionRepo->delete($nivelFormacion->id);
        $this->assertNull(NivelFormacion::find($nivelFormacion->id), 'El modelo no debe existir en BD.');
    }
}
