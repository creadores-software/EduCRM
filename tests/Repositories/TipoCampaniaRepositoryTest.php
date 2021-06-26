<?php namespace Tests\Repositories;

use App\Models\Campanias\TipoCampania;
use App\Repositories\Campanias\TipoCampaniaRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TipoCampaniaRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var TipoCampaniaRepository
     */
    protected $tipoCampaniaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoCampaniaRepo = \App::make(TipoCampaniaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_campania()
    {
        $tipoCampania = factory(TipoCampania::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('campanias.tiposCampania.store');
        $response = $this->post($url, $tipoCampania); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoTipoCampania = TipoCampania::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($tipoCampania, $objetoTipoCampania),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $tipoCampania); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_campania()
    {
        $tipoCampania = factory(TipoCampania::class)->create();
        $dbTipoCampania = $this->tipoCampaniaRepo->find($tipoCampania->id);
        $dbTipoCampania = $dbTipoCampania->toArray();
        $this->assertTrue($this->sonDatosIguales($tipoCampania->toArray(),$dbTipoCampania),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_campania()
    {
        //Se crea un objeto y se generan datos para edición  
        $tipoCampania = factory(TipoCampania::class)->create();
        $fakeTipoCampania = factory(TipoCampania::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('campanias.tiposCampania.update', $tipoCampania->id);
        $response = $this->patch($url,$fakeTipoCampania); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoTipoCampania = TipoCampania::find($tipoCampania->id);
        $this->assertTrue($this->sonDatosIguales($fakeTipoCampania, $objetoTipoCampania->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_campania()
    {
        $tipoCampania = factory(TipoCampania::class)->create();
        $resp = $this->tipoCampaniaRepo->delete($tipoCampania->id);
        $this->assertNull(TipoCampania::find($tipoCampania->id), 'El modelo no debe existir en BD.');
    }
}
