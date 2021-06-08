<?php namespace Tests\Repositories;

use App\Models\Entidades\CategoriaActividadEconomica;
use App\Repositories\Entidades\CategoriaActividadEconomicaRepository;
use App\Http\Requests\Entidades\CreateCategoriaActividadEconomicaRequest;
use App\Http\Requests\Entidades\UpdateCategoriaActividadEconomicaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class CategoriaActividadEconomicaRepositoryTest extends TestCase
{
    use RefreshDatabase;

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

        $rules = (new CreateCategoriaActividadEconomicaRequest())->rules();
        $validator = Validator::make($categoriaActividadEconomica, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoCategoriaActividadEconomica = $this->categoriaActividadEconomicaRepo->create($categoriaActividadEconomica);
        $objetoCategoriaActividadEconomica = $objetoCategoriaActividadEconomica->toArray();

        $this->assertArrayHasKey('id', $objetoCategoriaActividadEconomica, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoCategoriaActividadEconomica['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(CategoriaActividadEconomica::find($objetoCategoriaActividadEconomica['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($categoriaActividadEconomica, $objetoCategoriaActividadEconomica,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($categoriaActividadEconomica, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_categoria_actividad_economica()
    {
        $categoriaActividadEconomica = factory(CategoriaActividadEconomica::class)->create();

        $dbCategoriaActividadEconomica = $this->categoriaActividadEconomicaRepo->find($categoriaActividadEconomica->id);

        $dbCategoriaActividadEconomica = $dbCategoriaActividadEconomica->toArray();
        $this->assertModelData($categoriaActividadEconomica->toArray(), $dbCategoriaActividadEconomica);
    }

    /**
     * @test editar
     */
    public function test_editar_categoria_actividad_economica()
    {
        $categoriaActividadEconomica = factory(CategoriaActividadEconomica::class)->create();
        $fakeCategoriaActividadEconomica = factory(CategoriaActividadEconomica::class)->make()->toArray();

        $rules = (new UpdateCategoriaActividadEconomicaRequest())->rules();
        $validator = Validator::make($fakeCategoriaActividadEconomica, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoCategoriaActividadEconomica = $this->categoriaActividadEconomicaRepo->update($fakeCategoriaActividadEconomica, $categoriaActividadEconomica->id);

        $this->assertModelData($fakeCategoriaActividadEconomica, $objetoCategoriaActividadEconomica->toArray(),'El modelo no quedó con los datos editados.');
        $dbCategoriaActividadEconomica = $this->categoriaActividadEconomicaRepo->find($categoriaActividadEconomica->id);
        $this->assertModelData($fakeCategoriaActividadEconomica, $dbCategoriaActividadEconomica->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_categoria_actividad_economica()
    {
        $categoriaActividadEconomica = factory(CategoriaActividadEconomica::class)->create();

        $resp = $this->categoriaActividadEconomicaRepo->delete($categoriaActividadEconomica->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(CategoriaActividadEconomica::find($categoriaActividadEconomica->id), 'El modelo no debe existir en BD.');
    }
}
