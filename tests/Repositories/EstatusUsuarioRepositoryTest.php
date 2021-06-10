<?php namespace Tests\Repositories;

use App\Models\Parametros\EstatusUsuario;
use App\Repositories\Parametros\EstatusUsuarioRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EstatusUsuarioRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var EstatusUsuarioRepository
     */
    protected $estatusUsuarioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estatusUsuarioRepo = \App::make(EstatusUsuarioRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_estatus_usuario()
    {
        $estatusUsuario = factory(EstatusUsuario::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.estatusUsuario.store');
        $response = $this->post($url, $estatusUsuario); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoEstatusUsuario = EstatusUsuario::latest()->first()->toArray();
        $this->assertModelData($estatusUsuario, $objetoEstatusUsuario,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $estatusUsuario); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_estatus_usuario()
    {
        $estatusUsuario = factory(EstatusUsuario::class)->create();
        $dbEstatusUsuario = $this->estatusUsuarioRepo->find($estatusUsuario->id);
        $dbEstatusUsuario = $dbEstatusUsuario->toArray();
        $this->assertModelData($estatusUsuario->toArray(), $dbEstatusUsuario);
    }

    /**
     * @test editar
     */
    public function test_editar_estatus_usuario()
    {
        //Se crea un objeto y se generan datos para edición  
        $estatusUsuario = factory(EstatusUsuario::class)->create();
        $fakeEstatusUsuario = factory(EstatusUsuario::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.estatusUsuario.update', $estatusUsuario->id);
        $response = $this->patch($url,$fakeEstatusUsuario); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoEstatusUsuario = EstatusUsuario::find($estatusUsuario->id);
        $this->assertModelData($fakeEstatusUsuario, $objetoEstatusUsuario->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $estatusUsuario = factory(EstatusUsuario::class)->create(); 
        $url = route('parametros.estatusUsuario.update', $estatusUsuario->id);
        $response = $this->patch($url, $fakeEstatusUsuario); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_estatus_usuario()
    {
        $estatusUsuario = factory(EstatusUsuario::class)->create();
        $resp = $this->estatusUsuarioRepo->delete($estatusUsuario->id);
        $this->assertNull(EstatusUsuario::find($estatusUsuario->id), 'El modelo no debe existir en BD.');
    }
}
