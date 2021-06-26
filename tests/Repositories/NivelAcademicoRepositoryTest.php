<?php namespace Tests\Repositories;

use App\Models\Formaciones\NivelAcademico;
use App\Repositories\Formaciones\NivelAcademicoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class NivelAcademicoRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var NivelAcademicoRepository
     */
    protected $nivelAcademicoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->nivelAcademicoRepo = \App::make(NivelAcademicoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_nivel_academico()
    {
        $nivelAcademico = factory(NivelAcademico::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('formaciones.nivelesAcademicos.store');
        $response = $this->post($url, $nivelAcademico); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoNivelAcademico = NivelAcademico::all()->last()->toArray();
        $this->assertTrue($this->sonDatosIguales($nivelAcademico, $objetoNivelAcademico),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $nivelAcademico); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_nivel_academico()
    {
        $nivelAcademico = factory(NivelAcademico::class)->create();
        $dbNivelAcademico = $this->nivelAcademicoRepo->find($nivelAcademico->id);
        $dbNivelAcademico = $dbNivelAcademico->toArray();
        $this->assertTrue($this->sonDatosIguales($nivelAcademico->toArray(),$dbNivelAcademico),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_nivel_academico()
    {
        //Se crea un objeto y se generan datos para edición  
        $nivelAcademico = factory(NivelAcademico::class)->create();
        $fakeNivelAcademico = factory(NivelAcademico::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('formaciones.nivelesAcademicos.update', $nivelAcademico->id);
        $response = $this->patch($url,$fakeNivelAcademico); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoNivelAcademico = NivelAcademico::find($nivelAcademico->id);
        $this->assertTrue($this->sonDatosIguales($fakeNivelAcademico, $objetoNivelAcademico->toArray()),'El modelo no quedó con los datos editados.');       
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_nivel_academico()
    {
        $nivelAcademico = factory(NivelAcademico::class)->create();
        $resp = $this->nivelAcademicoRepo->delete($nivelAcademico->id);
        $this->assertNull(NivelAcademico::find($nivelAcademico->id), 'El modelo no debe existir en BD.');
    }
}
