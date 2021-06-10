<?php namespace Tests\Repositories;

use App\Models\Admin\EquipoMercadeo;
use App\Repositories\Admin\EquipoMercadeoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EquipoMercadeoRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var EquipoMercadeoRepository
     */
    protected $equipoMercadeoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->equipoMercadeoRepo = \App::make(EquipoMercadeoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_equipo_mercadeo()
    {
        $equipoMercadeo = factory(EquipoMercadeo::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('admin.equiposMercadeo.store');
        $response = $this->post($url, $equipoMercadeo); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoEquipoMercadeo = EquipoMercadeo::latest()->first()->toArray();
        $this->assertModelData($equipoMercadeo, $objetoEquipoMercadeo,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $equipoMercadeo); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_equipo_mercadeo()
    {
        $equipoMercadeo = factory(EquipoMercadeo::class)->create();
        $dbEquipoMercadeo = $this->equipoMercadeoRepo->find($equipoMercadeo->id);
        $dbEquipoMercadeo = $dbEquipoMercadeo->toArray();
        $this->assertModelData($equipoMercadeo->toArray(), $dbEquipoMercadeo);
    }

    /**
     * @test editar
     */
    public function test_editar_equipo_mercadeo()
    {
        //Se crea un objeto y se generan datos para edición  
        $equipoMercadeo = factory(EquipoMercadeo::class)->create();
        $fakeEquipoMercadeo = factory(EquipoMercadeo::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('admin.equiposMercadeo.update', $equipoMercadeo->id);
        $response = $this->patch($url,$fakeEquipoMercadeo); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoEquipoMercadeo = EquipoMercadeo::find($equipoMercadeo->id);
        $this->assertModelData($fakeEquipoMercadeo, $objetoEquipoMercadeo->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $equipoMercadeo = factory(EquipoMercadeo::class)->create(); 
        $url = route('admin.equiposMercadeo.update', $equipoMercadeo->id);
        $response = $this->patch($url, $fakeEquipoMercadeo); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_equipo_mercadeo()
    {
        $equipoMercadeo = factory(EquipoMercadeo::class)->create();
        $resp = $this->equipoMercadeoRepo->delete($equipoMercadeo->id);
        $this->assertNull(EquipoMercadeo::find($equipoMercadeo->id), 'El modelo no debe existir en BD.');
    }
}
