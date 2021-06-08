<?php namespace Tests\Repositories;

use App\Models\Parametros\Lugar;
use App\Repositories\Parametros\LugarRepository;
use App\Http\Requests\Parametros\CreateLugarRequest;
use App\Http\Requests\Parametros\UpdateLugarRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class LugarRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var LugarRepository
     */
    protected $lugarRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->lugarRepo = \App::make(LugarRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_lugar()
    {
        $lugar = factory(Lugar::class)->make()->toArray();

        $rules = (new CreateLugarRequest())->rules();
        $validator = Validator::make($lugar, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoLugar = $this->lugarRepo->create($lugar);
        $objetoLugar = $objetoLugar->toArray();

        $this->assertArrayHasKey('id', $objetoLugar, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoLugar['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Lugar::find($objetoLugar['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($lugar, $objetoLugar,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($lugar, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_lugar()
    {
        $lugar = factory(Lugar::class)->create();

        $dbLugar = $this->lugarRepo->find($lugar->id);

        $dbLugar = $dbLugar->toArray();
        $this->assertModelData($lugar->toArray(), $dbLugar);
    }

    /**
     * @test editar
     */
    public function test_editar_lugar()
    {
        $lugar = factory(Lugar::class)->create();
        $fakeLugar = factory(Lugar::class)->make()->toArray();

        $rules = (new UpdateLugarRequest())->rules();
        $validator = Validator::make($fakeLugar, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoLugar = $this->lugarRepo->update($fakeLugar, $lugar->id);

        $this->assertModelData($fakeLugar, $objetoLugar->toArray(),'El modelo no quedó con los datos editados.');
        $dbLugar = $this->lugarRepo->find($lugar->id);
        $this->assertModelData($fakeLugar, $dbLugar->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_lugar()
    {
        $lugar = factory(Lugar::class)->create();

        $resp = $this->lugarRepo->delete($lugar->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Lugar::find($lugar->id), 'El modelo no debe existir en BD.');
    }
}
