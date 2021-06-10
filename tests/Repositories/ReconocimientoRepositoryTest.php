<?php namespace Tests\Repositories;

use App\Models\Formaciones\Reconocimiento;
use App\Repositories\Formaciones\ReconocimientoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ReconocimientoRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var ReconocimientoRepository
     */
    protected $reconocimientoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->reconocimientoRepo = \App::make(ReconocimientoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_reconocimiento()
    {
        $reconocimiento = factory(Reconocimiento::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('formaciones.reconocimientos.store');
        $response = $this->post($url, $reconocimiento); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoReconocimiento = Reconocimiento::latest()->first()->toArray();
        $this->assertModelData($reconocimiento, $objetoReconocimiento,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $reconocimiento); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_reconocimiento()
    {
        $reconocimiento = factory(Reconocimiento::class)->create();
        $dbReconocimiento = $this->reconocimientoRepo->find($reconocimiento->id);
        $dbReconocimiento = $dbReconocimiento->toArray();
        $this->assertModelData($reconocimiento->toArray(), $dbReconocimiento);
    }

    /**
     * @test editar
     */
    public function test_editar_reconocimiento()
    {
        //Se crea un objeto y se generan datos para edición  
        $reconocimiento = factory(Reconocimiento::class)->create();
        $fakeReconocimiento = factory(Reconocimiento::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('formaciones.reconocimientos.update', $reconocimiento->id);
        $response = $this->patch($url,$fakeReconocimiento); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoReconocimiento = Reconocimiento::find($reconocimiento->id);
        $this->assertModelData($fakeReconocimiento, $objetoReconocimiento->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $reconocimiento = factory(Reconocimiento::class)->create(); 
        $url = route('formaciones.reconocimientos.update', $reconocimiento->id);
        $response = $this->patch($url, $fakeReconocimiento); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_reconocimiento()
    {
        $reconocimiento = factory(Reconocimiento::class)->create();
        $resp = $this->reconocimientoRepo->delete($reconocimiento->id);
        $this->assertNull(Reconocimiento::find($reconocimiento->id), 'El modelo no debe existir en BD.');
    }
}
