<?php namespace Tests\Repositories;

use App\Models\Parametros\TipoParentesco;
use App\Repositories\Parametros\TipoParentescoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TipoParentescoRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var TipoParentescoRepository
     */
    protected $tipoParentescoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoParentescoRepo = \App::make(TipoParentescoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_parentesco()
    {
        $tipoParentesco = factory(TipoParentesco::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.tiposParentesco.store');
        $response = $this->post($url, $tipoParentesco); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoTipoParentesco = TipoParentesco::latest()->first()->toArray();
        $this->assertModelData($tipoParentesco, $objetoTipoParentesco,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $tipoParentesco); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_parentesco()
    {
        $tipoParentesco = factory(TipoParentesco::class)->create();
        $dbTipoParentesco = $this->tipoParentescoRepo->find($tipoParentesco->id);
        $dbTipoParentesco = $dbTipoParentesco->toArray();
        $this->assertModelData($tipoParentesco->toArray(), $dbTipoParentesco);
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_parentesco()
    {
        //Se crea un objeto y se generan datos para edición  
        $tipoParentesco = factory(TipoParentesco::class)->create();
        $fakeTipoParentesco = factory(TipoParentesco::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.tiposParentesco.update', $tipoParentesco->id);
        $response = $this->patch($url,$fakeTipoParentesco); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoTipoParentesco = TipoParentesco::find($tipoParentesco->id);
        $this->assertModelData($fakeTipoParentesco, $objetoTipoParentesco->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $tipoParentesco = factory(TipoParentesco::class)->create(); 
        $url = route('parametros.tiposParentesco.update', $tipoParentesco->id);
        $response = $this->patch($url, $fakeTipoParentesco); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_parentesco()
    {
        $tipoParentesco = factory(TipoParentesco::class)->create();
        $resp = $this->tipoParentescoRepo->delete($tipoParentesco->id);
        $this->assertNull(TipoParentesco::find($tipoParentesco->id), 'El modelo no debe existir en BD.');
    }
}
