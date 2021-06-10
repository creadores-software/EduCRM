<?php namespace Tests\Repositories;

use App\Models\Campanias\Oportunidad;
use App\Repositories\Campanias\OportunidadRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class OportunidadRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var OportunidadRepository
     */
    protected $oportunidadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->oportunidadRepo = \App::make(OportunidadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_oportunidad()
    {
        $oportunidad = factory(Oportunidad::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('campanias.oportunidades.store');
        $response = $this->post($url, $oportunidad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoOportunidad = Oportunidad::latest()->first()->toArray();
        $this->assertModelData($oportunidad, $objetoOportunidad,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $oportunidad); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_oportunidad()
    {
        $oportunidad = factory(Oportunidad::class)->create();
        $dbOportunidad = $this->oportunidadRepo->find($oportunidad->id);
        $dbOportunidad = $dbOportunidad->toArray();
        $this->assertModelData($oportunidad->toArray(), $dbOportunidad);
    }

    /**
     * @test editar
     */
    public function test_editar_oportunidad()
    {
        //Se crea un objeto y se generan datos para edición  
        $oportunidad = factory(Oportunidad::class)->create();
        $fakeOportunidad = factory(Oportunidad::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('campanias.oportunidades.update', $oportunidad->id);
        $response = $this->patch($url,$fakeOportunidad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoOportunidad = Oportunidad::find($oportunidad->id);
        $this->assertModelData($fakeOportunidad, $objetoOportunidad->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $oportunidad = factory(Oportunidad::class)->create(); 
        $url = route('campanias.oportunidades.update', $oportunidad->id);
        $response = $this->patch($url, $fakeOportunidad); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_oportunidad()
    {
        $oportunidad = factory(Oportunidad::class)->create();
        $resp = $this->oportunidadRepo->delete($oportunidad->id);
        $this->assertNull(Oportunidad::find($oportunidad->id), 'El modelo no debe existir en BD.');
    }
}
