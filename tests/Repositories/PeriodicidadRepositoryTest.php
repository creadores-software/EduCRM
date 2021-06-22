<?php namespace Tests\Repositories;

use App\Models\Formaciones\Periodicidad;
use App\Repositories\Formaciones\PeriodicidadRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PeriodicidadRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var PeriodicidadRepository
     */
    protected $periodicidadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->periodicidadRepo = \App::make(PeriodicidadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_periodicidad()
    {
        $periodicidad = factory(Periodicidad::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('formaciones.periodicidades.store');
        $response = $this->post($url, $periodicidad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoPeriodicidad = Periodicidad::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($periodicidad, $objetoPeriodicidad),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $periodicidad); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_periodicidad()
    {
        $periodicidad = factory(Periodicidad::class)->create();
        $dbPeriodicidad = $this->periodicidadRepo->find($periodicidad->id);
        $dbPeriodicidad = $dbPeriodicidad->toArray();
        $this->assertTrue($this->sonDatosIguales($periodicidad->toArray(),$dbPeriodicidad),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_periodicidad()
    {
        //Se crea un objeto y se generan datos para edición  
        $periodicidad = factory(Periodicidad::class)->create();
        $fakePeriodicidad = factory(Periodicidad::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('formaciones.periodicidades.update', $periodicidad->id);
        $response = $this->patch($url,$fakePeriodicidad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoPeriodicidad = Periodicidad::find($periodicidad->id);
        $this->assertTrue($this->sonDatosIguales($fakePeriodicidad, $objetoPeriodicidad->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_periodicidad()
    {
        $periodicidad = factory(Periodicidad::class)->create();
        $resp = $this->periodicidadRepo->delete($periodicidad->id);
        $this->assertNull(Periodicidad::find($periodicidad->id), 'El modelo no debe existir en BD.');
    }
}
