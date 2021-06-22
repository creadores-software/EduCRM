<?php namespace Tests\Repositories;

use App\Models\Campanias\TipoCampaniaEstados;
use App\Repositories\Campanias\TipoCampaniaEstadosRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TipoCampaniaEstadosRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var TipoCampaniaEstadosRepository
     */
    protected $tipoCampaniaEstadosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoCampaniaEstadosRepo = \App::make(TipoCampaniaEstadosRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_campania_estados()
    {
        $tipoCampaniaEstados = factory(TipoCampaniaEstados::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('campanias.tiposCampaniaEstados.store');
        $response = $this->post($url, $tipoCampaniaEstados); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoTipoCampaniaEstados = TipoCampaniaEstados::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($tipoCampaniaEstados, $objetoTipoCampaniaEstados),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $tipoCampaniaEstados); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_campania_estados()
    {
        $tipoCampaniaEstados = factory(TipoCampaniaEstados::class)->create();
        $dbTipoCampaniaEstados = $this->tipoCampaniaEstadosRepo->find($tipoCampaniaEstados->id);
        $dbTipoCampaniaEstados = $dbTipoCampaniaEstados->toArray();
        $this->assertTrue($this->sonDatosIguales($tipoCampaniaEstados->toArray(),$dbTipoCampaniaEstados),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_campania_estados()
    {
        //Se crea un objeto y se generan datos para edición  
        $tipoCampaniaEstados = factory(TipoCampaniaEstados::class)->create();
        $fakeTipoCampaniaEstados = factory(TipoCampaniaEstados::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('campanias.tiposCampaniaEstados.update', $tipoCampaniaEstados->id);
        $response = $this->patch($url,$fakeTipoCampaniaEstados); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoTipoCampaniaEstados = TipoCampaniaEstados::find($tipoCampaniaEstados->id);
        $this->assertTrue($this->sonDatosIguales($fakeTipoCampaniaEstados, $objetoTipoCampaniaEstados->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_campania_estados()
    {
        $tipoCampaniaEstados = factory(TipoCampaniaEstados::class)->create();
        $resp = $this->tipoCampaniaEstadosRepo->delete($tipoCampaniaEstados->id);
        $this->assertNull(TipoCampaniaEstados::find($tipoCampaniaEstados->id), 'El modelo no debe existir en BD.');
    }
}
