<?php namespace Tests\Repositories;

use App\Models\Formaciones\NivelAcademico;
use App\Repositories\Formaciones\NivelAcademicoRepository;
use App\Http\Requests\Formaciones\CreateNivelAcademicoRequest;
use App\Http\Requests\Formaciones\UpdateNivelAcademicoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class NivelAcademicoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var NivelAcademicoRepository
     */
    protected $nivelAcademicoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->nivelAcademicoRepo = \App::make(NivelAcademicoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_nivel_academico()
    {
        $nivelAcademico = factory(NivelAcademico::class)->make()->toArray();

        $rules = (new CreateNivelAcademicoRequest())->rules();
        $validator = Validator::make($nivelAcademico, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoNivelAcademico = $this->nivelAcademicoRepo->create($nivelAcademico);
        $objetoNivelAcademico = $objetoNivelAcademico->toArray();

        $this->assertArrayHasKey('id', $objetoNivelAcademico, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoNivelAcademico['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(NivelAcademico::find($objetoNivelAcademico['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($nivelAcademico, $objetoNivelAcademico,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($nivelAcademico, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_nivel_academico()
    {
        $nivelAcademico = factory(NivelAcademico::class)->create();

        $dbNivelAcademico = $this->nivelAcademicoRepo->find($nivelAcademico->id);

        $dbNivelAcademico = $dbNivelAcademico->toArray();
        $this->assertModelData($nivelAcademico->toArray(), $dbNivelAcademico);
    }

    /**
     * @test editar
     */
    public function test_editar_nivel_academico()
    {
        $nivelAcademico = factory(NivelAcademico::class)->create();
        $fakeNivelAcademico = factory(NivelAcademico::class)->make()->toArray();

        $rules = (new UpdateNivelAcademicoRequest())->rules();
        $validator = Validator::make($fakeNivelAcademico, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoNivelAcademico = $this->nivelAcademicoRepo->update($fakeNivelAcademico, $nivelAcademico->id);

        $this->assertModelData($fakeNivelAcademico, $objetoNivelAcademico->toArray(),'El modelo no quedó con los datos editados.');
        $dbNivelAcademico = $this->nivelAcademicoRepo->find($nivelAcademico->id);
        $this->assertModelData($fakeNivelAcademico, $dbNivelAcademico->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_nivel_academico()
    {
        $nivelAcademico = factory(NivelAcademico::class)->create();

        $resp = $this->nivelAcademicoRepo->delete($nivelAcademico->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(NivelAcademico::find($nivelAcademico->id), 'El modelo no debe existir en BD.');
    }
}
