<?php namespace Tests\Repositories;

use App\Models\Parametros\TipoContacto;
use App\Repositories\Parametros\TipoContactoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TipoContactoRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var TipoContactoRepository
     */
    protected $tipoContactoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoContactoRepo = \App::make(TipoContactoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_contacto()
    {
        $tipoContacto = factory(TipoContacto::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.tiposContacto.store');
        $response = $this->post($url, $tipoContacto); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoTipoContacto = TipoContacto::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($tipoContacto, $objetoTipoContacto),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $tipoContacto); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_contacto()
    {
        $tipoContacto = factory(TipoContacto::class)->create();
        $dbTipoContacto = $this->tipoContactoRepo->find($tipoContacto->id);
        $dbTipoContacto = $dbTipoContacto->toArray();
        $this->assertTrue($this->sonDatosIguales($tipoContacto->toArray(),$dbTipoContacto),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_contacto()
    {
        //Se crea un objeto y se generan datos para edición  
        $tipoContacto = factory(TipoContacto::class)->create();
        $fakeTipoContacto = factory(TipoContacto::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.tiposContacto.update', $tipoContacto->id);
        $response = $this->patch($url,$fakeTipoContacto); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoTipoContacto = TipoContacto::find($tipoContacto->id);
        $this->assertTrue($this->sonDatosIguales($fakeTipoContacto, $objetoTipoContacto->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_contacto()
    {
        $tipoContacto = factory(TipoContacto::class)->create();
        $resp = $this->tipoContactoRepo->delete($tipoContacto->id);
        $this->assertNull(TipoContacto::find($tipoContacto->id), 'El modelo no debe existir en BD.');
    }
}
