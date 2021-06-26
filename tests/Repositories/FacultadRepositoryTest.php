<?php namespace Tests\Repositories;

use App\Models\Formaciones\Facultad;
use App\Repositories\Formaciones\FacultadRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class FacultadRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var FacultadRepository
     */
    protected $facultadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->facultadRepo = \App::make(FacultadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_facultad()
    {
        $facultad = factory(Facultad::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('formaciones.facultades.store');
        $response = $this->post($url, $facultad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoFacultad = Facultad::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($facultad, $objetoFacultad),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $facultad); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_facultad()
    {
        $facultad = factory(Facultad::class)->create();
        $dbFacultad = $this->facultadRepo->find($facultad->id);
        $dbFacultad = $dbFacultad->toArray();
        $this->assertTrue($this->sonDatosIguales($facultad->toArray(),$dbFacultad),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_facultad()
    {
        //Se crea un objeto y se generan datos para edición  
        $facultad = factory(Facultad::class)->create();
        $fakeFacultad = factory(Facultad::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('formaciones.facultades.update', $facultad->id);
        $response = $this->patch($url,$fakeFacultad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoFacultad = Facultad::find($facultad->id);
        $this->assertTrue($this->sonDatosIguales($fakeFacultad, $objetoFacultad->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_facultad()
    {
        $facultad = factory(Facultad::class)->create();
        $resp = $this->facultadRepo->delete($facultad->id);
        $this->assertNull(Facultad::find($facultad->id), 'El modelo no debe existir en BD.');
    }
}
