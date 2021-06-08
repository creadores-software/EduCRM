<?php namespace Tests\Repositories;

use App\Models\Parametros\Sisben;
use App\Repositories\Parametros\SisbenRepository;
use App\Http\Requests\Parametros\CreateSisbenRequest;
use App\Http\Requests\Parametros\UpdateSisbenRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class SisbenRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var SisbenRepository
     */
    protected $sisbenRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sisbenRepo = \App::make(SisbenRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_sisben()
    {
        $sisben = factory(Sisben::class)->make()->toArray();

        $rules = (new CreateSisbenRequest())->rules();
        $validator = Validator::make($sisben, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoSisben = $this->sisbenRepo->create($sisben);
        $objetoSisben = $objetoSisben->toArray();

        $this->assertArrayHasKey('id', $objetoSisben, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoSisben['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Sisben::find($objetoSisben['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($sisben, $objetoSisben,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($sisben, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_sisben()
    {
        $sisben = factory(Sisben::class)->create();

        $dbSisben = $this->sisbenRepo->find($sisben->id);

        $dbSisben = $dbSisben->toArray();
        $this->assertModelData($sisben->toArray(), $dbSisben);
    }

    /**
     * @test editar
     */
    public function test_editar_sisben()
    {
        $sisben = factory(Sisben::class)->create();
        $fakeSisben = factory(Sisben::class)->make()->toArray();

        $rules = (new UpdateSisbenRequest())->rules();
        $validator = Validator::make($fakeSisben, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoSisben = $this->sisbenRepo->update($fakeSisben, $sisben->id);

        $this->assertModelData($fakeSisben, $objetoSisben->toArray(),'El modelo no quedó con los datos editados.');
        $dbSisben = $this->sisbenRepo->find($sisben->id);
        $this->assertModelData($fakeSisben, $dbSisben->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_sisben()
    {
        $sisben = factory(Sisben::class)->create();

        $resp = $this->sisbenRepo->delete($sisben->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Sisben::find($sisben->id), 'El modelo no debe existir en BD.');
    }
}
