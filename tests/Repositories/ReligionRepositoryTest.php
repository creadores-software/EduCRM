<?php namespace Tests\Repositories;

use App\Models\Parametros\Religion;
use App\Repositories\Parametros\ReligionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ReligionRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var ReligionRepository
     */
    protected $religionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->religionRepo = \App::make(ReligionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_religion()
    {
        $religion = factory(Religion::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.religiones.store');
        $response = $this->post($url, $religion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoReligion = Religion::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($religion, $objetoReligion),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $religion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_religion()
    {
        $religion = factory(Religion::class)->create();
        $dbReligion = $this->religionRepo->find($religion->id);
        $dbReligion = $dbReligion->toArray();
        $this->assertTrue($this->sonDatosIguales($religion->toArray(),$dbReligion),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_religion()
    {
        //Se crea un objeto y se generan datos para edición  
        $religion = factory(Religion::class)->create();
        $fakeReligion = factory(Religion::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.religiones.update', $religion->id);
        $response = $this->patch($url,$fakeReligion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoReligion = Religion::find($religion->id);
        $this->assertTrue($this->sonDatosIguales($fakeReligion, $objetoReligion->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_religion()
    {
        $religion = factory(Religion::class)->create();
        $resp = $this->religionRepo->delete($religion->id);
        $this->assertNull(Religion::find($religion->id), 'El modelo no debe existir en BD.');
    }
}
