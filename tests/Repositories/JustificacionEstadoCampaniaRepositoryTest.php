<?php namespace Tests\Repositories;

use App\Models\Campanias\JustificacionEstadoCampania;
use App\Repositories\Campanias\JustificacionEstadoCampaniaRepository;
use App\Http\Requests\Campanias\CreateJustificacionEstadoCampaniaRequest;
use App\Http\Requests\Campanias\UpdateJustificacionEstadoCampaniaRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class JustificacionEstadoCampaniaRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var JustificacionEstadoCampaniaRepository
     */
    protected $justificacionEstadoCampaniaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->justificacionEstadoCampaniaRepo = \App::make(JustificacionEstadoCampaniaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_justificacion_estado_campania()
    {
        $justificacionEstadoCampania = factory(JustificacionEstadoCampania::class)->make()->toArray();

        $rules = (new CreateJustificacionEstadoCampaniaRequest())->rules();
        $validator = Validator::make($justificacionEstadoCampania, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoJustificacionEstadoCampania = $this->justificacionEstadoCampaniaRepo->create($justificacionEstadoCampania);
        $objetoJustificacionEstadoCampania = $objetoJustificacionEstadoCampania->toArray();

        $this->assertArrayHasKey('id', $objetoJustificacionEstadoCampania, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoJustificacionEstadoCampania['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(JustificacionEstadoCampania::find($objetoJustificacionEstadoCampania['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($justificacionEstadoCampania, $objetoJustificacionEstadoCampania,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($justificacionEstadoCampania, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_justificacion_estado_campania()
    {
        $justificacionEstadoCampania = factory(JustificacionEstadoCampania::class)->create();

        $dbJustificacionEstadoCampania = $this->justificacionEstadoCampaniaRepo->find($justificacionEstadoCampania->id);

        $dbJustificacionEstadoCampania = $dbJustificacionEstadoCampania->toArray();
        $this->assertModelData($justificacionEstadoCampania->toArray(), $dbJustificacionEstadoCampania);
    }

    /**
     * @test editar
     */
    public function test_editar_justificacion_estado_campania()
    {
        $justificacionEstadoCampania = factory(JustificacionEstadoCampania::class)->create();
        $fakeJustificacionEstadoCampania = factory(JustificacionEstadoCampania::class)->make()->toArray();

        $rules = (new UpdateJustificacionEstadoCampaniaRequest())->rules();
        $validator = Validator::make($fakeJustificacionEstadoCampania, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoJustificacionEstadoCampania = $this->justificacionEstadoCampaniaRepo->update($fakeJustificacionEstadoCampania, $justificacionEstadoCampania->id);

        $this->assertModelData($fakeJustificacionEstadoCampania, $objetoJustificacionEstadoCampania->toArray(),'El modelo no quedó con los datos editados.');
        $dbJustificacionEstadoCampania = $this->justificacionEstadoCampaniaRepo->find($justificacionEstadoCampania->id);
        $this->assertModelData($fakeJustificacionEstadoCampania, $dbJustificacionEstadoCampania->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_justificacion_estado_campania()
    {
        $justificacionEstadoCampania = factory(JustificacionEstadoCampania::class)->create();

        $resp = $this->justificacionEstadoCampaniaRepo->delete($justificacionEstadoCampania->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(JustificacionEstadoCampania::find($justificacionEstadoCampania->id), 'El modelo no debe existir en BD.');
    }
}
