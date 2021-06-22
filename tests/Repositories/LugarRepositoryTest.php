<?php namespace Tests\Repositories;

use App\Models\Parametros\Lugar;
use App\Repositories\Parametros\LugarRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class LugarRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var LugarRepository
     */
    protected $lugarRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->lugarRepo = \App::make(LugarRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_lugar()
    {
        $lugar = factory(Lugar::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.lugares.store');
        $response = $this->post($url, $lugar); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoLugar = Lugar::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($lugar, $objetoLugar),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $lugar); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_lugar()
    {
        $lugar = factory(Lugar::class)->create();
        $dbLugar = $this->lugarRepo->find($lugar->id);
        $dbLugar = $dbLugar->toArray();
        $this->assertTrue($this->sonDatosIguales($lugar->toArray(),$dbLugar),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_lugar()
    {
        //Se crea un objeto y se generan datos para edición  
        $lugar = factory(Lugar::class)->create();
        $fakeLugar = factory(Lugar::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.lugares.update', $lugar->id);
        $response = $this->patch($url,$fakeLugar); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoLugar = Lugar::find($lugar->id);
        $this->assertTrue($this->sonDatosIguales($fakeLugar, $objetoLugar->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_lugar()
    {
        $lugar = factory(Lugar::class)->create();
        $resp = $this->lugarRepo->delete($lugar->id);
        $this->assertNull(Lugar::find($lugar->id), 'El modelo no debe existir en BD.');
    }
}
