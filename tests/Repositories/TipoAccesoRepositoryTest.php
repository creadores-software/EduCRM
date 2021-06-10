<?php namespace Tests\Repositories;

use App\Models\Formaciones\TipoAcceso;
use App\Repositories\Formaciones\TipoAccesoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TipoAccesoRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var TipoAccesoRepository
     */
    protected $tipoAccesoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoAccesoRepo = \App::make(TipoAccesoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_acceso()
    {
        $tipoAcceso = factory(TipoAcceso::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('formaciones.tiposAcceso.store');
        $response = $this->post($url, $tipoAcceso); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoTipoAcceso = TipoAcceso::latest()->first()->toArray();
        $this->assertModelData($tipoAcceso, $objetoTipoAcceso,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $tipoAcceso); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_acceso()
    {
        $tipoAcceso = factory(TipoAcceso::class)->create();
        $dbTipoAcceso = $this->tipoAccesoRepo->find($tipoAcceso->id);
        $dbTipoAcceso = $dbTipoAcceso->toArray();
        $this->assertModelData($tipoAcceso->toArray(), $dbTipoAcceso);
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_acceso()
    {
        //Se crea un objeto y se generan datos para edición  
        $tipoAcceso = factory(TipoAcceso::class)->create();
        $fakeTipoAcceso = factory(TipoAcceso::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('formaciones.tiposAcceso.update', $tipoAcceso->id);
        $response = $this->patch($url,$fakeTipoAcceso); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoTipoAcceso = TipoAcceso::find($tipoAcceso->id);
        $this->assertModelData($fakeTipoAcceso, $objetoTipoAcceso->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $tipoAcceso = factory(TipoAcceso::class)->create(); 
        $url = route('formaciones.tiposAcceso.update', $tipoAcceso->id);
        $response = $this->patch($url, $fakeTipoAcceso); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_acceso()
    {
        $tipoAcceso = factory(TipoAcceso::class)->create();
        $resp = $this->tipoAccesoRepo->delete($tipoAcceso->id);
        $this->assertNull(TipoAcceso::find($tipoAcceso->id), 'El modelo no debe existir en BD.');
    }
}
