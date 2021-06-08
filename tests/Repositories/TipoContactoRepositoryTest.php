<?php namespace Tests\Repositories;

use App\Models\Parametros\TipoContacto;
use App\Repositories\Parametros\TipoContactoRepository;
use App\Http\Requests\Parametros\CreateTipoContactoRequest;
use App\Http\Requests\Parametros\UpdateTipoContactoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class TipoContactoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var TipoContactoRepository
     */
    protected $tipoContactoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tipoContactoRepo = \App::make(TipoContactoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_tipo_contacto()
    {
        $tipoContacto = factory(TipoContacto::class)->make()->toArray();

        $rules = (new CreateTipoContactoRequest())->rules();
        $validator = Validator::make($tipoContacto, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoContacto = $this->tipoContactoRepo->create($tipoContacto);
        $objetoTipoContacto = $objetoTipoContacto->toArray();

        $this->assertArrayHasKey('id', $objetoTipoContacto, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoTipoContacto['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(TipoContacto::find($objetoTipoContacto['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($tipoContacto, $objetoTipoContacto,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($tipoContacto, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_tipo_contacto()
    {
        $tipoContacto = factory(TipoContacto::class)->create();

        $dbTipoContacto = $this->tipoContactoRepo->find($tipoContacto->id);

        $dbTipoContacto = $dbTipoContacto->toArray();
        $this->assertModelData($tipoContacto->toArray(), $dbTipoContacto);
    }

    /**
     * @test editar
     */
    public function test_editar_tipo_contacto()
    {
        $tipoContacto = factory(TipoContacto::class)->create();
        $fakeTipoContacto = factory(TipoContacto::class)->make()->toArray();

        $rules = (new UpdateTipoContactoRequest())->rules();
        $validator = Validator::make($fakeTipoContacto, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoTipoContacto = $this->tipoContactoRepo->update($fakeTipoContacto, $tipoContacto->id);

        $this->assertModelData($fakeTipoContacto, $objetoTipoContacto->toArray(),'El modelo no quedó con los datos editados.');
        $dbTipoContacto = $this->tipoContactoRepo->find($tipoContacto->id);
        $this->assertModelData($fakeTipoContacto, $dbTipoContacto->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_tipo_contacto()
    {
        $tipoContacto = factory(TipoContacto::class)->create();

        $resp = $this->tipoContactoRepo->delete($tipoContacto->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(TipoContacto::find($tipoContacto->id), 'El modelo no debe existir en BD.');
    }
}
