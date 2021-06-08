<?php namespace Tests\Repositories;

use App\Models\Contactos\Segmento;
use App\Repositories\Contactos\SegmentoRepository;
use App\Http\Requests\Contactos\CreateSegmentoRequest;
use App\Http\Requests\Contactos\UpdateSegmentoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class SegmentoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var SegmentoRepository
     */
    protected $segmentoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->segmentoRepo = \App::make(SegmentoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_segmento()
    {
        $segmento = factory(Segmento::class)->make()->toArray();

        $rules = (new CreateSegmentoRequest())->rules();
        $validator = Validator::make($segmento, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoSegmento = $this->segmentoRepo->create($segmento);
        $objetoSegmento = $objetoSegmento->toArray();

        $this->assertArrayHasKey('id', $objetoSegmento, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoSegmento['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Segmento::find($objetoSegmento['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($segmento, $objetoSegmento,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($segmento, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_segmento()
    {
        $segmento = factory(Segmento::class)->create();

        $dbSegmento = $this->segmentoRepo->find($segmento->id);

        $dbSegmento = $dbSegmento->toArray();
        $this->assertModelData($segmento->toArray(), $dbSegmento);
    }

    /**
     * @test editar
     */
    public function test_editar_segmento()
    {
        $segmento = factory(Segmento::class)->create();
        $fakeSegmento = factory(Segmento::class)->make()->toArray();

        $rules = (new UpdateSegmentoRequest())->rules();
        $validator = Validator::make($fakeSegmento, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoSegmento = $this->segmentoRepo->update($fakeSegmento, $segmento->id);

        $this->assertModelData($fakeSegmento, $objetoSegmento->toArray(),'El modelo no quedó con los datos editados.');
        $dbSegmento = $this->segmentoRepo->find($segmento->id);
        $this->assertModelData($fakeSegmento, $dbSegmento->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_segmento()
    {
        $segmento = factory(Segmento::class)->create();

        $resp = $this->segmentoRepo->delete($segmento->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Segmento::find($segmento->id), 'El modelo no debe existir en BD.');
    }
}
