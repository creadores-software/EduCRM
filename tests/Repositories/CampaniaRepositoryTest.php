<?php namespace Tests\Repositories;

use App\Http\Controllers\Campanias\CampaniaController;
use App\Models\Campanias\Campania;
use App\Repositories\Campanias\CampaniaRepository;
use App\Http\Requests\Campanias\CreateCampaniaRequest;
use App\Http\Requests\Campanias\UpdateCampaniaRequest;
use App\Models\Admin\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CampaniaRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var CampaniaRepository
     */
    protected $campaniaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->campaniaRepo = \App::make(CampaniaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_campania()
    {
        $campania = factory(Campania::class)->make()->toArray();

        $rules = (new CreateCampaniaRequest())->rules();
        $validator = Validator::make($campania, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoCampania = $this->campaniaRepo->create($campania);
        $objetoCampania = $objetoCampania->toArray();

        $this->assertArrayHasKey('id', $objetoCampania, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoCampania['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Campania::find($objetoCampania['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($campania, $objetoCampania,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        //Debido a que se usa Rule::unique es necesario realizar el procedimiento por post
        $url = action([CampaniaController::class, 'store']); 
        $response = $this->post($url, $campania); 
        $status=200;
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_campania()
    {
        $campania = factory(Campania::class)->create();

        $dbCampania = $this->campaniaRepo->find($campania->id);

        $dbCampania = $dbCampania->toArray();
        $this->assertModelData($campania->toArray(), $dbCampania);
    }

    /**
     * @test editar
     */
    public function test_editar_campania()
    {
        $campania = factory(Campania::class)->create();
        $fakeCampania = factory(Campania::class)->make()->toArray();

        $rules = (new UpdateCampaniaRequest())->rules();
        $validator = Validator::make($fakeCampania, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoCampania = $this->campaniaRepo->update($fakeCampania, $campania->id);

        $this->assertModelData($fakeCampania, $objetoCampania->toArray(),'El modelo no quedó con los datos editados.');
        $dbCampania = $this->campaniaRepo->find($campania->id);
        $this->assertModelData($fakeCampania, $dbCampania->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_campania()
    {
        $campania = factory(Campania::class)->create();

        $resp = $this->campaniaRepo->delete($campania->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Campania::find($campania->id), 'El modelo no debe existir en BD.');
    }
}
