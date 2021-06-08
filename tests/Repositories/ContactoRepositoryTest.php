<?php namespace Tests\Repositories;

use App\Models\Contactos\Contacto;
use App\Repositories\Contactos\ContactoRepository;
use App\Http\Requests\Contactos\CreateContactoRequest;
use App\Http\Requests\Contactos\UpdateContactoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ContactoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ContactoRepository
     */
    protected $contactoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->contactoRepo = \App::make(ContactoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_contacto()
    {
        $contacto = factory(Contacto::class)->make()->toArray();

        $rules = (new CreateContactoRequest())->rules();
        $validator = Validator::make($contacto, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoContacto = $this->contactoRepo->create($contacto);
        $objetoContacto = $objetoContacto->toArray();

        $this->assertArrayHasKey('id', $objetoContacto, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoContacto['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Contacto::find($objetoContacto['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($contacto, $objetoContacto,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($contacto, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_contacto()
    {
        $contacto = factory(Contacto::class)->create();

        $dbContacto = $this->contactoRepo->find($contacto->id);

        $dbContacto = $dbContacto->toArray();
        $this->assertModelData($contacto->toArray(), $dbContacto);
    }

    /**
     * @test editar
     */
    public function test_editar_contacto()
    {
        $contacto = factory(Contacto::class)->create();
        $fakeContacto = factory(Contacto::class)->make()->toArray();

        $rules = (new UpdateContactoRequest())->rules();
        $validator = Validator::make($fakeContacto, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoContacto = $this->contactoRepo->update($fakeContacto, $contacto->id);

        $this->assertModelData($fakeContacto, $objetoContacto->toArray(),'El modelo no quedó con los datos editados.');
        $dbContacto = $this->contactoRepo->find($contacto->id);
        $this->assertModelData($fakeContacto, $dbContacto->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_contacto()
    {
        $contacto = factory(Contacto::class)->create();

        $resp = $this->contactoRepo->delete($contacto->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Contacto::find($contacto->id), 'El modelo no debe existir en BD.');
    }
}
