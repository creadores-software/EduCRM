<?php namespace Tests\Repositories;

use App\Models\Parametros\EstadoCivil;
use App\Repositories\Parametros\EstadoCivilRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EstadoCivilRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var EstadoCivilRepository
     */
    protected $estadoCivilRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estadoCivilRepo = \App::make(EstadoCivilRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_estado_civil()
    {
        $estadoCivil = factory(EstadoCivil::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.estadosCiviles.store');
        $response = $this->post($url, $estadoCivil); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoEstadoCivil = EstadoCivil::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($estadoCivil, $objetoEstadoCivil),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $estadoCivil); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_estado_civil()
    {
        $estadoCivil = factory(EstadoCivil::class)->create();
        $dbEstadoCivil = $this->estadoCivilRepo->find($estadoCivil->id);
        $dbEstadoCivil = $dbEstadoCivil->toArray();
        $this->assertTrue($this->sonDatosIguales($estadoCivil->toArray(),$dbEstadoCivil),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_estado_civil()
    {
        //Se crea un objeto y se generan datos para edición  
        $estadoCivil = factory(EstadoCivil::class)->create();
        $fakeEstadoCivil = factory(EstadoCivil::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.estadosCiviles.update', $estadoCivil->id);
        $response = $this->patch($url,$fakeEstadoCivil); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoEstadoCivil = EstadoCivil::find($estadoCivil->id);
        $this->assertTrue($this->sonDatosIguales($fakeEstadoCivil, $objetoEstadoCivil->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_estado_civil()
    {
        $estadoCivil = factory(EstadoCivil::class)->create();
        $resp = $this->estadoCivilRepo->delete($estadoCivil->id);
        $this->assertNull(EstadoCivil::find($estadoCivil->id), 'El modelo no debe existir en BD.');
    }
}
