<?php namespace Tests\Repositories;

use App\Models\Parametros\Raza;
use App\Repositories\Parametros\RazaRepository;
use App\Http\Requests\Parametros\CreateRazaRequest;
use App\Http\Requests\Parametros\UpdateRazaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class RazaRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var RazaRepository
     */
    protected $razaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->razaRepo = \App::make(RazaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_raza()
    {
        $raza = factory(Raza::class)->make()->toArray();

        $rules = (new CreateRazaRequest())->rules();
        $validator = Validator::make($raza, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoRaza = $this->razaRepo->create($raza);
        $objetoRaza = $objetoRaza->toArray();

        $this->assertArrayHasKey('id', $objetoRaza, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoRaza['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Raza::find($objetoRaza['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($raza, $objetoRaza,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($raza, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_raza()
    {
        $raza = factory(Raza::class)->create();

        $dbRaza = $this->razaRepo->find($raza->id);

        $dbRaza = $dbRaza->toArray();
        $this->assertModelData($raza->toArray(), $dbRaza);
    }

    /**
     * @test editar
     */
    public function test_editar_raza()
    {
        $raza = factory(Raza::class)->create();
        $fakeRaza = factory(Raza::class)->make()->toArray();

        $rules = (new UpdateRazaRequest())->rules();
        $validator = Validator::make($fakeRaza, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoRaza = $this->razaRepo->update($fakeRaza, $raza->id);

        $this->assertModelData($fakeRaza, $objetoRaza->toArray(),'El modelo no quedó con los datos editados.');
        $dbRaza = $this->razaRepo->find($raza->id);
        $this->assertModelData($fakeRaza, $dbRaza->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_raza()
    {
        $raza = factory(Raza::class)->create();

        $resp = $this->razaRepo->delete($raza->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Raza::find($raza->id), 'El modelo no debe existir en BD.');
    }
}
