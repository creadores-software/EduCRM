<?php namespace Tests\Repositories;

use App\Models\Formaciones\CategoriaCampoEducacion;
use App\Repositories\Formaciones\CategoriaCampoEducacionRepository;
use App\Http\Requests\Formaciones\CreateCategoriaCampoEducacionRequest;
use App\Http\Requests\Formaciones\UpdateCategoriaCampoEducacionRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class CategoriaCampoEducacionRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var CategoriaCampoEducacionRepository
     */
    protected $categoriaCampoEducacionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->categoriaCampoEducacionRepo = \App::make(CategoriaCampoEducacionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_categoria_campo_educacion()
    {
        $categoriaCampoEducacion = factory(CategoriaCampoEducacion::class)->make()->toArray();

        $rules = (new CreateCategoriaCampoEducacionRequest())->rules();
        $validator = Validator::make($categoriaCampoEducacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoCategoriaCampoEducacion = $this->categoriaCampoEducacionRepo->create($categoriaCampoEducacion);
        $objetoCategoriaCampoEducacion = $objetoCategoriaCampoEducacion->toArray();

        $this->assertArrayHasKey('id', $objetoCategoriaCampoEducacion, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoCategoriaCampoEducacion['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(CategoriaCampoEducacion::find($objetoCategoriaCampoEducacion['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($categoriaCampoEducacion, $objetoCategoriaCampoEducacion,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($categoriaCampoEducacion, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_categoria_campo_educacion()
    {
        $categoriaCampoEducacion = factory(CategoriaCampoEducacion::class)->create();

        $dbCategoriaCampoEducacion = $this->categoriaCampoEducacionRepo->find($categoriaCampoEducacion->id);

        $dbCategoriaCampoEducacion = $dbCategoriaCampoEducacion->toArray();
        $this->assertModelData($categoriaCampoEducacion->toArray(), $dbCategoriaCampoEducacion);
    }

    /**
     * @test editar
     */
    public function test_editar_categoria_campo_educacion()
    {
        $categoriaCampoEducacion = factory(CategoriaCampoEducacion::class)->create();
        $fakeCategoriaCampoEducacion = factory(CategoriaCampoEducacion::class)->make()->toArray();

        $rules = (new UpdateCategoriaCampoEducacionRequest())->rules();
        $validator = Validator::make($fakeCategoriaCampoEducacion, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoCategoriaCampoEducacion = $this->categoriaCampoEducacionRepo->update($fakeCategoriaCampoEducacion, $categoriaCampoEducacion->id);

        $this->assertModelData($fakeCategoriaCampoEducacion, $objetoCategoriaCampoEducacion->toArray(),'El modelo no quedó con los datos editados.');
        $dbCategoriaCampoEducacion = $this->categoriaCampoEducacionRepo->find($categoriaCampoEducacion->id);
        $this->assertModelData($fakeCategoriaCampoEducacion, $dbCategoriaCampoEducacion->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_categoria_campo_educacion()
    {
        $categoriaCampoEducacion = factory(CategoriaCampoEducacion::class)->create();

        $resp = $this->categoriaCampoEducacionRepo->delete($categoriaCampoEducacion->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(CategoriaCampoEducacion::find($categoriaCampoEducacion->id), 'El modelo no debe existir en BD.');
    }
}
