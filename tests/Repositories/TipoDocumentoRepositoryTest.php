<?php namespace Tests\Repositories;

use App\Models\Parametros\TipoDocumento;
use App\Repositories\Parametros\TipoDocumentoRepository;
use App\Http\Requests\Parametros\CreateTipoDocumentoRequest;
use App\Http\Requests\Parametros\UpdateTipoDocumentoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class TipoDocumentoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TipoDocumentoRepository
     */
    protected $tipoDocumentoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoDocumentoRepo = \App::make(TipoDocumentoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_documento()
    {
        $tipoDocumento = factory(TipoDocumento::class)->make()->toArray();

        $rules = (new CreateTipoDocumentoRequest())->rules();
        $validator = Validator::make($tipoDocumento, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoDocumento = $this->tipoDocumentoRepo->create($tipoDocumento);
        $objetoTipoDocumento = $objetoTipoDocumento->toArray();

        $this->assertArrayHasKey('id', $objetoTipoDocumento, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoTipoDocumento['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(TipoDocumento::find($objetoTipoDocumento['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($tipoDocumento, $objetoTipoDocumento,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($tipoDocumento, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no pasó la validación de las reglas.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_documento()
    {
        $tipoDocumento = factory(TipoDocumento::class)->create();

        $dbTipoDocumento = $this->tipoDocumentoRepo->find($tipoDocumento->id);

        $dbTipoDocumento = $dbTipoDocumento->toArray();
        $this->assertModelData($tipoDocumento->toArray(), $dbTipoDocumento);
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_documento()
    {
        $tipoDocumento = factory(TipoDocumento::class)->create();
        $fakeTipoDocumento = factory(TipoDocumento::class)->make()->toArray();

        $rules = (new UpdateTipoDocumentoRequest())->rules();
        $validator = Validator::make($fakeTipoDocumento, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoDocumento = $this->tipoDocumentoRepo->update($fakeTipoDocumento, $tipoDocumento->id);

        $this->assertModelData($fakeTipoDocumento, $objetoTipoDocumento->toArray(),'El modelo no quedó con los datos editados.');
        $dbTipoDocumento = $this->tipoDocumentoRepo->find($tipoDocumento->id);
        $this->assertModelData($fakeTipoDocumento, $dbTipoDocumento->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_documento()
    {
        $tipoDocumento = factory(TipoDocumento::class)->create();

        $resp = $this->tipoDocumentoRepo->delete($tipoDocumento->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(TipoDocumento::find($tipoDocumento->id), 'El modelo no debe existir en BD.');
    }
}
