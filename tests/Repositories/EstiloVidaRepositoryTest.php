<?php namespace Tests\Repositories;

use App\Models\Parametros\EstiloVida;
use App\Repositories\Parametros\EstiloVidaRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EstiloVidaRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var EstiloVidaRepository
     */
    protected $estiloVidaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estiloVidaRepo = \App::make(EstiloVidaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_estilo_vida()
    {
        $estiloVida = factory(EstiloVida::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.estilosVida.store');
        $response = $this->post($url, $estiloVida); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoEstiloVida = EstiloVida::latest()->first()->toArray();
        $this->assertModelData($estiloVida, $objetoEstiloVida,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $estiloVida); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_estilo_vida()
    {
        $estiloVida = factory(EstiloVida::class)->create();
        $dbEstiloVida = $this->estiloVidaRepo->find($estiloVida->id);
        $dbEstiloVida = $dbEstiloVida->toArray();
        $this->assertModelData($estiloVida->toArray(), $dbEstiloVida);
    }

    /**
     * @test editar
     */
    public function test_editar_estilo_vida()
    {
        //Se crea un objeto y se generan datos para edición  
        $estiloVida = factory(EstiloVida::class)->create();
        $fakeEstiloVida = factory(EstiloVida::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.estilosVida.update', $estiloVida->id);
        $response = $this->patch($url,$fakeEstiloVida); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoEstiloVida = EstiloVida::find($estiloVida->id);
        $this->assertModelData($fakeEstiloVida, $objetoEstiloVida->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $estiloVida = factory(EstiloVida::class)->create(); 
        $url = route('parametros.estilosVida.update', $estiloVida->id);
        $response = $this->patch($url, $fakeEstiloVida); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_estilo_vida()
    {
        $estiloVida = factory(EstiloVida::class)->create();
        $resp = $this->estiloVidaRepo->delete($estiloVida->id);
        $this->assertNull(EstiloVida::find($estiloVida->id), 'El modelo no debe existir en BD.');
    }
}
