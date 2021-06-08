<?php namespace Tests\Repositories;

use App\Models\Contactos\PreferenciaCampoEducacion;
use App\Repositories\Contactos\PreferenciaCampoEducacionRepository;
use App\Http\Requests\Contactos\CreatePreferenciaCampoEducacionRequest;
use App\Http\Requests\Contactos\UpdatePreferenciaCampoEducacionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class PreferenciaCampoEducacionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var PreferenciaCampoEducacionRepository
     */
    protected $preferenciaCampoEducacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->preferenciaCampoEducacionRepo = \App::make(PreferenciaCampoEducacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_preferencia_campo_educacion()
    {
        $preferenciaCampoEducacion = factory(PreferenciaCampoEducacion::class)->make()->toArray();

        $rules = (new CreatePreferenciaCampoEducacionRequest())->rules();
        $validator = Validator::make($preferenciaCampoEducacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPreferenciaCampoEducacion = $this->preferenciaCampoEducacionRepo->create($preferenciaCampoEducacion);
        $objetoPreferenciaCampoEducacion = $objetoPreferenciaCampoEducacion->toArray();

        $this->assertArrayHasKey('id', $objetoPreferenciaCampoEducacion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoPreferenciaCampoEducacion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(PreferenciaCampoEducacion::find($objetoPreferenciaCampoEducacion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($preferenciaCampoEducacion, $objetoPreferenciaCampoEducacion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($preferenciaCampoEducacion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_preferencia_campo_educacion()
    {
        $preferenciaCampoEducacion = factory(PreferenciaCampoEducacion::class)->create();

        $dbPreferenciaCampoEducacion = $this->preferenciaCampoEducacionRepo->find($preferenciaCampoEducacion->id);

        $dbPreferenciaCampoEducacion = $dbPreferenciaCampoEducacion->toArray();
        $this->assertModelData($preferenciaCampoEducacion->toArray(), $dbPreferenciaCampoEducacion);
    }

    /**
     * @test editar
     */
    public function test_editar_preferencia_campo_educacion()
    {
        $preferenciaCampoEducacion = factory(PreferenciaCampoEducacion::class)->create();
        $fakePreferenciaCampoEducacion = factory(PreferenciaCampoEducacion::class)->make()->toArray();

        $rules = (new UpdatePreferenciaCampoEducacionRequest())->rules();
        $validator = Validator::make($fakePreferenciaCampoEducacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoPreferenciaCampoEducacion = $this->preferenciaCampoEducacionRepo->update($fakePreferenciaCampoEducacion, $preferenciaCampoEducacion->id);

        $this->assertModelData($fakePreferenciaCampoEducacion, $objetoPreferenciaCampoEducacion->toArray(),'El modelo no quedó con los datos editados.');
        $dbPreferenciaCampoEducacion = $this->preferenciaCampoEducacionRepo->find($preferenciaCampoEducacion->id);
        $this->assertModelData($fakePreferenciaCampoEducacion, $dbPreferenciaCampoEducacion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_preferencia_campo_educacion()
    {
        $preferenciaCampoEducacion = factory(PreferenciaCampoEducacion::class)->create();

        $resp = $this->preferenciaCampoEducacionRepo->delete($preferenciaCampoEducacion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(PreferenciaCampoEducacion::find($preferenciaCampoEducacion->id), 'El modelo no debe existir en BD.');
    }
}
