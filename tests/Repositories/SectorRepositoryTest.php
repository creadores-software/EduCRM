<?php namespace Tests\Repositories;

use App\Models\Entidades\Sector;
use App\Repositories\Entidades\SectorRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class SectorRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

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

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('entidades.sectores.store');
        $response = $this->post($url, $sector); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoSector = Sector::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($sector, $objetoSector),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $sector); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_sector()
    {
        $sector = factory(Sector::class)->create();
        $dbSector = $this->sectorRepo->find($sector->id);
        $dbSector = $dbSector->toArray();
        $this->assertTrue($this->sonDatosIguales($sector->toArray(),$dbSector),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_sector()
    {
        //Se crea un objeto y se generan datos para edición  
        $sector = factory(Sector::class)->create();
        $fakeSector = factory(Sector::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('entidades.sectores.update', $sector->id);
        $response = $this->patch($url,$fakeSector); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoSector = Sector::find($sector->id);
        $this->assertTrue($this->sonDatosIguales($fakeSector, $objetoSector->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_sector()
    {
        $sector = factory(Sector::class)->create();
        $resp = $this->sectorRepo->delete($sector->id);
        $this->assertNull(Sector::find($sector->id), 'El modelo no debe existir en BD.');
    }
}
