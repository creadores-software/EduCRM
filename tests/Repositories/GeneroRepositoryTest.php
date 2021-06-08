<?php namespace Tests\Repositories;

use App\Models\Parametros\Genero;
use App\Repositories\Parametros\GeneroRepository;
use App\Http\Requests\Parametros\CreateGeneroRequest;
use App\Http\Requests\Parametros\UpdateGeneroRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class GeneroRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var GeneroRepository
     */
    protected $generoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->generoRepo = \App::make(GeneroRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_genero()
    {
        $genero = factory(Genero::class)->make()->toArray();

        $rules = (new CreateGeneroRequest())->rules();
        $validator = Validator::make($genero, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoGenero = $this->generoRepo->create($genero);
        $objetoGenero = $objetoGenero->toArray();

        $this->assertArrayHasKey('id', $objetoGenero, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoGenero['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Genero::find($objetoGenero['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($genero, $objetoGenero,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($genero, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_genero()
    {
        $genero = factory(Genero::class)->create();

        $dbGenero = $this->generoRepo->find($genero->id);

        $dbGenero = $dbGenero->toArray();
        $this->assertModelData($genero->toArray(), $dbGenero);
    }

    /**
     * @test editar
     */
    public function test_editar_genero()
    {
        $genero = factory(Genero::class)->create();
        $fakeGenero = factory(Genero::class)->make()->toArray();

        $rules = (new UpdateGeneroRequest())->rules();
        $validator = Validator::make($fakeGenero, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoGenero = $this->generoRepo->update($fakeGenero, $genero->id);

        $this->assertModelData($fakeGenero, $objetoGenero->toArray(),'El modelo no quedó con los datos editados.');
        $dbGenero = $this->generoRepo->find($genero->id);
        $this->assertModelData($fakeGenero, $dbGenero->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_genero()
    {
        $genero = factory(Genero::class)->create();

        $resp = $this->generoRepo->delete($genero->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Genero::find($genero->id), 'El modelo no debe existir en BD.');
    }
}
