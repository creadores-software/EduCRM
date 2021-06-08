<?php namespace Tests\Repositories;

use App\Models\Formaciones\Jornada;
use App\Repositories\Formaciones\JornadaRepository;
use App\Http\Requests\Formaciones\CreateJornadaRequest;
use App\Http\Requests\Formaciones\UpdateJornadaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class JornadaRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var JornadaRepository
     */
    protected $jornadaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->jornadaRepo = \App::make(JornadaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_jornada()
    {
        $jornada = factory(Jornada::class)->make()->toArray();

        $rules = (new CreateJornadaRequest())->rules();
        $validator = Validator::make($jornada, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoJornada = $this->jornadaRepo->create($jornada);
        $objetoJornada = $objetoJornada->toArray();

        $this->assertArrayHasKey('id', $objetoJornada, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoJornada['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Jornada::find($objetoJornada['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($jornada, $objetoJornada,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($jornada, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_jornada()
    {
        $jornada = factory(Jornada::class)->create();

        $dbJornada = $this->jornadaRepo->find($jornada->id);

        $dbJornada = $dbJornada->toArray();
        $this->assertModelData($jornada->toArray(), $dbJornada);
    }

    /**
     * @test editar
     */
    public function test_editar_jornada()
    {
        $jornada = factory(Jornada::class)->create();
        $fakeJornada = factory(Jornada::class)->make()->toArray();

        $rules = (new UpdateJornadaRequest())->rules();
        $validator = Validator::make($fakeJornada, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoJornada = $this->jornadaRepo->update($fakeJornada, $jornada->id);

        $this->assertModelData($fakeJornada, $objetoJornada->toArray(),'El modelo no quedó con los datos editados.');
        $dbJornada = $this->jornadaRepo->find($jornada->id);
        $this->assertModelData($fakeJornada, $dbJornada->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_jornada()
    {
        $jornada = factory(Jornada::class)->create();

        $resp = $this->jornadaRepo->delete($jornada->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Jornada::find($jornada->id), 'El modelo no debe existir en BD.');
    }
}
