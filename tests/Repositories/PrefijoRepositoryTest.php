<?php namespace Tests\Repositories;

use App\Models\Parametros\Prefijo;
use App\Repositories\Parametros\PrefijoRepository;
use App\Http\Requests\Parametros\CreatePrefijoRequest;
use App\Http\Requests\Parametros\UpdatePrefijoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PrefijoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var PrefijoRepository
     */
    protected $prefijoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->prefijoRepo = \App::make(PrefijoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_prefijo()
    {
        $prefijo = factory(Prefijo::class)->make()->toArray();

        $rules = (new CreatePrefijoRequest())->rules();
        $validator = Validator::make($prefijo, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPrefijo = $this->prefijoRepo->create($prefijo);
        $objetoPrefijo = $objetoPrefijo->toArray();

        $this->assertArrayHasKey('id', $objetoPrefijo, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoPrefijo['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Prefijo::find($objetoPrefijo['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($prefijo, $objetoPrefijo,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($prefijo, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_prefijo()
    {
        $prefijo = factory(Prefijo::class)->create();

        $dbPrefijo = $this->prefijoRepo->find($prefijo->id);

        $dbPrefijo = $dbPrefijo->toArray();
        $this->assertModelData($prefijo->toArray(), $dbPrefijo);
    }

    /**
     * @test editar
     */
    public function test_editar_prefijo()
    {
        $prefijo = factory(Prefijo::class)->create();
        $fakePrefijo = factory(Prefijo::class)->make()->toArray();

        $rules = (new UpdatePrefijoRequest())->rules();
        $validator = Validator::make($fakePrefijo, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPrefijo = $this->prefijoRepo->update($fakePrefijo, $prefijo->id);

        $this->assertModelData($fakePrefijo, $objetoPrefijo->toArray(),'El modelo no quedó con los datos editados.');
        $dbPrefijo = $this->prefijoRepo->find($prefijo->id);
        $this->assertModelData($fakePrefijo, $dbPrefijo->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_prefijo()
    {
        $prefijo = factory(Prefijo::class)->create();

        $resp = $this->prefijoRepo->delete($prefijo->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Prefijo::find($prefijo->id), 'El modelo no debe existir en BD.');
    }
}
