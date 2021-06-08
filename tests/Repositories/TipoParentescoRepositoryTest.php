<?php namespace Tests\Repositories;

use App\Models\Parametros\TipoParentesco;
use App\Repositories\Parametros\TipoParentescoRepository;
use App\Http\Requests\Parametros\CreateTipoParentescoRequest;
use App\Http\Requests\Parametros\UpdateTipoParentescoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class TipoParentescoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TipoParentescoRepository
     */
    protected $tipoParentescoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoParentescoRepo = \App::make(TipoParentescoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_parentesco()
    {
        $tipoParentesco = factory(TipoParentesco::class)->make()->toArray();

        $rules = (new CreateTipoParentescoRequest())->rules();
        $validator = Validator::make($tipoParentesco, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoParentesco = $this->tipoParentescoRepo->create($tipoParentesco);
        $objetoTipoParentesco = $objetoTipoParentesco->toArray();

        $this->assertArrayHasKey('id', $objetoTipoParentesco, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoTipoParentesco['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(TipoParentesco::find($objetoTipoParentesco['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($tipoParentesco, $objetoTipoParentesco,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($tipoParentesco, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_parentesco()
    {
        $tipoParentesco = factory(TipoParentesco::class)->create();

        $dbTipoParentesco = $this->tipoParentescoRepo->find($tipoParentesco->id);

        $dbTipoParentesco = $dbTipoParentesco->toArray();
        $this->assertModelData($tipoParentesco->toArray(), $dbTipoParentesco);
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_parentesco()
    {
        $tipoParentesco = factory(TipoParentesco::class)->create();
        $fakeTipoParentesco = factory(TipoParentesco::class)->make()->toArray();

        $rules = (new UpdateTipoParentescoRequest())->rules();
        $validator = Validator::make($fakeTipoParentesco, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoParentesco = $this->tipoParentescoRepo->update($fakeTipoParentesco, $tipoParentesco->id);

        $this->assertModelData($fakeTipoParentesco, $objetoTipoParentesco->toArray(),'El modelo no quedó con los datos editados.');
        $dbTipoParentesco = $this->tipoParentescoRepo->find($tipoParentesco->id);
        $this->assertModelData($fakeTipoParentesco, $dbTipoParentesco->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_parentesco()
    {
        $tipoParentesco = factory(TipoParentesco::class)->create();

        $resp = $this->tipoParentescoRepo->delete($tipoParentesco->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(TipoParentesco::find($tipoParentesco->id), 'El modelo no debe existir en BD.');
    }
}
