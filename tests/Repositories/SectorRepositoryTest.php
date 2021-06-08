<?php namespace Tests\Repositories;

use App\Models\Entidades\Sector;
use App\Repositories\Entidades\SectorRepository;
use App\Http\Requests\Entidades\CreateSectorRequest;
use App\Http\Requests\Entidades\UpdateSectorRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class SectorRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var SectorRepository
     */
    protected $sectorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sectorRepo = \App::make(SectorRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_sector()
    {
        $sector = factory(Sector::class)->make()->toArray();

        $rules = (new CreateSectorRequest())->rules();
        $validator = Validator::make($sector, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoSector = $this->sectorRepo->create($sector);
        $objetoSector = $objetoSector->toArray();

        $this->assertArrayHasKey('id', $objetoSector, 'El modelo creado debe tener un id especificado.');
        $this->assertNotNull($objetoSector['id'], 'El id del modelo no debe ser nulo.');
        $this->assertNotNull(Sector::find($objetoSector['id']), 'El modelo no quedó registrado en la BD.');
        $this->assertModelData($sector, $objetoSector,'El modelo guardado no coincide con el creado.');        
        
        //Valida después de creado con los mismos datos (repetido)
        $validator = Validator::make($sector, $rules);
        $this->assertEquals(true, $validator->fails(),'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_sector()
    {
        $sector = factory(Sector::class)->create();

        $dbSector = $this->sectorRepo->find($sector->id);

        $dbSector = $dbSector->toArray();
        $this->assertModelData($sector->toArray(), $dbSector);
    }

    /**
     * @test editar
     */
    public function test_editar_sector()
    {
        $sector = factory(Sector::class)->create();
        $fakeSector = factory(Sector::class)->make()->toArray();

        $rules = (new UpdateSectorRequest())->rules();
        $validator = Validator::make($fakeSector, $rules);
        $this->assertEquals(false, $validator->fails(),'El modelo no pasó la validación de las reglas.');

        $objetoSector = $this->sectorRepo->update($fakeSector, $sector->id);

        $this->assertModelData($fakeSector, $objetoSector->toArray(),'El modelo no quedó con los datos editados.');
        $dbSector = $this->sectorRepo->find($sector->id);
        $this->assertModelData($fakeSector, $dbSector->toArray(),'La edición no tuvo efectos en la BD.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_sector()
    {
        $sector = factory(Sector::class)->create();

        $resp = $this->sectorRepo->delete($sector->id);

        $this->assertTrue($resp,'El proceso de eliminación no fue exitoso.');
        $this->assertNull(Sector::find($sector->id), 'El modelo no debe existir en BD.');
    }
}
