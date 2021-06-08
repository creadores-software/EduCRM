<?php namespace Tests\Repositories;

use App\Models\Campanias\TipoEstadoColor;
use App\Repositories\Campanias\TipoEstadoColorRepository;
use App\Http\Requests\Campanias\CreateTipoEstadoColorRequest;
use App\Http\Requests\Campanias\UpdateTipoEstadoColorRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class TipoEstadoColorRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TipoEstadoColorRepository
     */
    protected $tipoEstadoColorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoEstadoColorRepo = \App::make(TipoEstadoColorRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_estado_color()
    {
        $tipoEstadoColor = factory(TipoEstadoColor::class)->make()->toArray();

        $rules = (new CreateTipoEstadoColorRequest())->rules();
        $validator = Validator::make($tipoEstadoColor, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoEstadoColor = $this->tipoEstadoColorRepo->create($tipoEstadoColor);
        $objetoTipoEstadoColor = $objetoTipoEstadoColor->toArray();

        $this->assertArrayHasKey('id', $objetoTipoEstadoColor, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoTipoEstadoColor['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(TipoEstadoColor::find($objetoTipoEstadoColor['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($tipoEstadoColor, $objetoTipoEstadoColor,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($tipoEstadoColor, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_estado_color()
    {
        $tipoEstadoColor = factory(TipoEstadoColor::class)->create();

        $dbTipoEstadoColor = $this->tipoEstadoColorRepo->find($tipoEstadoColor->id);

        $dbTipoEstadoColor = $dbTipoEstadoColor->toArray();
        $this->assertModelData($tipoEstadoColor->toArray(), $dbTipoEstadoColor);
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_estado_color()
    {
        $tipoEstadoColor = factory(TipoEstadoColor::class)->create();
        $fakeTipoEstadoColor = factory(TipoEstadoColor::class)->make()->toArray();

        $rules = (new UpdateTipoEstadoColorRequest())->rules();
        $validator = Validator::make($fakeTipoEstadoColor, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoEstadoColor = $this->tipoEstadoColorRepo->update($fakeTipoEstadoColor, $tipoEstadoColor->id);

        $this->assertModelData($fakeTipoEstadoColor, $objetoTipoEstadoColor->toArray(),'El modelo no quedó con los datos editados.');
        $dbTipoEstadoColor = $this->tipoEstadoColorRepo->find($tipoEstadoColor->id);
        $this->assertModelData($fakeTipoEstadoColor, $dbTipoEstadoColor->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_estado_color()
    {
        $tipoEstadoColor = factory(TipoEstadoColor::class)->create();

        $resp = $this->tipoEstadoColorRepo->delete($tipoEstadoColor->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(TipoEstadoColor::find($tipoEstadoColor->id), 'El modelo no debe existir en BD.');
    }
}
