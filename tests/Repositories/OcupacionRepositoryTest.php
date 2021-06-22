<?php namespace Tests\Repositories;

use App\Models\Entidades\Ocupacion;
use App\Repositories\Entidades\OcupacionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class OcupacionRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var OcupacionRepository
     */
    protected $ocupacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ocupacionRepo = \App::make(OcupacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_ocupacion()
    {
        $ocupacion = factory(Ocupacion::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('entidades.ocupaciones.store');
        $response = $this->post($url, $ocupacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoOcupacion = Ocupacion::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($ocupacion, $objetoOcupacion),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $ocupacion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_ocupacion()
    {
        $ocupacion = factory(Ocupacion::class)->create();
        $dbOcupacion = $this->ocupacionRepo->find($ocupacion->id);
        $dbOcupacion = $dbOcupacion->toArray();
        $this->assertTrue($this->sonDatosIguales($ocupacion->toArray(),$dbOcupacion),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_ocupacion()
    {
        //Se crea un objeto y se generan datos para edición  
        $ocupacion = factory(Ocupacion::class)->create();
        $fakeOcupacion = factory(Ocupacion::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('entidades.ocupaciones.update', $ocupacion->id);
        $response = $this->patch($url,$fakeOcupacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoOcupacion = Ocupacion::find($ocupacion->id);
        $this->assertTrue($this->sonDatosIguales($fakeOcupacion, $objetoOcupacion->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_ocupacion()
    {
        $ocupacion = factory(Ocupacion::class)->create();
        $resp = $this->ocupacionRepo->delete($ocupacion->id);
        $this->assertNull(Ocupacion::find($ocupacion->id), 'El modelo no debe existir en BD.');
    }
}
