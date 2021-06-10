<?php namespace Tests\Repositories;

use App\Models\Contactos\InformacionRelacional;
use App\Repositories\Contactos\InformacionRelacionalRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class InformacionRelacionalRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var InformacionRelacionalRepository
     */
    protected $informacionRelacionalRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->informacionRelacionalRepo = \App::make(InformacionRelacionalRepository::class);
    }

    /**
     * @test crear
     * Es diferente a los demás pues la creación se hace desde el modelo Contacto y no por controlador.
     */
    public function test_crear_informacion_relacional()
    {
        $informacionRelacional = factory(InformacionRelacional::class)->make()->toArray();

        $objetoInformacionRelacional = $this->informacionRelacionalRepo->create($informacionRelacional);
        $objetoInformacionRelacional = $objetoInformacionRelacional->toArray();

        $this->assertArrayHasKey('id', $objetoInformacionRelacional, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoInformacionRelacional['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(InformacionRelacional::find($objetoInformacionRelacional['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($informacionRelacional, $objetoInformacionRelacional,'El modelo guardado no coincide con el creado.');                
    }

    /**
     * @test consultar
     */
    public function test_consultar_informacion_relacional()
    {
        $informacionRelacional = factory(InformacionRelacional::class)->create();
        $dbInformacionRelacional = $this->informacionRelacionalRepo->find($informacionRelacional->id);
        $dbInformacionRelacional = $dbInformacionRelacional->toArray();
        $this->assertModelData($informacionRelacional->toArray(), $dbInformacionRelacional);
    }

    /**
     * @test editar
     */
    public function test_editar_informacion_relacional()
    {
        //Se crea un objeto y se generan datos para edición  
        $informacionRelacional = factory(InformacionRelacional::class)->create();
        $fakeInformacionRelacional = factory(InformacionRelacional::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('contactos.informacionesRelacionales.update', $informacionRelacional->id);
        $response = $this->patch($url,$fakeInformacionRelacional); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoInformacionRelacional = InformacionRelacional::find($informacionRelacional->id);
        $this->assertModelData($fakeInformacionRelacional, $objetoInformacionRelacional->toArray(),'El modelo no quedó con los datos editados.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_informacion_relacional()
    {
        $informacionRelacional = factory(InformacionRelacional::class)->create();
        $resp = $this->informacionRelacionalRepo->delete($informacionRelacional->id);
        $this->assertNull(InformacionRelacional::find($informacionRelacional->id), 'El modelo no debe existir en BD.');
    }
}
