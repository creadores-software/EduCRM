<?php namespace Tests\Repositories;

use App\Models\Formaciones\PeriodoAcademico;
use App\Repositories\Formaciones\PeriodoAcademicoRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PeriodoAcademicoRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var PeriodoAcademicoRepository
     */
    protected $periodoAcademicoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->periodoAcademicoRepo = \App::make(PeriodoAcademicoRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_periodo_academico()
    {
        $periodoAcademico = factory(PeriodoAcademico::class)->make()->toArray();

        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('formaciones.periodosAcademico.store');
        $response = $this->post($url, $periodoAcademico); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoPeriodoAcademico = PeriodoAcademico::latest()->first()->toArray();
        $this->assertModelData($periodoAcademico, $objetoPeriodoAcademico,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $periodoAcademico); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_periodo_academico()
    {
        $periodoAcademico = factory(PeriodoAcademico::class)->create();
        $dbPeriodoAcademico = $this->periodoAcademicoRepo->find($periodoAcademico->id);
        $dbPeriodoAcademico = $dbPeriodoAcademico->toArray();
        $this->assertModelData($periodoAcademico->toArray(), $dbPeriodoAcademico);
    }

    /**
     * @test editar
     */
    public function test_editar_periodo_academico()
    {
        //Se crea un objeto y se generan datos para edición  
        $periodoAcademico = factory(PeriodoAcademico::class)->create();
        $fakePeriodoAcademico = factory(PeriodoAcademico::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('formaciones.periodosAcademico.update', $periodoAcademico->id);
        $response = $this->patch($url,$fakePeriodoAcademico); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoPeriodoAcademico = PeriodoAcademico::find($periodoAcademico->id);
        $this->assertModelData($fakePeriodoAcademico, $objetoPeriodoAcademico->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $periodoAcademico = factory(PeriodoAcademico::class)->create(); 
        $url = route('formaciones.periodosAcademico.update', $periodoAcademico->id);
        $response = $this->patch($url, $fakePeriodoAcademico); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_periodo_academico()
    {
        $periodoAcademico = factory(PeriodoAcademico::class)->create();
        $resp = $this->periodoAcademicoRepo->delete($periodoAcademico->id);
        $this->assertNull(PeriodoAcademico::find($periodoAcademico->id), 'El modelo no debe existir en BD.');
    }
}
