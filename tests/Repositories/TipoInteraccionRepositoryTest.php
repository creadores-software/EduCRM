<?php namespace Tests\Repositories;

use App\Models\Campanias\TipoInteraccion;
use App\Repositories\Campanias\TipoInteraccionRepository;
use App\Http\Requests\Campanias\CreateTipoInteraccionRequest;
use App\Http\Requests\Campanias\UpdateTipoInteraccionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class TipoInteraccionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TipoInteraccionRepository
     */
    protected $tipoInteraccionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoInteraccionRepo = \App::make(TipoInteraccionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_interaccion()
    {
        $tipoInteraccion = factory(TipoInteraccion::class)->make()->toArray();

        $rules = (new CreateTipoInteraccionRequest())->rules();
        $validator = Validator::make($tipoInteraccion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoInteraccion = $this->tipoInteraccionRepo->create($tipoInteraccion);
        $objetoTipoInteraccion = $objetoTipoInteraccion->toArray();

        $this->assertArrayHasKey('id', $objetoTipoInteraccion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoTipoInteraccion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(TipoInteraccion::find($objetoTipoInteraccion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($tipoInteraccion, $objetoTipoInteraccion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($tipoInteraccion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_interaccion()
    {
        $tipoInteraccion = factory(TipoInteraccion::class)->create();

        $dbTipoInteraccion = $this->tipoInteraccionRepo->find($tipoInteraccion->id);

        $dbTipoInteraccion = $dbTipoInteraccion->toArray();
        $this->assertModelData($tipoInteraccion->toArray(), $dbTipoInteraccion);
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_interaccion()
    {
        $tipoInteraccion = factory(TipoInteraccion::class)->create();
        $fakeTipoInteraccion = factory(TipoInteraccion::class)->make()->toArray();

        $rules = (new UpdateTipoInteraccionRequest())->rules();
        $validator = Validator::make($fakeTipoInteraccion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoInteraccion = $this->tipoInteraccionRepo->update($fakeTipoInteraccion, $tipoInteraccion->id);

        $this->assertModelData($fakeTipoInteraccion, $objetoTipoInteraccion->toArray(),'El modelo no quedó con los datos editados.');
        $dbTipoInteraccion = $this->tipoInteraccionRepo->find($tipoInteraccion->id);
        $this->assertModelData($fakeTipoInteraccion, $dbTipoInteraccion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_interaccion()
    {
        $tipoInteraccion = factory(TipoInteraccion::class)->create();

        $resp = $this->tipoInteraccionRepo->delete($tipoInteraccion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(TipoInteraccion::find($tipoInteraccion->id), 'El modelo no debe existir en BD.');
    }
}
