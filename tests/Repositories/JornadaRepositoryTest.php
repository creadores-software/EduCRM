<?php namespace Tests\Repositories;

use App\Models\Formaciones\Jornada;
use App\Repositories\Formaciones\JornadaRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class JornadaRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var JornadaRepository
     */
    protected $jornadaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->jornadaRepo = \App::make(JornadaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_jornada()
    {
        $jornada = factory(Jornada::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('formaciones.jornadas.store');
        $response = $this->post($url, $jornada); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoJornada = Jornada::latest()->first()->toArray();
        $this->assertModelData($jornada, $objetoJornada,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $jornada); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_jornada()
    {
        $jornada = factory(Jornada::class)->create();
        $dbJornada = $this->jornadaRepo->find($jornada->id);
        $dbJornada = $dbJornada->toArray();
        $this->assertModelData($jornada->toArray(), $dbJornada);
    }

    /**
     * @test editar
     */
    public function test_editar_jornada()
    {
        //Se crea un objeto y se generan datos para edición  
        $jornada = factory(Jornada::class)->create();
        $fakeJornada = factory(Jornada::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('formaciones.jornadas.update', $jornada->id);
        $response = $this->patch($url,$fakeJornada); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoJornada = Jornada::find($jornada->id);
        $this->assertModelData($fakeJornada, $objetoJornada->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $jornada = factory(Jornada::class)->create(); 
        $url = route('formaciones.jornadas.update', $jornada->id);
        $response = $this->patch($url, $fakeJornada); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_jornada()
    {
        $jornada = factory(Jornada::class)->create();
        $resp = $this->jornadaRepo->delete($jornada->id);
        $this->assertNull(Jornada::find($jornada->id), 'El modelo no debe existir en BD.');
    }
}
