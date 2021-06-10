<?php namespace Tests\Repositories;

use App\Models\Campanias\JustificacionEstadoCampania;
use App\Repositories\Campanias\JustificacionEstadoCampaniaRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class JustificacionEstadoCampaniaRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var JustificacionEstadoCampaniaRepository
     */
    protected $justificacionEstadoCampaniaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->justificacionEstadoCampaniaRepo = \App::make(JustificacionEstadoCampaniaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_justificacion_estado_campania()
    {
        $justificacionEstadoCampania = factory(JustificacionEstadoCampania::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('campanias.justificacionesEstadoCampania.store');
        $response = $this->post($url, $justificacionEstadoCampania); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoJustificacionEstadoCampania = JustificacionEstadoCampania::latest()->first()->toArray();
        $this->assertModelData($justificacionEstadoCampania, $objetoJustificacionEstadoCampania,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $justificacionEstadoCampania); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_justificacion_estado_campania()
    {
        $justificacionEstadoCampania = factory(JustificacionEstadoCampania::class)->create();
        $dbJustificacionEstadoCampania = $this->justificacionEstadoCampaniaRepo->find($justificacionEstadoCampania->id);
        $dbJustificacionEstadoCampania = $dbJustificacionEstadoCampania->toArray();
        $this->assertModelData($justificacionEstadoCampania->toArray(), $dbJustificacionEstadoCampania);
    }

    /**
     * @test editar
     */
    public function test_editar_justificacion_estado_campania()
    {
        //Se crea un objeto y se generan datos para edición  
        $justificacionEstadoCampania = factory(JustificacionEstadoCampania::class)->create();
        $fakeJustificacionEstadoCampania = factory(JustificacionEstadoCampania::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('campanias.justificacionesEstadoCampania.update', $justificacionEstadoCampania->id);
        $response = $this->patch($url,$fakeJustificacionEstadoCampania); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoJustificacionEstadoCampania = JustificacionEstadoCampania::find($justificacionEstadoCampania->id);
        $this->assertModelData($fakeJustificacionEstadoCampania, $objetoJustificacionEstadoCampania->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $justificacionEstadoCampania = factory(JustificacionEstadoCampania::class)->create(); 
        $url = route('campanias.justificacionesEstadoCampania.update', $justificacionEstadoCampania->id);
        $response = $this->patch($url, $fakeJustificacionEstadoCampania); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_justificacion_estado_campania()
    {
        $justificacionEstadoCampania = factory(JustificacionEstadoCampania::class)->create();
        $resp = $this->justificacionEstadoCampaniaRepo->delete($justificacionEstadoCampania->id);
        $this->assertNull(JustificacionEstadoCampania::find($justificacionEstadoCampania->id), 'El modelo no debe existir en BD.');
    }
}
