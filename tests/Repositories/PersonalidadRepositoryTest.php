<?php namespace Tests\Repositories;

use App\Models\Parametros\Personalidad;
use App\Repositories\Parametros\PersonalidadRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PersonalidadRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var PersonalidadRepository
     */
    protected $personalidadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->personalidadRepo = \App::make(PersonalidadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_personalidad()
    {
        $personalidad = factory(Personalidad::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.personalidades.store');
        $response = $this->post($url, $personalidad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoPersonalidad = Personalidad::latest()->first()->toArray();
        $this->assertModelData($personalidad, $objetoPersonalidad,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $personalidad); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_personalidad()
    {
        $personalidad = factory(Personalidad::class)->create();
        $dbPersonalidad = $this->personalidadRepo->find($personalidad->id);
        $dbPersonalidad = $dbPersonalidad->toArray();
        $this->assertModelData($personalidad->toArray(), $dbPersonalidad);
    }

    /**
     * @test editar
     */
    public function test_editar_personalidad()
    {
        //Se crea un objeto y se generan datos para edición  
        $personalidad = factory(Personalidad::class)->create();
        $fakePersonalidad = factory(Personalidad::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.personalidades.update', $personalidad->id);
        $response = $this->patch($url,$fakePersonalidad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoPersonalidad = Personalidad::find($personalidad->id);
        $this->assertModelData($fakePersonalidad, $objetoPersonalidad->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $personalidad = factory(Personalidad::class)->create(); 
        $url = route('parametros.personalidades.update', $personalidad->id);
        $response = $this->patch($url, $fakePersonalidad); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_personalidad()
    {
        $personalidad = factory(Personalidad::class)->create();
        $resp = $this->personalidadRepo->delete($personalidad->id);
        $this->assertNull(Personalidad::find($personalidad->id), 'El modelo no debe existir en BD.');
    }
}
