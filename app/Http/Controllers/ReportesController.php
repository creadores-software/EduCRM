<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\Campanias\Campania;
use App\Models\Admin\User;
use App\Models\Campanias\Interaccion;
use Illuminate\Http\Request;
use Response;

class ReportesController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware('permission:reportes.interacciones', ['only' => ['interacciones']]);
        $this->middleware('permission:reportes.funnel', ['only' => ['funnel']]);
    }    

    public function interacciones(Request $request)
    {
        $campania = null;
        $responsable = null;        
        if($request->has('campania_id')){
            $campania = Campania::where('id',$request->get('campania_id'))->first();   
        }
        if($request->has('responsable_id')){
            $responsable = User::where('id',$request->get('responsable_id'))->first();   
        }
        $reporte = Interaccion::reportePorEstado($campania,$responsable);
        return view('reportes.interacciones',[
            'campania'=>$campania,
            'responsable'=>$responsable,
            'labels'=>$reporte['labels'],
            'dataset'=>$reporte['dataset']
            ]
        );
    }

    public function funnel(Request $request)
    {
        $campania = null;
        $responsable = null;        
        if($request->has('campania_id')){
            $campania = Campania::where('id',$request->get('campania_id'))->first();   
        }
        if($request->has('responsable_id')){
            $responsable = User::where('id',$request->get('responsable_id'))->first();   
        }
        $reporte = Campania::reporteFunnel($campania,$responsable);
        return view('reportes.funnel',[
            'campania'=>$campania,
            'responsable'=>$responsable,
            'labels'=>$reporte['labels'],
            'dataset'=>$reporte['dataset']
            ]
        );
    }
}
