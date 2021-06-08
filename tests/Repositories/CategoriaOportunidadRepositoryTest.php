<?php namespace Tests\Repositories;

use App\Models\Campanias\CategoriaOportunidad;
use App\Repositories\Campanias\CategoriaOportunidadRepository;
use App\Http\Requests\Campanias\CreateCategoriaOportunidadRequest;
use App\Http\Requests\Campanias\UpdateCategoriaOportunidadRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class CategoriaOportunidadRepositoryTest extends TestCase
{
    use RefreshDatabase;

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

        $rules = (new CreateCategoriaOportunidadRequest())->rules();
        $validator = Validator::make($categoriaOportunidad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoCategoriaOportunidad = $this->categoriaOportunidadRepo->create($categoriaOportunidad);
        $objetoCategoriaOportunidad = $objetoCategoriaOportunidad->toArray();

        $this->assertArrayHasKey('id', $objetoCategoriaOportunidad, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoCategoriaOportunidad['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(CategoriaOportunidad::find($objetoCategoriaOportunidad['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($categoriaOportunidad, $objetoCategoriaOportunidad,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($categoriaOportunidad, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_categoria_oportunidad()
    {
        $categoriaOportunidad = factory(CategoriaOportunidad::class)->create();

        $dbCategoriaOportunidad = $this->categoriaOportunidadRepo->find($categoriaOportunidad->id);

        $dbCategoriaOportunidad = $dbCategoriaOportunidad->toArray();
        $this->assertModelData($categoriaOportunidad->toArray(), $dbCategoriaOportunidad);
    }

    /**
     * @test editar
     */
    public function test_editar_categoria_oportunidad()
    {
        $categoriaOportunidad = factory(CategoriaOportunidad::class)->create();
        $fakeCategoriaOportunidad = factory(CategoriaOportunidad::class)->make()->toArray();

        $rules = (new UpdateCategoriaOportunidadRequest())->rules();
        $validator = Validator::make($fakeCategoriaOportunidad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoCategoriaOportunidad = $this->categoriaOportunidadRepo->update($fakeCategoriaOportunidad, $categoriaOportunidad->id);

        $this->assertModelData($fakeCategoriaOportunidad, $objetoCategoriaOportunidad->toArray(),'El modelo no quedó con los datos editados.');
        $dbCategoriaOportunidad = $this->categoriaOportunidadRepo->find($categoriaOportunidad->id);
        $this->assertModelData($fakeCategoriaOportunidad, $dbCategoriaOportunidad->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_categoria_oportunidad()
    {
        $categoriaOportunidad = factory(CategoriaOportunidad::class)->create();

        $resp = $this->categoriaOportunidadRepo->delete($categoriaOportunidad->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(CategoriaOportunidad::find($categoriaOportunidad->id), 'El modelo no debe existir en BD.');
    }
}
