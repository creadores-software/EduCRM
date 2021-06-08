<?php namespace Tests\Repositories;

use App\Models\Contactos\PreferenciaMedioComunicacion;
use App\Repositories\Contactos\PreferenciaMedioComunicacionRepository;
use App\Http\Requests\Contactos\CreatePreferenciaMedioComunicacionRequest;
use App\Http\Requests\Contactos\UpdatePreferenciaMedioComunicacionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PreferenciaMedioComunicacionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var PreferenciaMedioComunicacionRepository
     */
    protected $preferenciaMedioComunicacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->preferenciaMedioComunicacionRepo = \App::make(PreferenciaMedioComunicacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_preferencia_medio_comunicacion()
    {
        $preferenciaMedioComunicacion = factory(PreferenciaMedioComunicacion::class)->make()->toArray();

        $rules = (new CreatePreferenciaMedioComunicacionRequest())->rules();
        $validator = Validator::make($preferenciaMedioComunicacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPreferenciaMedioComunicacion = $this->preferenciaMedioComunicacionRepo->create($preferenciaMedioComunicacion);
        $objetoPreferenciaMedioComunicacion = $objetoPreferenciaMedioComunicacion->toArray();

        $this->assertArrayHasKey('id', $objetoPreferenciaMedioComunicacion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoPreferenciaMedioComunicacion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(PreferenciaMedioComunicacion::find($objetoPreferenciaMedioComunicacion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($preferenciaMedioComunicacion, $objetoPreferenciaMedioComunicacion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($preferenciaMedioComunicacion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_preferencia_medio_comunicacion()
    {
        $preferenciaMedioComunicacion = factory(PreferenciaMedioComunicacion::class)->create();

        $dbPreferenciaMedioComunicacion = $this->preferenciaMedioComunicacionRepo->find($preferenciaMedioComunicacion->id);

        $dbPreferenciaMedioComunicacion = $dbPreferenciaMedioComunicacion->toArray();
        $this->assertModelData($preferenciaMedioComunicacion->toArray(), $dbPreferenciaMedioComunicacion);
    }

    /**
     * @test editar
     */
    public function test_editar_preferencia_medio_comunicacion()
    {
        $preferenciaMedioComunicacion = factory(PreferenciaMedioComunicacion::class)->create();
        $fakePreferenciaMedioComunicacion = factory(PreferenciaMedioComunicacion::class)->make()->toArray();

        $rules = (new UpdatePreferenciaMedioComunicacionRequest())->rules();
        $validator = Validator::make($fakePreferenciaMedioComunicacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPreferenciaMedioComunicacion = $this->preferenciaMedioComunicacionRepo->update($fakePreferenciaMedioComunicacion, $preferenciaMedioComunicacion->id);

        $this->assertModelData($fakePreferenciaMedioComunicacion, $objetoPreferenciaMedioComunicacion->toArray(),'El modelo no quedó con los datos editados.');
        $dbPreferenciaMedioComunicacion = $this->preferenciaMedioComunicacionRepo->find($preferenciaMedioComunicacion->id);
        $this->assertModelData($fakePreferenciaMedioComunicacion, $dbPreferenciaMedioComunicacion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_preferencia_medio_comunicacion()
    {
        $preferenciaMedioComunicacion = factory(PreferenciaMedioComunicacion::class)->create();

        $resp = $this->preferenciaMedioComunicacionRepo->delete($preferenciaMedioComunicacion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(PreferenciaMedioComunicacion::find($preferenciaMedioComunicacion->id), 'El modelo no debe existir en BD.');
    }
}
