<?php namespace Tests\Repositories;

use App\Models\Campanias\Interaccion;
use App\Repositories\Campanias\InteraccionRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class InteraccionRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var InteraccionRepository
     */
    protected $interaccionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->interaccionRepo = \App::make(InteraccionRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_interaccion()
    {
        $interaccion = factory(Interaccion::class)->make()->toArray();
        //Para datetime se debe formatear para que no presente dificultad
        $interaccion['fecha_inicio'] = date('Y-m-d H:i:s',strtotime($interaccion['fecha_inicio']));
        $interaccion['fecha_fin'] = date('Y-m-d H:i:s',strtotime($interaccion['fecha_fin']));
        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('campanias.interacciones.store');
        $response = $this->post($url, $interaccion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');        
        
        //El último objeto corresponde con el creado
        $objetoInteraccion = Interaccion::latest()->first()->toArray();  
        //Para datetime se debe formatear para que no presente dificultad 
        $objetoInteraccion['fecha_inicio'] = date('Y-m-d H:i:s',strtotime($objetoInteraccion['fecha_inicio']));
        $objetoInteraccion['fecha_fin'] = date('Y-m-d H:i:s',strtotime($objetoInteraccion['fecha_fin']));     
        $this->assertTrue($this->sonDatosIguales($interaccion, $objetoInteraccion),'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $interaccion); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_interaccion()
    {
        $interaccion = factory(Interaccion::class)->create();
        $dbInteraccion = $this->interaccionRepo->find($interaccion->id);
        $dbInteraccion = $dbInteraccion->toArray();
        $this->assertTrue($this->sonDatosIguales($interaccion->toArray(), $dbInteraccion),'El modelo consultado no coincide con el creado');
    }

    /**
     * @test editar
     */
    public function test_editar_interaccion()
    {
        //Se crea un objeto y se generan datos para edición  
        $interaccion = factory(Interaccion::class)->create();        
        $fakeInteraccion = factory(Interaccion::class)->make()->toArray();   
        //Para datetime se debe formatear para que no presente dificultad  
        $fakeInteraccion['fecha_inicio'] = date('Y-m-d H:i:s',strtotime($fakeInteraccion['fecha_inicio']));
        $fakeInteraccion['fecha_fin'] = date('Y-m-d H:i:s',strtotime($fakeInteraccion['fecha_fin']));  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('campanias.interacciones.update', $interaccion->id);
        $response = $this->patch($url,$fakeInteraccion); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoInteraccion = Interaccion::find($interaccion->id)->toArray();
        //Para datetime se debe formatear para que no presente dificultad
        $objetoInteraccion['fecha_inicio'] = date('Y-m-d H:i:s',strtotime($objetoInteraccion['fecha_inicio']));
        $objetoInteraccion['fecha_fin'] = date('Y-m-d H:i:s',strtotime($objetoInteraccion['fecha_fin']));
        $this->assertTrue($this->sonDatosIguales($fakeInteraccion, $objetoInteraccion),'El modelo no quedó con los datos editados.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_interaccion()
    {
        $interaccion = factory(Interaccion::class)->create();
        $resp = $this->interaccionRepo->delete($interaccion->id);
        $this->assertNull(Interaccion::find($interaccion->id), 'El modelo no debe existir en BD.');
    }
}
