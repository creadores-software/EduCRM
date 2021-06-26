<?php namespace Tests\Repositories;

use App\Models\Admin\User;
use App\Models\Contactos\Segmento;
use App\Repositories\Contactos\SegmentoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class SegmentoRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var SegmentoRepository
     */
    protected $segmentoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->segmentoRepo = \App::make(SegmentoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_segmento()
    {
        $segmento = factory(Segmento::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('contactos.segmentos.store');
        $usuario = User::find(1);
        $response = $this->actingAs($usuario)->post($url, $segmento); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $segmento['usuario_id']=1;
        $objetoSegmento = Segmento::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($segmento, $objetoSegmento),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $segmento); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_segmento()
    {
        $segmento = factory(Segmento::class)->create();
        $dbSegmento = $this->segmentoRepo->find($segmento->id);
        $dbSegmento = $dbSegmento->toArray();
        $this->assertTrue($this->sonDatosIguales($segmento->toArray(),$dbSegmento),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_segmento()
    {
        //Se crea un objeto y se generan datos para edición  
        $segmento = factory(Segmento::class)->create();
        $fakeSegmento = factory(Segmento::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('contactos.segmentos.update', $segmento->id);
        $response = $this->patch($url,$fakeSegmento); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoSegmento = Segmento::find($segmento->id);
        $this->assertTrue($this->sonDatosIguales($fakeSegmento, $objetoSegmento->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_segmento()
    {
        $segmento = factory(Segmento::class)->create();
        $resp = $this->segmentoRepo->delete($segmento->id);
        $this->assertNull(Segmento::find($segmento->id), 'El modelo no debe existir en BD.');
    }
}
