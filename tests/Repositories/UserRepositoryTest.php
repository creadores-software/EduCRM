<?php namespace Tests\Repositories;

use App\Models\Admin\User;
use App\Repositories\Admin\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /**
     * @var UserRepository
     */
    protected $userRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userRepo = \App::make(UserRepository::class);
    }

    /**
     * @test crear
     */
    public function test_crear_user()
    {
        $user = factory(User::class)->make()->toArray();
        $password='prueba123';
        $user['password']=$password;
        //Se intenta registrar y no debe generar ninguna excepción
        $url=route('admin.users.store');
        $response = $this->post($url, $user); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue creado correctamente.');
        
        //El último objeto corresponde con el creado
        $objetoUser = User::latest()->first()->toArray();
        $objetoUser['password']=$password;
        $this->assertModelData($user, $objetoUser,'El modelo guardado no coincide con el creado.');                
        
        //Valida después de creado con los mismos datos (repetido) y debe generar error 422       
        $response = $this->post($url, $user); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test consultar
     */
    public function test_consultar_user()
    {
        $user = factory(User::class)->make()->toArray();
        $password='prueba123';
        $user['password']=$password;
        $user = User::create($user);        
        $dbUser = $this->userRepo->find($user->id);
        $dbUser = $dbUser->toArray();
        $this->assertModelData($user->toArray(), $dbUser);
    }

    /**
     * @test editar
     */
    public function test_editar_user()
    {
        //Se crea un objeto y se generan datos para edición  
        $user = factory(User::class)->make()->toArray();
        $password='prueba123';
        $user['password']=$password;
        $user = User::create($user); 
        $fakeUser = factory(User::class)->make()->toArray();  
        
        //Se intenta editar y no debe generar ninguna excepción
        $url = route('admin.users.update', $user->id);
        $response = $this->patch($url,$fakeUser); 
        $excepcion=null; 
        if(is_object($response->exception)){
            $excepcion=$response->exception->getMessage();
        }
        $this->assertNull($excepcion,'El modelo no fue editado correctamente.');
        
        //El modelo actual debe tener los datos que se enviaron para edición
        $objetoUser = User::find($user->id);
        $this->assertModelData($fakeUser, $objetoUser->toArray(),'El modelo no quedó con los datos editados.');
        
        //Se crea una nueva entidad y se trata de poner la misma información
        $user = factory(User::class)->make()->toArray();
        $user['password']=$password;
        $user = User::create($user); 
        $url = route('admin.users.update', $user->id);
        $response = $this->patch($url, $fakeUser); 
        $status=200; 
        if(is_object($response->exception)){
            $status=$response->exception->status;
        }       
        $this->assertEquals(422,$status,'El modelo no valida objetos repetidos.');
    }

    /**
     * @test eliminar
     */
    public function test_eliminar_user()
    {
        $user = factory(User::class)->make()->toArray();
        $password='prueba123';
        $user['password']=$password;
        $user = User::create($user); 
        $resp = $this->userRepo->delete($user->id);
        $this->assertNull(User::find($user->id), 'El modelo no debe existir en BD.');
    }
}
