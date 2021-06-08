<?php namespace Tests\Repositories;

use App\Models\Contactos\Parentesco;
use App\Repositories\Contactos\ParentescoRepository;
use App\Http\Requests\Contactos\CreateParentescoRequest;
use App\Http\Requests\Contactos\UpdateParentescoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ParentescoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ParentescoRepository
     */
    protected $parentescoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->parentescoRepo = \App::make(ParentescoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_parentesco()
    {
        $parentesco = factory(Parentesco::class)->make()->toArray();

        $rules = (new CreateParentescoRequest())->rules();
        $validator = Validator::make($parentesco, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoParentesco = $this->parentescoRepo->create($parentesco);
        $objetoParentesco = $objetoParentesco->toArray();

        $this->assertArrayHasKey('id', $objetoParentesco, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoParentesco['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Parentesco::find($objetoParentesco['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($parentesco, $objetoParentesco,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($parentesco, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_parentesco()
    {
        $parentesco = factory(Parentesco::class)->create();

        $dbParentesco = $this->parentescoRepo->find($parentesco->id);

        $dbParentesco = $dbParentesco->toArray();
        $this->assertModelData($parentesco->toArray(), $dbParentesco);
    }

    /**
     * @test editar
     */
    public function test_editar_parentesco()
    {
        $parentesco = factory(Parentesco::class)->create();
        $fakeParentesco = factory(Parentesco::class)->make()->toArray();

        $rules = (new UpdateParentescoRequest())->rules();
        $validator = Validator::make($fakeParentesco, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoParentesco = $this->parentescoRepo->update($fakeParentesco, $parentesco->id);

        $this->assertModelData($fakeParentesco, $objetoParentesco->toArray(),'El modelo no quedó con los datos editados.');
        $dbParentesco = $this->parentescoRepo->find($parentesco->id);
        $this->assertModelData($fakeParentesco, $dbParentesco->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_parentesco()
    {
        $parentesco = factory(Parentesco::class)->create();

        $resp = $this->parentescoRepo->delete($parentesco->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Parentesco::find($parentesco->id), 'El modelo no debe existir en BD.');
    }
}
