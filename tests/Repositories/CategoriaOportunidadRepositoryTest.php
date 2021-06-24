<?php namespace Tests\Repositories;

use App\Models\Campanias\CategoriaOportunidad;
use App\Repositories\Campanias\CategoriaOportunidadRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CategoriaOportunidadRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var CategoriaOportunidadRepository
     */
    protected $categoriaOportunidadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->categoriaOportunidadRepo = \App::make(CategoriaOportunidadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_categoria_oportunidad()
    {
        $categoriaOportunidad = factory(CategoriaOportunidad::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('campanias.categoriasOportunidad.store');
        $response = $this->post($url, $categoriaOportunidad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoCategoriaOportunidad = CategoriaOportunidad::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($categoriaOportunidad, $objetoCategoriaOportunidad),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $categoriaOportunidad); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_categoria_oportunidad()
    {
        $categoriaOportunidad = factory(CategoriaOportunidad::class)->create();
        $dbCategoriaOportunidad = $this->categoriaOportunidadRepo->find($categoriaOportunidad->id);
        $dbCategoriaOportunidad = $dbCategoriaOportunidad->toArray();
        $this->assertTrue($this->sonDatosIguales($categoriaOportunidad->toArray(),$dbCategoriaOportunidad),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_categoria_oportunidad()
    {
        //Se crea un objeto y se generan datos para edición  
        $categoriaOportunidad = factory(CategoriaOportunidad::class)->create();
        $fakeCategoriaOportunidad = factory(CategoriaOportunidad::class)->make()->toArray();  
        $fakeCategoriaOportunidad['testRepository']=true;
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('campanias.categoriasOportunidad.update', $categoriaOportunidad->id);
        $response = $this->patch($url,$fakeCategoriaOportunidad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoCategoriaOportunidad = CategoriaOportunidad::find($categoriaOportunidad->id);
        $this->assertTrue($this->sonDatosIguales($fakeCategoriaOportunidad, $objetoCategoriaOportunidad->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_categoria_oportunidad()
    {
        $categoriaOportunidad = factory(CategoriaOportunidad::class)->create();
        $resp = $this->categoriaOportunidadRepo->delete($categoriaOportunidad->id);
        $this->assertNull(CategoriaOportunidad::find($categoriaOportunidad->id), 'El modelo no debe existir en BD.');
    }
}
