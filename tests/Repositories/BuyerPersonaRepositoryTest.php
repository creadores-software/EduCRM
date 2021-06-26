<?php namespace Tests\Repositories;

use App\Models\Parametros\BuyerPersona;
use App\Repositories\Parametros\BuyerPersonaRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class BuyerPersonaRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var BuyerPersonaRepository
     */
    protected $buyerPersonaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->buyerPersonaRepo = \App::make(BuyerPersonaRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_buyer_persona()
    {
        $buyerPersona = factory(BuyerPersona::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.buyerPersonas.store');
        $response = $this->post($url, $buyerPersona); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoBuyerPersona = BuyerPersona::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($buyerPersona, $objetoBuyerPersona),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $buyerPersona); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_buyer_persona()
    {
        $buyerPersona = factory(BuyerPersona::class)->create();
        $dbBuyerPersona = $this->buyerPersonaRepo->find($buyerPersona->id);
        $dbBuyerPersona = $dbBuyerPersona->toArray();
        $this->assertTrue($this->sonDatosIguales($buyerPersona->toArray(),$dbBuyerPersona),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_buyer_persona()
    {
        //Se crea un objeto y se generan datos para edición  
        $buyerPersona = factory(BuyerPersona::class)->create();
        $fakeBuyerPersona = factory(BuyerPersona::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.buyerPersonas.update', $buyerPersona->id);
        $response = $this->patch($url,$fakeBuyerPersona); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoBuyerPersona = BuyerPersona::find($buyerPersona->id);
        $this->assertTrue($this->sonDatosIguales($fakeBuyerPersona, $objetoBuyerPersona->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_buyer_persona()
    {
        $buyerPersona = factory(BuyerPersona::class)->create();
        $resp = $this->buyerPersonaRepo->delete($buyerPersona->id);
        $this->assertNull(BuyerPersona::find($buyerPersona->id), 'El modelo no debe existir en BD.');
    }
}
