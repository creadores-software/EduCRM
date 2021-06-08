<?php namespace Tests\Repositories;

use App\Models\Formaciones\Reconocimiento;
use App\Repositories\Formaciones\ReconocimientoRepository;
use App\Http\Requests\Formaciones\CreateReconocimientoRequest;
use App\Http\Requests\Formaciones\UpdateReconocimientoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ReconocimientoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ReconocimientoRepository
     */
    protected $reconocimientoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->reconocimientoRepo = \App::make(ReconocimientoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_reconocimiento()
    {
        $reconocimiento = factory(Reconocimiento::class)->make()->toArray();

        $rules = (new CreateReconocimientoRequest())->rules();
        $validator = Validator::make($reconocimiento, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoReconocimiento = $this->reconocimientoRepo->create($reconocimiento);
        $objetoReconocimiento = $objetoReconocimiento->toArray();

        $this->assertArrayHasKey('id', $objetoReconocimiento, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoReconocimiento['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Reconocimiento::find($objetoReconocimiento['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($reconocimiento, $objetoReconocimiento,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($reconocimiento, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_reconocimiento()
    {
        $reconocimiento = factory(Reconocimiento::class)->create();

        $dbReconocimiento = $this->reconocimientoRepo->find($reconocimiento->id);

        $dbReconocimiento = $dbReconocimiento->toArray();
        $this->assertModelData($reconocimiento->toArray(), $dbReconocimiento);
    }

    /**
     * @test editar
     */
    public function test_editar_reconocimiento()
    {
        $reconocimiento = factory(Reconocimiento::class)->create();
        $fakeReconocimiento = factory(Reconocimiento::class)->make()->toArray();

        $rules = (new UpdateReconocimientoRequest())->rules();
        $validator = Validator::make($fakeReconocimiento, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoReconocimiento = $this->reconocimientoRepo->update($fakeReconocimiento, $reconocimiento->id);

        $this->assertModelData($fakeReconocimiento, $objetoReconocimiento->toArray(),'El modelo no quedó con los datos editados.');
        $dbReconocimiento = $this->reconocimientoRepo->find($reconocimiento->id);
        $this->assertModelData($fakeReconocimiento, $dbReconocimiento->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_reconocimiento()
    {
        $reconocimiento = factory(Reconocimiento::class)->create();

        $resp = $this->reconocimientoRepo->delete($reconocimiento->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Reconocimiento::find($reconocimiento->id), 'El modelo no debe existir en BD.');
    }
}
