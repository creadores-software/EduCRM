<?php namespace Tests\Repositories;

use App\Models\Parametros\Beneficio;
use App\Repositories\Parametros\BeneficioRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class BeneficioRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var BeneficioRepository
     */
    protected $beneficioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->beneficioRepo = \App::make(BeneficioRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_beneficio()
    {
        $beneficio = factory(Beneficio::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.beneficios.store');
        $response = $this->post($url, $beneficio); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoBeneficio = Beneficio::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($beneficio, $objetoBeneficio),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $beneficio); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_beneficio()
    {
        $beneficio = factory(Beneficio::class)->create();
        $dbBeneficio = $this->beneficioRepo->find($beneficio->id);
        $dbBeneficio = $dbBeneficio->toArray();
        $this->assertTrue($this->sonDatosIguales($beneficio->toArray(),$dbBeneficio),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_beneficio()
    {
        //Se crea un objeto y se generan datos para edición  
        $beneficio = factory(Beneficio::class)->create();
        $fakeBeneficio = factory(Beneficio::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.beneficios.update', $beneficio->id);
        $response = $this->patch($url,$fakeBeneficio); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoBeneficio = Beneficio::find($beneficio->id);
        $this->assertTrue($this->sonDatosIguales($fakeBeneficio, $objetoBeneficio->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_beneficio()
    {
        $beneficio = factory(Beneficio::class)->create();
        $resp = $this->beneficioRepo->delete($beneficio->id);
        $this->assertNull(Beneficio::find($beneficio->id), 'El modelo no debe existir en BD.');
    }
}
