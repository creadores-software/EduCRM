<?php namespace Tests\Repositories;

use App\Models\Parametros\Prefijo;
use App\Repositories\Parametros\PrefijoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PrefijoRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var PrefijoRepository
     */
    protected $prefijoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->prefijoRepo = \App::make(PrefijoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_prefijo()
    {
        $prefijo = factory(Prefijo::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.prefijos.store');
        $response = $this->post($url, $prefijo); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoPrefijo = Prefijo::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($prefijo, $objetoPrefijo),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $prefijo); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_prefijo()
    {
        $prefijo = factory(Prefijo::class)->create();
        $dbPrefijo = $this->prefijoRepo->find($prefijo->id);
        $dbPrefijo = $dbPrefijo->toArray();
        $this->assertTrue($this->sonDatosIguales($prefijo->toArray(),$dbPrefijo),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_prefijo()
    {
        //Se crea un objeto y se generan datos para edición  
        $prefijo = factory(Prefijo::class)->create();
        $fakePrefijo = factory(Prefijo::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.prefijos.update', $prefijo->id);
        $response = $this->patch($url,$fakePrefijo); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoPrefijo = Prefijo::find($prefijo->id);
        $this->assertTrue($this->sonDatosIguales($fakePrefijo, $objetoPrefijo->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_prefijo()
    {
        $prefijo = factory(Prefijo::class)->create();
        $resp = $this->prefijoRepo->delete($prefijo->id);
        $this->assertNull(Prefijo::find($prefijo->id), 'El modelo no debe existir en BD.');
    }
}
