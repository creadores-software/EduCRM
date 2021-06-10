<?php namespace Tests\Repositories;

use App\Models\Campanias\TipoEstadoColor;
use App\Repositories\Campanias\TipoEstadoColorRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TipoEstadoColorRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var TipoEstadoColorRepository
     */
    protected $tipoEstadoColorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoEstadoColorRepo = \App::make(TipoEstadoColorRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_estado_color()
    {
        $tipoEstadoColor = factory(TipoEstadoColor::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('campanias.tiposEstadoColor.store');
        $response = $this->post($url, $tipoEstadoColor); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoTipoEstadoColor = TipoEstadoColor::latest()->first()->toArray();
        $this->assertModelData($tipoEstadoColor, $objetoTipoEstadoColor,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $tipoEstadoColor); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_estado_color()
    {
        $tipoEstadoColor = factory(TipoEstadoColor::class)->create();
        $dbTipoEstadoColor = $this->tipoEstadoColorRepo->find($tipoEstadoColor->id);
        $dbTipoEstadoColor = $dbTipoEstadoColor->toArray();
        $this->assertModelData($tipoEstadoColor->toArray(), $dbTipoEstadoColor);
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_estado_color()
    {
        //Se crea un objeto y se generan datos para edición  
        $tipoEstadoColor = factory(TipoEstadoColor::class)->create();
        $fakeTipoEstadoColor = factory(TipoEstadoColor::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('campanias.tiposEstadoColor.update', $tipoEstadoColor->id);
        $response = $this->patch($url,$fakeTipoEstadoColor); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoTipoEstadoColor = TipoEstadoColor::find($tipoEstadoColor->id);
        $this->assertModelData($fakeTipoEstadoColor, $objetoTipoEstadoColor->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $tipoEstadoColor = factory(TipoEstadoColor::class)->create(); 
        $url = route('campanias.tiposEstadoColor.update', $tipoEstadoColor->id);
        $response = $this->patch($url, $fakeTipoEstadoColor); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_estado_color()
    {
        $tipoEstadoColor = factory(TipoEstadoColor::class)->create();
        $resp = $this->tipoEstadoColorRepo->delete($tipoEstadoColor->id);
        $this->assertNull(TipoEstadoColor::find($tipoEstadoColor->id), 'El modelo no debe existir en BD.');
    }
}
