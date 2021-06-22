<?php namespace Tests\Repositories;

use App\Models\Campanias\TipoInteraccion;
use App\Repositories\Campanias\TipoInteraccionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TipoInteraccionRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var TipoInteraccionRepository
     */
    protected $tipoInteraccionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoInteraccionRepo = \App::make(TipoInteraccionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_interaccion()
    {
        $tipoInteraccion = factory(TipoInteraccion::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('campanias.tiposInteraccion.store');
        $response = $this->post($url, $tipoInteraccion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoTipoInteraccion = TipoInteraccion::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($tipoInteraccion, $objetoTipoInteraccion),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $tipoInteraccion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_interaccion()
    {
        $tipoInteraccion = factory(TipoInteraccion::class)->create();
        $dbTipoInteraccion = $this->tipoInteraccionRepo->find($tipoInteraccion->id);
        $dbTipoInteraccion = $dbTipoInteraccion->toArray();
        $this->assertTrue($this->sonDatosIguales($tipoInteraccion->toArray(),$dbTipoInteraccion),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_interaccion()
    {
        //Se crea un objeto y se generan datos para edición  
        $tipoInteraccion = factory(TipoInteraccion::class)->create();
        $fakeTipoInteraccion = factory(TipoInteraccion::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('campanias.tiposInteraccion.update', $tipoInteraccion->id);
        $response = $this->patch($url,$fakeTipoInteraccion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoTipoInteraccion = TipoInteraccion::find($tipoInteraccion->id);
        $this->assertTrue($this->sonDatosIguales($fakeTipoInteraccion, $objetoTipoInteraccion->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_interaccion()
    {
        $tipoInteraccion = factory(TipoInteraccion::class)->create();
        $resp = $this->tipoInteraccionRepo->delete($tipoInteraccion->id);
        $this->assertNull(TipoInteraccion::find($tipoInteraccion->id), 'El modelo no debe existir en BD.');
    }
}
