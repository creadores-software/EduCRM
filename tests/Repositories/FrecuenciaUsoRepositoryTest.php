<?php namespace Tests\Repositories;

use App\Models\Parametros\FrecuenciaUso;
use App\Repositories\Parametros\FrecuenciaUsoRepository;
use App\Http\Requests\Parametros\CreateFrecuenciaUsoRequest;
use App\Http\Requests\Parametros\UpdateFrecuenciaUsoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class FrecuenciaUsoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var FrecuenciaUsoRepository
     */
    protected $frecuenciaUsoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->frecuenciaUsoRepo = \App::make(FrecuenciaUsoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_frecuencia_uso()
    {
        $frecuenciaUso = factory(FrecuenciaUso::class)->make()->toArray();

        $rules = (new CreateFrecuenciaUsoRequest())->rules();
        $validator = Validator::make($frecuenciaUso, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoFrecuenciaUso = $this->frecuenciaUsoRepo->create($frecuenciaUso);
        $objetoFrecuenciaUso = $objetoFrecuenciaUso->toArray();

        $this->assertArrayHasKey('id', $objetoFrecuenciaUso, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoFrecuenciaUso['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(FrecuenciaUso::find($objetoFrecuenciaUso['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($frecuenciaUso, $objetoFrecuenciaUso,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($frecuenciaUso, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_frecuencia_uso()
    {
        $frecuenciaUso = factory(FrecuenciaUso::class)->create();

        $dbFrecuenciaUso = $this->frecuenciaUsoRepo->find($frecuenciaUso->id);

        $dbFrecuenciaUso = $dbFrecuenciaUso->toArray();
        $this->assertModelData($frecuenciaUso->toArray(), $dbFrecuenciaUso);
    }

    /**
     * @test editar
     */
    public function test_editar_frecuencia_uso()
    {
        $frecuenciaUso = factory(FrecuenciaUso::class)->create();
        $fakeFrecuenciaUso = factory(FrecuenciaUso::class)->make()->toArray();

        $rules = (new UpdateFrecuenciaUsoRequest())->rules();
        $validator = Validator::make($fakeFrecuenciaUso, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoFrecuenciaUso = $this->frecuenciaUsoRepo->update($fakeFrecuenciaUso, $frecuenciaUso->id);

        $this->assertModelData($fakeFrecuenciaUso, $objetoFrecuenciaUso->toArray(),'El modelo no quedó con los datos editados.');
        $dbFrecuenciaUso = $this->frecuenciaUsoRepo->find($frecuenciaUso->id);
        $this->assertModelData($fakeFrecuenciaUso, $dbFrecuenciaUso->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_frecuencia_uso()
    {
        $frecuenciaUso = factory(FrecuenciaUso::class)->create();

        $resp = $this->frecuenciaUsoRepo->delete($frecuenciaUso->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(FrecuenciaUso::find($frecuenciaUso->id), 'El modelo no debe existir en BD.');
    }
}
