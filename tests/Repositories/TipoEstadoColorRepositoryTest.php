<?php namespace Tests\Repositories;

use App\Models\Campanias\TipoEstadoColor;
use App\Repositories\Campanias\TipoEstadoColorRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TipoEstadoColorRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var TipoEstadoColorRepository
     */
    protected $tipoEstadoColorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoEstadoColorRepo = \App::make(TipoEstadoColorRepository::class);
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_estado_color()
    {
        $tipoEstadoColor = factory(TipoEstadoColor::class)->create();
        $dbTipoEstadoColor = $this->tipoEstadoColorRepo->find($tipoEstadoColor->id);
        $dbTipoEstadoColor = $dbTipoEstadoColor->toArray();
        $this->assertTrue($this->sonDatosIguales($tipoEstadoColor->toArray(),$dbTipoEstadoColor),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_estado_color()
    {
        //Se crea un objeto y se generan datos para edición  
        $tipoEstadoColor = factory(TipoEstadoColor::class)->create();
        $fakeTipoEstadoColor = factory(TipoEstadoColor::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('campanias.tiposEstadoColor.update', $tipoEstadoColor->id);
        $response = $this->patch($url,$fakeTipoEstadoColor); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoTipoEstadoColor = TipoEstadoColor::find($tipoEstadoColor->id);
        $this->assertTrue($this->sonDatosIguales($fakeTipoEstadoColor, $objetoTipoEstadoColor->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_estado_color()
    {
        $tipoEstadoColor = factory(TipoEstadoColor::class)->create();
        $resp = $this->tipoEstadoColorRepo->delete($tipoEstadoColor->id);
        $this->assertNull(TipoEstadoColor::find($tipoEstadoColor->id), 'El modelo no debe existir en BD.');
    }
}
