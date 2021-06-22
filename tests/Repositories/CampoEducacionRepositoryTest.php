<?php namespace Tests\Repositories;

use App\Models\Formaciones\CampoEducacion;
use App\Repositories\Formaciones\CampoEducacionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CampoEducacionRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var CampoEducacionRepository
     */
    protected $campoEducacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->campoEducacionRepo = \App::make(CampoEducacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_campo_educacion()
    {
        $campoEducacion = factory(CampoEducacion::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('formaciones.camposEducacion.store');
        $response = $this->post($url, $campoEducacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoCampoEducacion = CampoEducacion::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($campoEducacion, $objetoCampoEducacion),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $campoEducacion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_campo_educacion()
    {
        $campoEducacion = factory(CampoEducacion::class)->create();
        $dbCampoEducacion = $this->campoEducacionRepo->find($campoEducacion->id);
        $dbCampoEducacion = $dbCampoEducacion->toArray();
        $this->assertTrue($this->sonDatosIguales($campoEducacion->toArray(),$dbCampoEducacion),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_campo_educacion()
    {
        //Se crea un objeto y se generan datos para edición  
        $campoEducacion = factory(CampoEducacion::class)->create();
        $fakeCampoEducacion = factory(CampoEducacion::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('formaciones.camposEducacion.update', $campoEducacion->id);
        $response = $this->patch($url,$fakeCampoEducacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoCampoEducacion = CampoEducacion::find($campoEducacion->id);
        $this->assertTrue($this->sonDatosIguales($fakeCampoEducacion, $objetoCampoEducacion->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_campo_educacion()
    {
        $campoEducacion = factory(CampoEducacion::class)->create();
        $resp = $this->campoEducacionRepo->delete($campoEducacion->id);
        $this->assertNull(CampoEducacion::find($campoEducacion->id), 'El modelo no debe existir en BD.');
    }
}
