<?php

namespace App\Http\Controllers\Contactos;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\Contactos\Contacto;
use Response;

class PreferenciasController extends AppBaseController
{
    /**
     * Display a listing of the PreferenciaActividadOcio.
     *
     * @param PreferenciaActividadOcioDataTable $preferenciaActividadOcioDataTable
     * @return Response
     */
    public function show(Request $request)
    {
        $idContacto=$request->input('idContacto'); 
        if(!empty($idContacto)){
            $contacto=Contacto::find($idContacto);
            $audits = $contacto->audits;
            return view('contactos.preferencias.show',['contacto'=>$contacto,'audits'=>$audits]);
        }        
    }

    public function edit(Request $request)
    {
        $idContacto=$request->input('idContacto'); 
        if(!empty($idContacto)){
            $contacto=Contacto::find($idContacto);
            return view('contactos.preferencias.edit',['contacto'=>$contacto]);
        } 
    }
}
