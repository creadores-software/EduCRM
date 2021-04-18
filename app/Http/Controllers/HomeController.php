<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = auth()->user()->getAllPermissions();
        $textoPermisos = "";
        foreach($permisos as $permiso){
            $textoPermisos.=$permiso->name;
        }
        Session::put('textoPermisos', $textoPermisos);
        return view('home');
    }
}
