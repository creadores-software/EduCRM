<?php namespace Tests\Repositories;

use App\Models\Parametros\Generacion;
use App\Repositories\Parametros\GeneracionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class GeneracionRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var GeneracionRepository
     */
    protected $generacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->generacionRepo = \App::make(GeneracionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_generacion()
    {
        $generacion = factory(Generacion::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.generaciones.store');
        $response = $this->post($url, $generacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoGeneracion = Generacion::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($generacion, $objetoGeneracion),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $generacion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_generacion()
    {
        $generacion = factory(Generacion::class)->create();
        $dbGeneracion = $this->generacionRepo->find($generacion->id);
        $dbGeneracion = $dbGeneracion->toArray();
        $this->assertTrue($this->sonDatosIguales($generacion->toArray(),$dbGeneracion),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_generacion()
    {
        //Se crea un objeto y se generan datos para edición  
        $generacion = factory(Generacion::class)->create();
        $fakeGeneracion = factory(Generacion::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.generaciones.update', $generacion->id);
        $response = $this->patch($url,$fakeGeneracion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoGeneracion = Generacion::find($generacion->id);
        $this->assertTrue($this->sonDatosIguales($fakeGeneracion, $objetoGeneracion->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_generacion()
    {
        $generacion = factory(Generacion::class)->create();
        $resp = $this->generacionRepo->delete($generacion->id);
        $this->assertNull(Generacion::find($generacion->id), 'El modelo no debe existir en BD.');
    }
}
