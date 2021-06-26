<?php namespace Tests\Repositories;

use App\Models\Contactos\InformacionUniversitaria;
use App\Repositories\Contactos\InformacionUniversitariaRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class InformacionUniversitariaRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var InformacionUniversitariaRepository
     */
    protected $informacionUniversitariaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->informacionUniversitariaRepo = \App::make(InformacionUniversitariaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_informacion_universitaria()
    {
        $informacionUniversitaria = factory(InformacionUniversitaria::class)->make()->toArray();
        $informacionUniversitaria['testRepository']=true;
        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('contactos.informacionesUniversitarias.store');
        $response = $this->post($url, $informacionUniversitaria); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoInformacionUniversitaria = InformacionUniversitaria::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($informacionUniversitaria, $objetoInformacionUniversitaria),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        unset($informacionUniversitaria['testRepository']);
        $response = $this->post($url, $informacionUniversitaria); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_informacion_universitaria()
    {
        $informacionUniversitaria = factory(InformacionUniversitaria::class)->create();
        $dbInformacionUniversitaria = $this->informacionUniversitariaRepo->find($informacionUniversitaria->id);
        $dbInformacionUniversitaria = $dbInformacionUniversitaria->toArray();
        $this->assertTrue($this->sonDatosIguales($informacionUniversitaria->toArray(),$dbInformacionUniversitaria),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_informacion_universitaria()
    {
        //Se crea un objeto y se generan datos para edición  
        $informacionUniversitaria = factory(InformacionUniversitaria::class)->create();
        $fakeInformacionUniversitaria = factory(InformacionUniversitaria::class)->make()->toArray();  
        $fakeInformacionUniversitaria['testRepository']=true;
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('contactos.informacionesUniversitarias.update', $informacionUniversitaria->id);
        $response = $this->patch($url,$fakeInformacionUniversitaria); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoInformacionUniversitaria = InformacionUniversitaria::find($informacionUniversitaria->id);
        $this->assertTrue($this->sonDatosIguales($fakeInformacionUniversitaria, $objetoInformacionUniversitaria->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_informacion_universitaria()
    {
        $informacionUniversitaria = factory(InformacionUniversitaria::class)->create();
        $resp = $this->informacionUniversitariaRepo->delete($informacionUniversitaria->id);
        $this->assertNull(InformacionUniversitaria::find($informacionUniversitaria->id), 'El modelo no debe existir en BD.');
    }
}
