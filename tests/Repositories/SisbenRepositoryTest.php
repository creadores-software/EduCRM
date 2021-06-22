<?php namespace Tests\Repositories;

use App\Models\Parametros\Sisben;
use App\Repositories\Parametros\SisbenRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class SisbenRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var SisbenRepository
     */
    protected $sisbenRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sisbenRepo = \App::make(SisbenRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_sisben()
    {
        $sisben = factory(Sisben::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('parametros.sisbenes.store');
        $response = $this->post($url, $sisben); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoSisben = Sisben::latest()->first()->toArray();
        $this->assertTrue($this->sonDatosIguales($sisben, $objetoSisben),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $sisben); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_sisben()
    {
        $sisben = factory(Sisben::class)->create();
        $dbSisben = $this->sisbenRepo->find($sisben->id);
        $dbSisben = $dbSisben->toArray();
        $this->assertTrue($this->sonDatosIguales($sisben->toArray(),$dbSisben),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_sisben()
    {
        //Se crea un objeto y se generan datos para edición  
        $sisben = factory(Sisben::class)->create();
        $fakeSisben = factory(Sisben::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('parametros.sisbenes.update', $sisben->id);
        $response = $this->patch($url,$fakeSisben); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoSisben = Sisben::find($sisben->id);
        $this->assertTrue($this->sonDatosIguales($fakeSisben, $objetoSisben->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_sisben()
    {
        $sisben = factory(Sisben::class)->create();
        $resp = $this->sisbenRepo->delete($sisben->id);
        $this->assertNull(Sisben::find($sisben->id), 'El modelo no debe existir en BD.');
    }
}
