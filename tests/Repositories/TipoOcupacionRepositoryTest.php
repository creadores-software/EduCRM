<?php namespace Tests\Repositories;

use App\Models\Entidades\TipoOcupacion;
use App\Repositories\Entidades\TipoOcupacionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TipoOcupacionRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var TipoOcupacionRepository
     */
    protected $tipoOcupacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoOcupacionRepo = \App::make(TipoOcupacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_ocupacion()
    {
        $tipoOcupacion = factory(TipoOcupacion::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('entidades.tiposOcupacion.store');
        $response = $this->post($url, $tipoOcupacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoTipoOcupacion = TipoOcupacion::latest()->first()->toArray();
        $this->assertModelData($tipoOcupacion, $objetoTipoOcupacion,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $tipoOcupacion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_ocupacion()
    {
        $tipoOcupacion = factory(TipoOcupacion::class)->create();
        $dbTipoOcupacion = $this->tipoOcupacionRepo->find($tipoOcupacion->id);
        $dbTipoOcupacion = $dbTipoOcupacion->toArray();
        $this->assertModelData($tipoOcupacion->toArray(), $dbTipoOcupacion);
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_ocupacion()
    {
        //Se crea un objeto y se generan datos para edición  
        $tipoOcupacion = factory(TipoOcupacion::class)->create();
        $fakeTipoOcupacion = factory(TipoOcupacion::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('entidades.tiposOcupacion.update', $tipoOcupacion->id);
        $response = $this->patch($url,$fakeTipoOcupacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoTipoOcupacion = TipoOcupacion::find($tipoOcupacion->id);
        $this->assertModelData($fakeTipoOcupacion, $objetoTipoOcupacion->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $tipoOcupacion = factory(TipoOcupacion::class)->create(); 
        $url = route('entidades.tiposOcupacion.update', $tipoOcupacion->id);
        $response = $this->patch($url, $fakeTipoOcupacion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_ocupacion()
    {
        $tipoOcupacion = factory(TipoOcupacion::class)->create();
        $resp = $this->tipoOcupacionRepo->delete($tipoOcupacion->id);
        $this->assertNull(TipoOcupacion::find($tipoOcupacion->id), 'El modelo no debe existir en BD.');
    }
}
