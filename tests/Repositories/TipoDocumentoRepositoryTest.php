<?php namespace Tests\Repositories;

use App\Models\Parametros\TipoDocumento;
use App\Repositories\Parametros\TipoDocumentoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TipoDocumentoRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var TipoDocumentoRepository
     */
    protected $tipoDocumentoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoDocumentoRepo = \App::make(TipoDocumentoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_documento()
    {
        $tipoDocumento = factory(TipoDocumento::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.tiposDocumento.store');
        $response = $this->post($url, $tipoDocumento); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoTipoDocumento = TipoDocumento::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($tipoDocumento, $objetoTipoDocumento),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $tipoDocumento); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_documento()
    {
        $tipoDocumento = factory(TipoDocumento::class)->create();
        $dbTipoDocumento = $this->tipoDocumentoRepo->find($tipoDocumento->id);
        $dbTipoDocumento = $dbTipoDocumento->toArray();
        $this->assertTrue($this->sonDatosIguales($tipoDocumento->toArray(),$dbTipoDocumento),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_documento()
    {
        //Se crea un objeto y se generan datos para edición  
        $tipoDocumento = factory(TipoDocumento::class)->create();
        $fakeTipoDocumento = factory(TipoDocumento::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.tiposDocumento.update', $tipoDocumento->id);
        $response = $this->patch($url,$fakeTipoDocumento); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoTipoDocumento = TipoDocumento::find($tipoDocumento->id);
        $this->assertTrue($this->sonDatosIguales($fakeTipoDocumento, $objetoTipoDocumento->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_documento()
    {
        $tipoDocumento = factory(TipoDocumento::class)->create();
        $resp = $this->tipoDocumentoRepo->delete($tipoDocumento->id);
        $this->assertNull(TipoDocumento::find($tipoDocumento->id), 'El modelo no debe existir en BD.');
    }
}
