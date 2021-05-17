<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->active) {
            auth()->logout();
            throw ValidationException::withMessages([
                $this->username() => 'Tu cuenta no está activa. Si tienes dudas contacta al administrador.',
            ]);
        }
        $permisos = auth()->user()->getAllPermissions();
        $textoPermisos = "";
        foreach($permisos as $permiso){
            $textoPermisos.=$permiso->name;
        }
        Session::put('textoPermisos', $textoPermisos);
        return redirect()->intended($this->redirectPath());
    }
}
