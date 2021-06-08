<?php namespace Tests\Repositories;

use App\Models\Contactos\PreferenciaActividadOcio;
use App\Repositories\Contactos\PreferenciaActividadOcioRepository;
use App\Http\Requests\Contactos\CreatePreferenciaActividadOcioRequest;
use App\Http\Requests\Contactos\UpdatePreferenciaActividadOcioRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PreferenciaActividadOcioRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var PreferenciaActividadOcioRepository
     */
    protected $preferenciaActividadOcioRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->preferenciaActividadOcioRepo = \App::make(PreferenciaActividadOcioRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_preferencia_actividad_ocio()
    {
        $preferenciaActividadOcio = factory(PreferenciaActividadOcio::class)->make()->toArray();

        $rules = (new CreatePreferenciaActividadOcioRequest())->rules();
        $validator = Validator::make($preferenciaActividadOcio, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPreferenciaActividadOcio = $this->preferenciaActividadOcioRepo->create($preferenciaActividadOcio);
        $objetoPreferenciaActividadOcio = $objetoPreferenciaActividadOcio->toArray();

        $this->assertArrayHasKey('id', $objetoPreferenciaActividadOcio, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoPreferenciaActividadOcio['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(PreferenciaActividadOcio::find($objetoPreferenciaActividadOcio['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($preferenciaActividadOcio, $objetoPreferenciaActividadOcio,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($preferenciaActividadOcio, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_preferencia_actividad_ocio()
    {
        $preferenciaActividadOcio = factory(PreferenciaActividadOcio::class)->create();

        $dbPreferenciaActividadOcio = $this->preferenciaActividadOcioRepo->find($preferenciaActividadOcio->id);

        $dbPreferenciaActividadOcio = $dbPreferenciaActividadOcio->toArray();
        $this->assertModelData($preferenciaActividadOcio->toArray(), $dbPreferenciaActividadOcio);
    }

    /**
     * @test editar
     */
    public function test_editar_preferencia_actividad_ocio()
    {
        $preferenciaActividadOcio = factory(PreferenciaActividadOcio::class)->create();
        $fakePreferenciaActividadOcio = factory(PreferenciaActividadOcio::class)->make()->toArray();

        $rules = (new UpdatePreferenciaActividadOcioRequest())->rules();
        $validator = Validator::make($fakePreferenciaActividadOcio, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPreferenciaActividadOcio = $this->preferenciaActividadOcioRepo->update($fakePreferenciaActividadOcio, $preferenciaActividadOcio->id);

        $this->assertModelData($fakePreferenciaActividadOcio, $objetoPreferenciaActividadOcio->toArray(),'El modelo no quedó con los datos editados.');
        $dbPreferenciaActividadOcio = $this->preferenciaActividadOcioRepo->find($preferenciaActividadOcio->id);
        $this->assertModelData($fakePreferenciaActividadOcio, $dbPreferenciaActividadOcio->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_preferencia_actividad_ocio()
    {
        $preferenciaActividadOcio = factory(PreferenciaActividadOcio::class)->create();

        $resp = $this->preferenciaActividadOcioRepo->delete($preferenciaActividadOcio->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(PreferenciaActividadOcio::find($preferenciaActividadOcio->id), 'El modelo no debe existir en BD.');
    }
}
