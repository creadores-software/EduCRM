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

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('contactos.parentescos.store');
        $response = $this->post($url, $parentesco); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoParentesco = Parentesco::latest()->first()->toArray();
        $this->assertModelData($parentesco, $objetoParentesco,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
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
        $this->assertModelData($parentesco->toArray(), $dbParentesco);
    }

    /**
     * @test editar
     */
    public function test_editar_parentesco()
    {
        //Se crea un objeto y se generan datos para edición  
        $parentesco = factory(Parentesco::class)->create();
        $fakeParentesco = factory(Parentesco::class)->make()->toArray();  
        
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
        $this->assertModelData($fakeParentesco, $objetoParentesco->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $parentesco = factory(Parentesco::class)->create(); 
        $url = route('contactos.parentescos.update', $parentesco->id);
        $response = $this->patch($url, $fakeParentesco); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
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
