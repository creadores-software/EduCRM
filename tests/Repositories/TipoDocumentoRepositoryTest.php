<?php namespace Tests\Repositories;

use App\Models\Parametros\TipoDocumento;
use App\Repositories\Parametros\TipoDocumentoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TipoDocumentoRepositoryTest extends TestCase
{
    use DatabaseTransactions;

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

        $createdTipoDocumento = $this->tipoDocumentoRepo->create($tipoDocumento);

        $createdTipoDocumento = $createdTipoDocumento->toArray();
        $this->assertArrayHasKey('id', $createdTipoDocumento);
        $this->assertNotNull($createdTipoDocumento['id'], 'El modelo TipoDocumento creado debe tener un id especificado');
        $this->assertNotNull(TipoDocumento::find($createdTipoDocumento['id']), 'El modelo TipoDocumento con el id dado debe exitar en la BD');
        $this->assertModelData($tipoDocumento, $createdTipoDocumento);
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

        $updatedTipoDocumento = $this->tipoDocumentoRepo->update($fakeTipoDocumento, $tipoDocumento->id);

        $this->assertModelData($fakeTipoDocumento, $updatedTipoDocumento->toArray());
        $dbTipoDocumento = $this->tipoDocumentoRepo->find($tipoDocumento->id);
        $this->assertModelData($fakeTipoDocumento, $dbTipoDocumento->toArray());
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_documento()
    {
        $tipoDocumento = factory(TipoDocumento::class)->create();

        $resp = $this->tipoDocumentoRepo->delete($tipoDocumento->id);

        $this->assertTrue($resp);
        $this->assertNull(TipoDocumento::find($tipoDocumento->id), 'El modelo TipoDocumento no debe existir en bd');
    }
}
