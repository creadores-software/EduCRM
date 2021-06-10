<?php namespace Tests\Repositories;

use App\Models\Entidades\Entidad;
use App\Repositories\Entidades\EntidadRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EntidadRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var EntidadRepository
     */
    protected $entidadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->entidadRepo = \App::make(EntidadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_entidad()
    {
        $entidad = factory(Entidad::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('entidades.entidades.store');
        $response = $this->post($url, $entidad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoEntidad = Entidad::latest()->first()->toArray();
        $this->assertModelData($entidad, $objetoEntidad,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $entidad); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_entidad()
    {
        $entidad = factory(Entidad::class)->create();
        $dbEntidad = $this->entidadRepo->find($entidad->id);
        $dbEntidad = $dbEntidad->toArray();
        $this->assertModelData($entidad->toArray(), $dbEntidad);
    }

    /**
     * @test editar
     */
    public function test_editar_entidad()
    {
        //Se crea un objeto y se generan datos para edición  
        $entidad = factory(Entidad::class)->create();
        $fakeEntidad = factory(Entidad::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('entidades.entidades.update', $entidad->id);
        $response = $this->patch($url,$fakeEntidad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoEntidad = Entidad::find($entidad->id);
        $this->assertModelData($fakeEntidad, $objetoEntidad->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $entidad = factory(Entidad::class)->create(); 
        $url = route('entidades.entidades.update', $entidad->id);
        $response = $this->patch($url, $fakeEntidad); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_entidad()
    {
        $entidad = factory(Entidad::class)->create();
        $resp = $this->entidadRepo->delete($entidad->id);
        $this->assertNull(Entidad::find($entidad->id), 'El modelo no debe existir en BD.');
    }
}
