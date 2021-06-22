<?php namespace Tests\Repositories;

use App\Models\Admin\PertenenciaEquipoMercadeo;
use App\Repositories\Admin\PertenenciaEquipoMercadeoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PertenenciaEquipoMercadeoRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var PertenenciaEquipoMercadeoRepository
     */
    protected $pertenenciaEquipoMercadeoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pertenenciaEquipoMercadeoRepo = \App::make(PertenenciaEquipoMercadeoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_pertenencia_equipo_mercadeo()
    {
        $pertenenciaEquipoMercadeo = factory(PertenenciaEquipoMercadeo::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('admin.pertenenciasEquipoMercadeo.store');
        $response = $this->post($url, $pertenenciaEquipoMercadeo); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoPertenenciaEquipoMercadeo = PertenenciaEquipoMercadeo::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($pertenenciaEquipoMercadeo, $objetoPertenenciaEquipoMercadeo),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $pertenenciaEquipoMercadeo); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_pertenencia_equipo_mercadeo()
    {
        $pertenenciaEquipoMercadeo = factory(PertenenciaEquipoMercadeo::class)->create();
        $dbPertenenciaEquipoMercadeo = $this->pertenenciaEquipoMercadeoRepo->find($pertenenciaEquipoMercadeo->id);
        $dbPertenenciaEquipoMercadeo = $dbPertenenciaEquipoMercadeo->toArray();
        $this->assertTrue($this->sonDatosIguales($pertenenciaEquipoMercadeo->toArray(),$dbPertenenciaEquipoMercadeo),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_pertenencia_equipo_mercadeo()
    {
        //Se crea un objeto y se generan datos para edición  
        $pertenenciaEquipoMercadeo = factory(PertenenciaEquipoMercadeo::class)->create();
        $fakePertenenciaEquipoMercadeo = factory(PertenenciaEquipoMercadeo::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('admin.pertenenciasEquipoMercadeo.update', $pertenenciaEquipoMercadeo->id);
        $response = $this->patch($url,$fakePertenenciaEquipoMercadeo); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoPertenenciaEquipoMercadeo = PertenenciaEquipoMercadeo::find($pertenenciaEquipoMercadeo->id);
        $this->assertTrue($this->sonDatosIguales($fakePertenenciaEquipoMercadeo, $objetoPertenenciaEquipoMercadeo->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_pertenencia_equipo_mercadeo()
    {
        $pertenenciaEquipoMercadeo = factory(PertenenciaEquipoMercadeo::class)->create();
        $resp = $this->pertenenciaEquipoMercadeoRepo->delete($pertenenciaEquipoMercadeo->id);
        $this->assertNull(PertenenciaEquipoMercadeo::find($pertenenciaEquipoMercadeo->id), 'El modelo no debe existir en BD.');
    }
}
