<?php namespace Tests\Repositories;

use App\Models\Contactos\Parentesco;
use App\Repositories\Contactos\ParentescoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ParentescoRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var ParentescoRepository
     */
    protected $parentescoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->parentescoRepo = \App::make(ParentescoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_parentesco()
    {
        $parentesco = factory(Parentesco::class)->make()->toArray();
        $parentesco['testRepository']=true;
        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('contactos.parentescos.store');
        $response = $this->post($url, $parentesco); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //Se hace la misma comprobación para evitar errores con parentesco que se genera al mismo tiempo.
        $objetoParentesco = $parentesco;
        $this->assertTrue($this->sonDatosIguales($parentesco, $objetoParentesco),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        unset($parentesco['testRepository']);
        $response = $this->post($url, $parentesco); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_parentesco()
    {
        $parentesco = factory(Parentesco::class)->create();
        $dbParentesco = $this->parentescoRepo->find($parentesco->id);
        $dbParentesco = $dbParentesco->toArray();
        $this->assertTrue($this->sonDatosIguales($parentesco->toArray(),$dbParentesco),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_parentesco()
    {
        //Se crea un objeto y se generan datos para edición  
        $parentesco = factory(Parentesco::class)->create();
        $fakeParentesco = factory(Parentesco::class)->make()->toArray();  
        $fakeParentesco['testRepository']=true;
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('contactos.parentescos.update', $parentesco->id);
        $response = $this->patch($url,$fakeParentesco); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoParentesco = Parentesco::find($parentesco->id);
        $this->assertTrue($this->sonDatosIguales($fakeParentesco, $objetoParentesco->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_parentesco()
    {
        $parentesco = factory(Parentesco::class)->create();
        $resp = $this->parentescoRepo->delete($parentesco->id);
        $this->assertNull(Parentesco::find($parentesco->id), 'El modelo no debe existir en BD.');
    }
}
