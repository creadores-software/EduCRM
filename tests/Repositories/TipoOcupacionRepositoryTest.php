<?php namespace Tests\Repositories;

use App\Models\Entidades\TipoOcupacion;
use App\Repositories\Entidades\TipoOcupacionRepository;
use App\Http\Requests\Entidades\CreateTipoOcupacionRequest;
use App\Http\Requests\Entidades\UpdateTipoOcupacionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class TipoOcupacionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TipoOcupacionRepository
     */
    protected $tipoOcupacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoOcupacionRepo = \App::make(TipoOcupacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_ocupacion()
    {
        $tipoOcupacion = factory(TipoOcupacion::class)->make()->toArray();

        $rules = (new CreateTipoOcupacionRequest())->rules();
        $validator = Validator::make($tipoOcupacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoOcupacion = $this->tipoOcupacionRepo->create($tipoOcupacion);
        $objetoTipoOcupacion = $objetoTipoOcupacion->toArray();

        $this->assertArrayHasKey('id', $objetoTipoOcupacion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoTipoOcupacion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(TipoOcupacion::find($objetoTipoOcupacion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($tipoOcupacion, $objetoTipoOcupacion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($tipoOcupacion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_ocupacion()
    {
        $tipoOcupacion = factory(TipoOcupacion::class)->create();

        $dbTipoOcupacion = $this->tipoOcupacionRepo->find($tipoOcupacion->id);

        $dbTipoOcupacion = $dbTipoOcupacion->toArray();
        $this->assertModelData($tipoOcupacion->toArray(), $dbTipoOcupacion);
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_ocupacion()
    {
        $tipoOcupacion = factory(TipoOcupacion::class)->create();
        $fakeTipoOcupacion = factory(TipoOcupacion::class)->make()->toArray();

        $rules = (new UpdateTipoOcupacionRequest())->rules();
        $validator = Validator::make($fakeTipoOcupacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoOcupacion = $this->tipoOcupacionRepo->update($fakeTipoOcupacion, $tipoOcupacion->id);

        $this->assertModelData($fakeTipoOcupacion, $objetoTipoOcupacion->toArray(),'El modelo no quedó con los datos editados.');
        $dbTipoOcupacion = $this->tipoOcupacionRepo->find($tipoOcupacion->id);
        $this->assertModelData($fakeTipoOcupacion, $dbTipoOcupacion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_ocupacion()
    {
        $tipoOcupacion = factory(TipoOcupacion::class)->create();

        $resp = $this->tipoOcupacionRepo->delete($tipoOcupacion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(TipoOcupacion::find($tipoOcupacion->id), 'El modelo no debe existir en BD.');
    }
}
