<?php namespace Tests\Repositories;

use App\Models\Formaciones\PeriodoAcademico;
use App\Repositories\Formaciones\PeriodoAcademicoRepository;
use App\Http\Requests\Formaciones\CreatePeriodoAcademicoRequest;
use App\Http\Requests\Formaciones\UpdatePeriodoAcademicoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PeriodoAcademicoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var PeriodoAcademicoRepository
     */
    protected $periodoAcademicoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->periodoAcademicoRepo = \App::make(PeriodoAcademicoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_periodo_academico()
    {
        $periodoAcademico = factory(PeriodoAcademico::class)->make()->toArray();

        $rules = (new CreatePeriodoAcademicoRequest())->rules();
        $validator = Validator::make($periodoAcademico, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPeriodoAcademico = $this->periodoAcademicoRepo->create($periodoAcademico);
        $objetoPeriodoAcademico = $objetoPeriodoAcademico->toArray();

        $this->assertArrayHasKey('id', $objetoPeriodoAcademico, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoPeriodoAcademico['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(PeriodoAcademico::find($objetoPeriodoAcademico['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($periodoAcademico, $objetoPeriodoAcademico,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($periodoAcademico, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_periodo_academico()
    {
        $periodoAcademico = factory(PeriodoAcademico::class)->create();

        $dbPeriodoAcademico = $this->periodoAcademicoRepo->find($periodoAcademico->id);

        $dbPeriodoAcademico = $dbPeriodoAcademico->toArray();
        $this->assertModelData($periodoAcademico->toArray(), $dbPeriodoAcademico);
    }

    /**
     * @test editar
     */
    public function test_editar_periodo_academico()
    {
        $periodoAcademico = factory(PeriodoAcademico::class)->create();
        $fakePeriodoAcademico = factory(PeriodoAcademico::class)->make()->toArray();

        $rules = (new UpdatePeriodoAcademicoRequest())->rules();
        $validator = Validator::make($fakePeriodoAcademico, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPeriodoAcademico = $this->periodoAcademicoRepo->update($fakePeriodoAcademico, $periodoAcademico->id);

        $this->assertModelData($fakePeriodoAcademico, $objetoPeriodoAcademico->toArray(),'El modelo no quedó con los datos editados.');
        $dbPeriodoAcademico = $this->periodoAcademicoRepo->find($periodoAcademico->id);
        $this->assertModelData($fakePeriodoAcademico, $dbPeriodoAcademico->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_periodo_academico()
    {
        $periodoAcademico = factory(PeriodoAcademico::class)->create();

        $resp = $this->periodoAcademicoRepo->delete($periodoAcademico->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(PeriodoAcademico::find($periodoAcademico->id), 'El modelo no debe existir en BD.');
    }
}
