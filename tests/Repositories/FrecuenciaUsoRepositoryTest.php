<?php namespace Tests\Repositories;

use App\Models\Parametros\FrecuenciaUso;
use App\Repositories\Parametros\FrecuenciaUsoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class FrecuenciaUsoRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var FrecuenciaUsoRepository
     */
    protected $frecuenciaUsoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->frecuenciaUsoRepo = \App::make(FrecuenciaUsoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_frecuencia_uso()
    {
        $frecuenciaUso = factory(FrecuenciaUso::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.frecuenciasUso.store');
        $response = $this->post($url, $frecuenciaUso); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoFrecuenciaUso = FrecuenciaUso::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($frecuenciaUso, $objetoFrecuenciaUso),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $frecuenciaUso); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_frecuencia_uso()
    {
        $frecuenciaUso = factory(FrecuenciaUso::class)->create();
        $dbFrecuenciaUso = $this->frecuenciaUsoRepo->find($frecuenciaUso->id);
        $dbFrecuenciaUso = $dbFrecuenciaUso->toArray();
        $this->assertTrue($this->sonDatosIguales($frecuenciaUso->toArray(),$dbFrecuenciaUso),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_frecuencia_uso()
    {
        //Se crea un objeto y se generan datos para edición  
        $frecuenciaUso = factory(FrecuenciaUso::class)->create();
        $fakeFrecuenciaUso = factory(FrecuenciaUso::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.frecuenciasUso.update', $frecuenciaUso->id);
        $response = $this->patch($url,$fakeFrecuenciaUso); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoFrecuenciaUso = FrecuenciaUso::find($frecuenciaUso->id);
        $this->assertTrue($this->sonDatosIguales($fakeFrecuenciaUso, $objetoFrecuenciaUso->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_frecuencia_uso()
    {
        $frecuenciaUso = factory(FrecuenciaUso::class)->create();
        $resp = $this->frecuenciaUsoRepo->delete($frecuenciaUso->id);
        $this->assertNull(FrecuenciaUso::find($frecuenciaUso->id), 'El modelo no debe existir en BD.');
    }
}
