<?php namespace Tests\Repositories;

use App\Models\Contactos\ContactoTipoContacto;
use App\Repositories\Contactos\ContactoTipoContactoRepository;
use App\Http\Requests\Contactos\CreateContactoTipoContactoRequest;
use App\Http\Requests\Contactos\UpdateContactoTipoContactoRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ContactoTipoContactoRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ContactoTipoContactoRepository
     */
    protected $contactoTipoContactoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->contactoTipoContactoRepo = \App::make(ContactoTipoContactoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_contacto_tipo_contacto()
    {
        $contactoTipoContacto = factory(ContactoTipoContacto::class)->make()->toArray();

        $rules = (new CreateContactoTipoContactoRequest())->rules();
        $validator = Validator::make($contactoTipoContacto, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoContactoTipoContacto = $this->contactoTipoContactoRepo->create($contactoTipoContacto);
        $objetoContactoTipoContacto = $objetoContactoTipoContacto->toArray();

        $this->assertArrayHasKey('id', $objetoContactoTipoContacto, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoContactoTipoContacto['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(ContactoTipoContacto::find($objetoContactoTipoContacto['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($contactoTipoContacto, $objetoContactoTipoContacto,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($contactoTipoContacto, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_contacto_tipo_contacto()
    {
        $contactoTipoContacto = factory(ContactoTipoContacto::class)->create();

        $dbContactoTipoContacto = $this->contactoTipoContactoRepo->find($contactoTipoContacto->id);

        $dbContactoTipoContacto = $dbContactoTipoContacto->toArray();
        $this->assertModelData($contactoTipoContacto->toArray(), $dbContactoTipoContacto);
    }

    /**
     * @test editar
     */
    public function test_editar_contacto_tipo_contacto()
    {
        $contactoTipoContacto = factory(ContactoTipoContacto::class)->create();
        $fakeContactoTipoContacto = factory(ContactoTipoContacto::class)->make()->toArray();

        $rules = (new UpdateContactoTipoContactoRequest())->rules();
        $validator = Validator::make($fakeContactoTipoContacto, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoContactoTipoContacto = $this->contactoTipoContactoRepo->update($fakeContactoTipoContacto, $contactoTipoContacto->id);

        $this->assertModelData($fakeContactoTipoContacto, $objetoContactoTipoContacto->toArray(),'El modelo no quedó con los datos editados.');
        $dbContactoTipoContacto = $this->contactoTipoContactoRepo->find($contactoTipoContacto->id);
        $this->assertModelData($fakeContactoTipoContacto, $dbContactoTipoContacto->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_contacto_tipo_contacto()
    {
        $contactoTipoContacto = factory(ContactoTipoContacto::class)->create();

        $resp = $this->contactoTipoContactoRepo->delete($contactoTipoContacto->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(ContactoTipoContacto::find($contactoTipoContacto->id), 'El modelo no debe existir en BD.');
    }
}
