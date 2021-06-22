<?php namespace Tests\Repositories;

use App\Models\Formaciones\CategoriaCampoEducacion;
use App\Repositories\Formaciones\CategoriaCampoEducacionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CategoriaCampoEducacionRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var CategoriaCampoEducacionRepository
     */
    protected $categoriaCampoEducacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->categoriaCampoEducacionRepo = \App::make(CategoriaCampoEducacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_categoria_campo_educacion()
    {
        $categoriaCampoEducacion = factory(CategoriaCampoEducacion::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('formaciones.categoriasCampoEducacion.store');
        $response = $this->post($url, $categoriaCampoEducacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoCategoriaCampoEducacion = CategoriaCampoEducacion::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($categoriaCampoEducacion, $objetoCategoriaCampoEducacion),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $categoriaCampoEducacion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_categoria_campo_educacion()
    {
        $categoriaCampoEducacion = factory(CategoriaCampoEducacion::class)->create();
        $dbCategoriaCampoEducacion = $this->categoriaCampoEducacionRepo->find($categoriaCampoEducacion->id);
        $dbCategoriaCampoEducacion = $dbCategoriaCampoEducacion->toArray();
        $this->assertTrue($this->sonDatosIguales($categoriaCampoEducacion->toArray(),$dbCategoriaCampoEducacion),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_categoria_campo_educacion()
    {
        //Se crea un objeto y se generan datos para edición  
        $categoriaCampoEducacion = factory(CategoriaCampoEducacion::class)->create();
        $fakeCategoriaCampoEducacion = factory(CategoriaCampoEducacion::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('formaciones.categoriasCampoEducacion.update', $categoriaCampoEducacion->id);
        $response = $this->patch($url,$fakeCategoriaCampoEducacion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoCategoriaCampoEducacion = CategoriaCampoEducacion::find($categoriaCampoEducacion->id);
        $this->assertTrue($this->sonDatosIguales($fakeCategoriaCampoEducacion, $objetoCategoriaCampoEducacion->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_categoria_campo_educacion()
    {
        $categoriaCampoEducacion = factory(CategoriaCampoEducacion::class)->create();
        $resp = $this->categoriaCampoEducacionRepo->delete($categoriaCampoEducacion->id);
        $this->assertNull(CategoriaCampoEducacion::find($categoriaCampoEducacion->id), 'El modelo no debe existir en BD.');
    }
}
