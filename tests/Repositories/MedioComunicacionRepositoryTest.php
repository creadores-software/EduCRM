<?php namespace Tests\Repositories;

use App\Models\Parametros\MedioComunicacion;
use App\Repositories\Parametros\MedioComunicacionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class MedioComunicacionRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var MedioComunicacionRepository
     */
    protected $medioComunicacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->medioComunicacionRepo = \App::make(MedioComunicacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_medio_comunicacion()
    {
        $medioComunicacion = factory(MedioComunicacion::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.mediosComunicacion.store');
        $response = $this->post($url, $medioComunicacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoMedioComunicacion = MedioComunicacion::latest()->first()->toArray();
        $this->assertModelData($medioComunicacion, $objetoMedioComunicacion,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $medioComunicacion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_medio_comunicacion()
    {
        $medioComunicacion = factory(MedioComunicacion::class)->create();
        $dbMedioComunicacion = $this->medioComunicacionRepo->find($medioComunicacion->id);
        $dbMedioComunicacion = $dbMedioComunicacion->toArray();
        $this->assertModelData($medioComunicacion->toArray(), $dbMedioComunicacion);
    }

    /**
     * @test editar
     */
    public function test_editar_medio_comunicacion()
    {
        //Se crea un objeto y se generan datos para edición  
        $medioComunicacion = factory(MedioComunicacion::class)->create();
        $fakeMedioComunicacion = factory(MedioComunicacion::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.mediosComunicacion.update', $medioComunicacion->id);
        $response = $this->patch($url,$fakeMedioComunicacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoMedioComunicacion = MedioComunicacion::find($medioComunicacion->id);
        $this->assertModelData($fakeMedioComunicacion, $objetoMedioComunicacion->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $medioComunicacion = factory(MedioComunicacion::class)->create(); 
        $url = route('parametros.mediosComunicacion.update', $medioComunicacion->id);
        $response = $this->patch($url, $fakeMedioComunicacion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_medio_comunicacion()
    {
        $medioComunicacion = factory(MedioComunicacion::class)->create();
        $resp = $this->medioComunicacionRepo->delete($medioComunicacion->id);
        $this->assertNull(MedioComunicacion::find($medioComunicacion->id), 'El modelo no debe existir en BD.');
    }
}
