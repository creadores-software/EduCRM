<?php namespace Tests\Repositories;

use App\Models\Entidades\CategoriaActividadEconomica;
use App\Repositories\Entidades\CategoriaActividadEconomicaRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CategoriaActividadEconomicaRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var CategoriaActividadEconomicaRepository
     */
    protected $categoriaActividadEconomicaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->categoriaActividadEconomicaRepo = \App::make(CategoriaActividadEconomicaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_categoria_actividad_economica()
    {
        $categoriaActividadEconomica = factory(CategoriaActividadEconomica::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('entidades.categoriasActividadEconomica.store');
        $response = $this->post($url, $categoriaActividadEconomica); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoCategoriaActividadEconomica = CategoriaActividadEconomica::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($categoriaActividadEconomica, $objetoCategoriaActividadEconomica),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $categoriaActividadEconomica); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_categoria_actividad_economica()
    {
        $categoriaActividadEconomica = factory(CategoriaActividadEconomica::class)->create();
        $dbCategoriaActividadEconomica = $this->categoriaActividadEconomicaRepo->find($categoriaActividadEconomica->id);
        $dbCategoriaActividadEconomica = $dbCategoriaActividadEconomica->toArray();
        $this->assertTrue($this->sonDatosIguales($categoriaActividadEconomica->toArray(),$dbCategoriaActividadEconomica),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_categoria_actividad_economica()
    {
        //Se crea un objeto y se generan datos para edición  
        $categoriaActividadEconomica = factory(CategoriaActividadEconomica::class)->create();
        $fakeCategoriaActividadEconomica = factory(CategoriaActividadEconomica::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('entidades.categoriasActividadEconomica.update', $categoriaActividadEconomica->id);
        $response = $this->patch($url,$fakeCategoriaActividadEconomica); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoCategoriaActividadEconomica = CategoriaActividadEconomica::find($categoriaActividadEconomica->id);
        $this->assertTrue($this->sonDatosIguales($fakeCategoriaActividadEconomica, $objetoCategoriaActividadEconomica->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_categoria_actividad_economica()
    {
        $categoriaActividadEconomica = factory(CategoriaActividadEconomica::class)->create();
        $resp = $this->categoriaActividadEconomicaRepo->delete($categoriaActividadEconomica->id);
        $this->assertNull(CategoriaActividadEconomica::find($categoriaActividadEconomica->id), 'El modelo no debe existir en BD.');
    }
}
