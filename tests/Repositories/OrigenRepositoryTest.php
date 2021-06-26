<?php namespace Tests\Repositories;

use App\Models\Parametros\Origen;
use App\Repositories\Parametros\OrigenRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class OrigenRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var OrigenRepository
     */
    protected $origenRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->origenRepo = \App::make(OrigenRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_origen()
    {
        $origen = factory(Origen::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.origenes.store');
        $response = $this->post($url, $origen); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoOrigen = Origen::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($origen, $objetoOrigen),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $origen); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_origen()
    {
        $origen = factory(Origen::class)->create();
        $dbOrigen = $this->origenRepo->find($origen->id);
        $dbOrigen = $dbOrigen->toArray();
        $this->assertTrue($this->sonDatosIguales($origen->toArray(),$dbOrigen),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_origen()
    {
        //Se crea un objeto y se generan datos para edición  
        $origen = factory(Origen::class)->create();
        $fakeOrigen = factory(Origen::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.origenes.update', $origen->id);
        $response = $this->patch($url,$fakeOrigen); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoOrigen = Origen::find($origen->id);
        $this->assertTrue($this->sonDatosIguales($fakeOrigen, $objetoOrigen->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_origen()
    {
        $origen = factory(Origen::class)->create();
        $resp = $this->origenRepo->delete($origen->id);
        $this->assertNull(Origen::find($origen->id), 'El modelo no debe existir en BD.');
    }
}
