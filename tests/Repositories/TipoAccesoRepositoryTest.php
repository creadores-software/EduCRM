<?php namespace Tests\Repositories;

use App\Models\Formaciones\TipoAcceso;
use App\Repositories\Formaciones\TipoAccesoRepository;
use App\Http\Requests\Formaciones\CreateTipoAccesoRequest;
use App\Http\Requests\Formaciones\UpdateTipoAccesoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class TipoAccesoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TipoAccesoRepository
     */
    protected $tipoAccesoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoAccesoRepo = \App::make(TipoAccesoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_acceso()
    {
        $tipoAcceso = factory(TipoAcceso::class)->make()->toArray();

        $rules = (new CreateTipoAccesoRequest())->rules();
        $validator = Validator::make($tipoAcceso, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoAcceso = $this->tipoAccesoRepo->create($tipoAcceso);
        $objetoTipoAcceso = $objetoTipoAcceso->toArray();

        $this->assertArrayHasKey('id', $objetoTipoAcceso, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoTipoAcceso['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(TipoAcceso::find($objetoTipoAcceso['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($tipoAcceso, $objetoTipoAcceso,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($tipoAcceso, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_acceso()
    {
        $tipoAcceso = factory(TipoAcceso::class)->create();

        $dbTipoAcceso = $this->tipoAccesoRepo->find($tipoAcceso->id);

        $dbTipoAcceso = $dbTipoAcceso->toArray();
        $this->assertModelData($tipoAcceso->toArray(), $dbTipoAcceso);
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_acceso()
    {
        $tipoAcceso = factory(TipoAcceso::class)->create();
        $fakeTipoAcceso = factory(TipoAcceso::class)->make()->toArray();

        $rules = (new UpdateTipoAccesoRequest())->rules();
        $validator = Validator::make($fakeTipoAcceso, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoAcceso = $this->tipoAccesoRepo->update($fakeTipoAcceso, $tipoAcceso->id);

        $this->assertModelData($fakeTipoAcceso, $objetoTipoAcceso->toArray(),'El modelo no quedó con los datos editados.');
        $dbTipoAcceso = $this->tipoAccesoRepo->find($tipoAcceso->id);
        $this->assertModelData($fakeTipoAcceso, $dbTipoAcceso->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_acceso()
    {
        $tipoAcceso = factory(TipoAcceso::class)->create();

        $resp = $this->tipoAccesoRepo->delete($tipoAcceso->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(TipoAcceso::find($tipoAcceso->id), 'El modelo no debe existir en BD.');
    }
}
