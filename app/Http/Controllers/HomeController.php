<?php

namespace App\Http\Controllers;

use App\Models\Admin\User;
use App\Models\Campanias\Campania;
use App\Models\Campanias\Interaccion;
use App\Models\Campanias\Oportunidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index(Request $request)
    {
        $campania = null;
        $responsable = null;        
        if($request->has('campania_id')){
            $campania = Campania::where('id',$request->get('campania_id'))->first();   
        }
        if($request->has('responsable_id')){
            $responsable = User::where('id',$request->get('responsable_id'))->first();   
        }else{
            $responsable = User::where('id',Auth::user()->id)->first();     
        }
        $indicadores = Interaccion::indicadoresInteracciones($campania, $responsable);
        $interaccionesAtrasadas = $indicadores['interaccionesAtrasadas'];
        $interaccionesPendientes = $indicadores['interaccionesPendientes'];
        $interaccionesRealizadas = "{$indicadores['interaccionesRealizadas']}/{$indicadores['interaccionesTotales']}";
        $actividadesHoy=Interaccion::interaccionesPendientes($campania, $responsable);
        $contactosActualizacion=Oportunidad::oportunidadesPorActualizacion($campania, $responsable);
        return view('home',[
            'campania'=>$campania,
            'responsable'=>$responsable,
            'interaccionesAtrasadas'=>$interaccionesAtrasadas,
            'interaccionesPendientes'=>$interaccionesPendientes,
            'interaccionesRealizadas'=>$interaccionesRealizadas,
            'actividadesHoy'=>$actividadesHoy,
            'contactosActualizacion'=>$contactosActualizacion,
            ]
        );
    }
}
