<?php namespace Tests\Repositories;

use App\Models\Parametros\EstatusLealtad;
use App\Repositories\Parametros\EstatusLealtadRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EstatusLealtadRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var EstatusLealtadRepository
     */
    protected $estatusLealtadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->estatusLealtadRepo = \App::make(EstatusLealtadRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_estatus_lealtad()
    {
        $estatusLealtad = factory(EstatusLealtad::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.estatusLealtad.store');
        $response = $this->post($url, $estatusLealtad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoEstatusLealtad = EstatusLealtad::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($estatusLealtad, $objetoEstatusLealtad),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $estatusLealtad); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_estatus_lealtad()
    {
        $estatusLealtad = factory(EstatusLealtad::class)->create();
        $dbEstatusLealtad = $this->estatusLealtadRepo->find($estatusLealtad->id);
        $dbEstatusLealtad = $dbEstatusLealtad->toArray();
        $this->assertTrue($this->sonDatosIguales($estatusLealtad->toArray(),$dbEstatusLealtad),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_estatus_lealtad()
    {
        //Se crea un objeto y se generan datos para edición  
        $estatusLealtad = factory(EstatusLealtad::class)->create();
        $fakeEstatusLealtad = factory(EstatusLealtad::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.estatusLealtad.update', $estatusLealtad->id);
        $response = $this->patch($url,$fakeEstatusLealtad); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoEstatusLealtad = EstatusLealtad::find($estatusLealtad->id);
        $this->assertTrue($this->sonDatosIguales($fakeEstatusLealtad, $objetoEstatusLealtad->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_estatus_lealtad()
    {
        $estatusLealtad = factory(EstatusLealtad::class)->create();
        $resp = $this->estatusLealtadRepo->delete($estatusLealtad->id);
        $this->assertNull(EstatusLealtad::find($estatusLealtad->id), 'El modelo no debe existir en BD.');
    }
}
