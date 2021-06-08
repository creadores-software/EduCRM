<?php namespace Tests\Repositories;

use App\Models\Admin\EquipoMercadeo;
use App\Repositories\Admin\EquipoMercadeoRepository;
use App\Http\Requests\Admin\CreateEquipoMercadeoRequest;
use App\Http\Requests\Admin\UpdateEquipoMercadeoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class EquipoMercadeoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var EquipoMercadeoRepository
     */
    protected $equipoMercadeoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->equipoMercadeoRepo = \App::make(EquipoMercadeoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_equipo_mercadeo()
    {
        $equipoMercadeo = factory(EquipoMercadeo::class)->make()->toArray();

        $rules = (new CreateEquipoMercadeoRequest())->rules();
        $validator = Validator::make($equipoMercadeo, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEquipoMercadeo = $this->equipoMercadeoRepo->create($equipoMercadeo);
        $objetoEquipoMercadeo = $objetoEquipoMercadeo->toArray();

        $this->assertArrayHasKey('id', $objetoEquipoMercadeo, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoEquipoMercadeo['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(EquipoMercadeo::find($objetoEquipoMercadeo['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($equipoMercadeo, $objetoEquipoMercadeo,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($equipoMercadeo, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_equipo_mercadeo()
    {
        $equipoMercadeo = factory(EquipoMercadeo::class)->create();

        $dbEquipoMercadeo = $this->equipoMercadeoRepo->find($equipoMercadeo->id);

        $dbEquipoMercadeo = $dbEquipoMercadeo->toArray();
        $this->assertModelData($equipoMercadeo->toArray(), $dbEquipoMercadeo);
    }

    /**
     * @test editar
     */
    public function test_editar_equipo_mercadeo()
    {
        $equipoMercadeo = factory(EquipoMercadeo::class)->create();
        $fakeEquipoMercadeo = factory(EquipoMercadeo::class)->make()->toArray();

        $rules = (new UpdateEquipoMercadeoRequest())->rules();
        $validator = Validator::make($fakeEquipoMercadeo, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoEquipoMercadeo = $this->equipoMercadeoRepo->update($fakeEquipoMercadeo, $equipoMercadeo->id);

        $this->assertModelData($fakeEquipoMercadeo, $objetoEquipoMercadeo->toArray(),'El modelo no quedó con los datos editados.');
        $dbEquipoMercadeo = $this->equipoMercadeoRepo->find($equipoMercadeo->id);
        $this->assertModelData($fakeEquipoMercadeo, $dbEquipoMercadeo->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_equipo_mercadeo()
    {
        $equipoMercadeo = factory(EquipoMercadeo::class)->create();

        $resp = $this->equipoMercadeoRepo->delete($equipoMercadeo->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(EquipoMercadeo::find($equipoMercadeo->id), 'El modelo no debe existir en BD.');
    }
}
