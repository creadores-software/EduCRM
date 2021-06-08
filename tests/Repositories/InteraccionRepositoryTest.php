<?php namespace Tests\Repositories;

use App\Models\Campanias\Interaccion;
use App\Repositories\Campanias\InteraccionRepository;
use App\Http\Requests\Campanias\CreateInteraccionRequest;
use App\Http\Requests\Campanias\UpdateInteraccionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class InteraccionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var InteraccionRepository
     */
    protected $interaccionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->interaccionRepo = \App::make(InteraccionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_interaccion()
    {
        $interaccion = factory(Interaccion::class)->make()->toArray();

        $rules = (new CreateInteraccionRequest())->rules();
        $validator = Validator::make($interaccion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoInteraccion = $this->interaccionRepo->create($interaccion);
        $objetoInteraccion = $objetoInteraccion->toArray();

        $this->assertArrayHasKey('id', $objetoInteraccion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoInteraccion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Interaccion::find($objetoInteraccion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($interaccion, $objetoInteraccion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($interaccion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_interaccion()
    {
        $interaccion = factory(Interaccion::class)->create();

        $dbInteraccion = $this->interaccionRepo->find($interaccion->id);

        $dbInteraccion = $dbInteraccion->toArray();
        $this->assertModelData($interaccion->toArray(), $dbInteraccion);
    }

    /**
     * @test editar
     */
    public function test_editar_interaccion()
    {
        $interaccion = factory(Interaccion::class)->create();
        $fakeInteraccion = factory(Interaccion::class)->make()->toArray();

        $rules = (new UpdateInteraccionRequest())->rules();
        $validator = Validator::make($fakeInteraccion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoInteraccion = $this->interaccionRepo->update($fakeInteraccion, $interaccion->id);

        $this->assertModelData($fakeInteraccion, $objetoInteraccion->toArray(),'El modelo no quedó con los datos editados.');
        $dbInteraccion = $this->interaccionRepo->find($interaccion->id);
        $this->assertModelData($fakeInteraccion, $dbInteraccion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_interaccion()
    {
        $interaccion = factory(Interaccion::class)->create();

        $resp = $this->interaccionRepo->delete($interaccion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Interaccion::find($interaccion->id), 'El modelo no debe existir en BD.');
    }
}
