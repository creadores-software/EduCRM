<?php namespace Tests\Repositories;

use App\Models\Parametros\Raza;
use App\Repositories\Parametros\RazaRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class RazaRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var RazaRepository
     */
    protected $razaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->razaRepo = \App::make(RazaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_raza()
    {
        $raza = factory(Raza::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.razas.store');
        $response = $this->post($url, $raza); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoRaza = Raza::latest()->first()->toArray();
        $this->assertModelData($raza, $objetoRaza,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $raza); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_raza()
    {
        $raza = factory(Raza::class)->create();
        $dbRaza = $this->razaRepo->find($raza->id);
        $dbRaza = $dbRaza->toArray();
        $this->assertModelData($raza->toArray(), $dbRaza);
    }

    /**
     * @test editar
     */
    public function test_editar_raza()
    {
        //Se crea un objeto y se generan datos para edición  
        $raza = factory(Raza::class)->create();
        $fakeRaza = factory(Raza::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.razas.update', $raza->id);
        $response = $this->patch($url,$fakeRaza); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoRaza = Raza::find($raza->id);
        $this->assertModelData($fakeRaza, $objetoRaza->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $raza = factory(Raza::class)->create(); 
        $url = route('parametros.razas.update', $raza->id);
        $response = $this->patch($url, $fakeRaza); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_raza()
    {
        $raza = factory(Raza::class)->create();
        $resp = $this->razaRepo->delete($raza->id);
        $this->assertNull(Raza::find($raza->id), 'El modelo no debe existir en BD.');
    }
}
