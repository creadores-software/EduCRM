<?php namespace Tests\Repositories;

use App\Models\Admin\PertenenciaEquipoMercadeo;
use App\Repositories\Admin\PertenenciaEquipoMercadeoRepository;
use App\Http\Requests\Admin\CreatePertenenciaEquipoMercadeoRequest;
use App\Http\Requests\Admin\UpdatePertenenciaEquipoMercadeoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PertenenciaEquipoMercadeoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var PertenenciaEquipoMercadeoRepository
     */
    protected $pertenenciaEquipoMercadeoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pertenenciaEquipoMercadeoRepo = \App::make(PertenenciaEquipoMercadeoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_pertenencia_equipo_mercadeo()
    {
        $pertenenciaEquipoMercadeo = factory(PertenenciaEquipoMercadeo::class)->make()->toArray();

        $rules = (new CreatePertenenciaEquipoMercadeoRequest())->rules();
        $validator = Validator::make($pertenenciaEquipoMercadeo, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPertenenciaEquipoMercadeo = $this->pertenenciaEquipoMercadeoRepo->create($pertenenciaEquipoMercadeo);
        $objetoPertenenciaEquipoMercadeo = $objetoPertenenciaEquipoMercadeo->toArray();

        $this->assertArrayHasKey('id', $objetoPertenenciaEquipoMercadeo, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoPertenenciaEquipoMercadeo['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(PertenenciaEquipoMercadeo::find($objetoPertenenciaEquipoMercadeo['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($pertenenciaEquipoMercadeo, $objetoPertenenciaEquipoMercadeo,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($pertenenciaEquipoMercadeo, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_pertenencia_equipo_mercadeo()
    {
        $pertenenciaEquipoMercadeo = factory(PertenenciaEquipoMercadeo::class)->create();

        $dbPertenenciaEquipoMercadeo = $this->pertenenciaEquipoMercadeoRepo->find($pertenenciaEquipoMercadeo->id);

        $dbPertenenciaEquipoMercadeo = $dbPertenenciaEquipoMercadeo->toArray();
        $this->assertModelData($pertenenciaEquipoMercadeo->toArray(), $dbPertenenciaEquipoMercadeo);
    }

    /**
     * @test editar
     */
    public function test_editar_pertenencia_equipo_mercadeo()
    {
        $pertenenciaEquipoMercadeo = factory(PertenenciaEquipoMercadeo::class)->create();
        $fakePertenenciaEquipoMercadeo = factory(PertenenciaEquipoMercadeo::class)->make()->toArray();

        $rules = (new UpdatePertenenciaEquipoMercadeoRequest())->rules();
        $validator = Validator::make($fakePertenenciaEquipoMercadeo, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPertenenciaEquipoMercadeo = $this->pertenenciaEquipoMercadeoRepo->update($fakePertenenciaEquipoMercadeo, $pertenenciaEquipoMercadeo->id);

        $this->assertModelData($fakePertenenciaEquipoMercadeo, $objetoPertenenciaEquipoMercadeo->toArray(),'El modelo no quedó con los datos editados.');
        $dbPertenenciaEquipoMercadeo = $this->pertenenciaEquipoMercadeoRepo->find($pertenenciaEquipoMercadeo->id);
        $this->assertModelData($fakePertenenciaEquipoMercadeo, $dbPertenenciaEquipoMercadeo->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_pertenencia_equipo_mercadeo()
    {
        $pertenenciaEquipoMercadeo = factory(PertenenciaEquipoMercadeo::class)->create();

        $resp = $this->pertenenciaEquipoMercadeoRepo->delete($pertenenciaEquipoMercadeo->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(PertenenciaEquipoMercadeo::find($pertenenciaEquipoMercadeo->id), 'El modelo no debe existir en BD.');
    }
}
