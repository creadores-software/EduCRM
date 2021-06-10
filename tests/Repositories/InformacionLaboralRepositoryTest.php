<?php namespace Tests\Repositories;

use App\Models\Contactos\InformacionLaboral;
use App\Repositories\Contactos\InformacionLaboralRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class InformacionLaboralRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var InformacionLaboralRepository
     */
    protected $informacionLaboralRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->informacionLaboralRepo = \App::make(InformacionLaboralRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_informacion_laboral()
    {
        $informacionLaboral = factory(InformacionLaboral::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('contactos.informacionesLaborales.store');
        $response = $this->post($url, $informacionLaboral); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoInformacionLaboral = InformacionLaboral::latest()->first()->toArray();
        $this->assertModelData($informacionLaboral, $objetoInformacionLaboral,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $informacionLaboral); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_informacion_laboral()
    {
        $informacionLaboral = factory(InformacionLaboral::class)->create();
        $dbInformacionLaboral = $this->informacionLaboralRepo->find($informacionLaboral->id);
        $dbInformacionLaboral = $dbInformacionLaboral->toArray();
        $this->assertModelData($informacionLaboral->toArray(), $dbInformacionLaboral);
    }

    /**
     * @test editar
     */
    public function test_editar_informacion_laboral()
    {
        //Se crea un objeto y se generan datos para edición  
        $informacionLaboral = factory(InformacionLaboral::class)->create();
        $fakeInformacionLaboral = factory(InformacionLaboral::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('contactos.informacionesLaborales.update', $informacionLaboral->id);
        $response = $this->patch($url,$fakeInformacionLaboral); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoInformacionLaboral = InformacionLaboral::find($informacionLaboral->id);
        $this->assertModelData($fakeInformacionLaboral, $objetoInformacionLaboral->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $informacionLaboral = factory(InformacionLaboral::class)->create(); 
        $url = route('contactos.informacionesLaborales.update', $informacionLaboral->id);
        $response = $this->patch($url, $fakeInformacionLaboral); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_informacion_laboral()
    {
        $informacionLaboral = factory(InformacionLaboral::class)->create();
        $resp = $this->informacionLaboralRepo->delete($informacionLaboral->id);
        $this->assertNull(InformacionLaboral::find($informacionLaboral->id), 'El modelo no debe existir en BD.');
    }
}
