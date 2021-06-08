<?php namespace Tests\Repositories;

use App\Models\Parametros\Religion;
use App\Repositories\Parametros\ReligionRepository;
use App\Http\Requests\Parametros\CreateReligionRequest;
use App\Http\Requests\Parametros\UpdateReligionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ReligionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ReligionRepository
     */
    protected $religionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->religionRepo = \App::make(ReligionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_religion()
    {
        $religion = factory(Religion::class)->make()->toArray();

        $rules = (new CreateReligionRequest())->rules();
        $validator = Validator::make($religion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoReligion = $this->religionRepo->create($religion);
        $objetoReligion = $objetoReligion->toArray();

        $this->assertArrayHasKey('id', $objetoReligion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoReligion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Religion::find($objetoReligion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($religion, $objetoReligion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($religion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_religion()
    {
        $religion = factory(Religion::class)->create();

        $dbReligion = $this->religionRepo->find($religion->id);

        $dbReligion = $dbReligion->toArray();
        $this->assertModelData($religion->toArray(), $dbReligion);
    }

    /**
     * @test editar
     */
    public function test_editar_religion()
    {
        $religion = factory(Religion::class)->create();
        $fakeReligion = factory(Religion::class)->make()->toArray();

        $rules = (new UpdateReligionRequest())->rules();
        $validator = Validator::make($fakeReligion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoReligion = $this->religionRepo->update($fakeReligion, $religion->id);

        $this->assertModelData($fakeReligion, $objetoReligion->toArray(),'El modelo no quedó con los datos editados.');
        $dbReligion = $this->religionRepo->find($religion->id);
        $this->assertModelData($fakeReligion, $dbReligion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_religion()
    {
        $religion = factory(Religion::class)->create();

        $resp = $this->religionRepo->delete($religion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Religion::find($religion->id), 'El modelo no debe existir en BD.');
    }
}
