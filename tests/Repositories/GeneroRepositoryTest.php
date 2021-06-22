<?php namespace Tests\Repositories;

use App\Models\Parametros\Genero;
use App\Repositories\Parametros\GeneroRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class GeneroRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var GeneroRepository
     */
    protected $generoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->generoRepo = \App::make(GeneroRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_genero()
    {
        $genero = factory(Genero::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.generos.store');
        $response = $this->post($url, $genero); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoGenero = Genero::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($genero, $objetoGenero),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $genero); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_genero()
    {
        $genero = factory(Genero::class)->create();
        $dbGenero = $this->generoRepo->find($genero->id);
        $dbGenero = $dbGenero->toArray();
        $this->assertTrue($this->sonDatosIguales($genero->toArray(),$dbGenero),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_genero()
    {
        //Se crea un objeto y se generan datos para edición  
        $genero = factory(Genero::class)->create();
        $fakeGenero = factory(Genero::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.generos.update', $genero->id);
        $response = $this->patch($url,$fakeGenero); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoGenero = Genero::find($genero->id);
        $this->assertTrue($this->sonDatosIguales($fakeGenero, $objetoGenero->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_genero()
    {
        $genero = factory(Genero::class)->create();
        $resp = $this->generoRepo->delete($genero->id);
        $this->assertNull(Genero::find($genero->id), 'El modelo no debe existir en BD.');
    }
}
