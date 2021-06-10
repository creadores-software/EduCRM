<?php namespace Tests\Repositories;

use App\Models\Formaciones\Formacion;
use App\Repositories\Formaciones\FormacionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class FormacionRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var FormacionRepository
     */
    protected $formacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->formacionRepo = \App::make(FormacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_formacion()
    {
        $formacion = factory(Formacion::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('formaciones.formaciones.store');
        $response = $this->post($url, $formacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoFormacion = Formacion::latest()->first()->toArray();
        $this->assertModelData($formacion, $objetoFormacion,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $formacion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_formacion()
    {
        $formacion = factory(Formacion::class)->create();
        $dbFormacion = $this->formacionRepo->find($formacion->id);
        $dbFormacion = $dbFormacion->toArray();
        $this->assertModelData($formacion->toArray(), $dbFormacion);
    }

    /**
     * @test editar
     */
    public function test_editar_formacion()
    {
        //Se crea un objeto y se generan datos para edición  
        $formacion = factory(Formacion::class)->create();
        $fakeFormacion = factory(Formacion::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('formaciones.formaciones.update', $formacion->id);
        $response = $this->patch($url,$fakeFormacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoFormacion = Formacion::find($formacion->id);
        $this->assertModelData($fakeFormacion, $objetoFormacion->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $formacion = factory(Formacion::class)->create(); 
        $url = route('formaciones.formaciones.update', $formacion->id);
        $response = $this->patch($url, $fakeFormacion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_formacion()
    {
        $formacion = factory(Formacion::class)->create();
        $resp = $this->formacionRepo->delete($formacion->id);
        $this->assertNull(Formacion::find($formacion->id), 'El modelo no debe existir en BD.');
    }
}
