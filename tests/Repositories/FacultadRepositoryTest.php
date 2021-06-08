<?php namespace Tests\Repositories;

use App\Models\Formaciones\Facultad;
use App\Repositories\Formaciones\FacultadRepository;
use App\Http\Requests\Formaciones\CreateFacultadRequest;
use App\Http\Requests\Formaciones\UpdateFacultadRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class FacultadRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var FacultadRepository
     */
    protected $facultadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->facultadRepo = \App::make(FacultadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_facultad()
    {
        $facultad = factory(Facultad::class)->make()->toArray();

        $rules = (new CreateFacultadRequest())->rules();
        $validator = Validator::make($facultad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoFacultad = $this->facultadRepo->create($facultad);
        $objetoFacultad = $objetoFacultad->toArray();

        $this->assertArrayHasKey('id', $objetoFacultad, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoFacultad['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Facultad::find($objetoFacultad['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($facultad, $objetoFacultad,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($facultad, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_facultad()
    {
        $facultad = factory(Facultad::class)->create();

        $dbFacultad = $this->facultadRepo->find($facultad->id);

        $dbFacultad = $dbFacultad->toArray();
        $this->assertModelData($facultad->toArray(), $dbFacultad);
    }

    /**
     * @test editar
     */
    public function test_editar_facultad()
    {
        $facultad = factory(Facultad::class)->create();
        $fakeFacultad = factory(Facultad::class)->make()->toArray();

        $rules = (new UpdateFacultadRequest())->rules();
        $validator = Validator::make($fakeFacultad, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoFacultad = $this->facultadRepo->update($fakeFacultad, $facultad->id);

        $this->assertModelData($fakeFacultad, $objetoFacultad->toArray(),'El modelo no quedó con los datos editados.');
        $dbFacultad = $this->facultadRepo->find($facultad->id);
        $this->assertModelData($fakeFacultad, $dbFacultad->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_facultad()
    {
        $facultad = factory(Facultad::class)->create();

        $resp = $this->facultadRepo->delete($facultad->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Facultad::find($facultad->id), 'El modelo no debe existir en BD.');
    }
}
