<?php namespace Tests\Repositories;

use App\Models\Campanias\Campania;
use App\Repositories\Campanias\CampaniaRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CampaniaRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var CampaniaRepository
     */
    protected $campaniaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->campaniaRepo = \App::make(CampaniaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_campania()
    {
        $campania = factory(Campania::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('campanias.campanias.store');
        $response = $this->post($url, $campania); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoCampania = Campania::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($campania, $objetoCampania),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $campania); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_campania()
    {
        $campania = factory(Campania::class)->create();
        $dbCampania = $this->campaniaRepo->find($campania->id);
        $dbCampania = $dbCampania->toArray();
        $this->assertTrue($this->sonDatosIguales($campania->toArray(),$dbCampania),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_campania()
    {
        //Se crea un objeto y se generan datos para edición  
        $campania = factory(Campania::class)->create();
        $fakeCampania = factory(Campania::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('campanias.campanias.update', $campania->id);
        $response = $this->patch($url,$fakeCampania); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoCampania = Campania::find($campania->id);
        $this->assertTrue($this->sonDatosIguales($fakeCampania, $objetoCampania->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_campania()
    {
        $campania = factory(Campania::class)->create();
        $resp = $this->campaniaRepo->delete($campania->id);
        $this->assertNull(Campania::find($campania->id), 'El modelo no debe existir en BD.');
    }
}
