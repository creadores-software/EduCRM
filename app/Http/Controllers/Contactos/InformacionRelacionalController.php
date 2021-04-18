<?php

namespace App\Http\Controllers\Contactos;

use App\Http\Requests\Contactos\UpdateInformacionRelacionalRequest;
use App\Repositories\Contactos\InformacionRelacionalRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use App\Models\Contactos\Contacto;

class InformacionRelacionalController extends AppBaseController
{
    /** @var  InformacionRelacionalRepository */
    private $informacionRelacionalRepository;

    public function __construct(InformacionRelacionalRepository $informacionRelacionalRepo)
    {
        $this->informacionRelacionalRepository = $informacionRelacionalRepo;
        $this->middleware('permission:contactos.informacionesRelacionales.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:contactos.informacionesRelacionales.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:contactos.informacionesRelacionales.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:contactos.informacionesRelacionales.eliminar', ['only' => ['destroy']]);
    }

    //Solo se deja métodos de vista y edición pues creación y eliminación se realizará directamente desde el modelo

    /**
     * Display the specified InformacionRelacional.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            $informacionRelacional = $this->informacionRelacionalRepository->find($id);

            if (empty($informacionRelacional)) {
                Flash::error(__('models/informacionesRelacionales.singular').' '.__('messages.not_found'));

                return redirect(route('contactos.informacionesRelacionales.index'));
            }

            $audits = $informacionRelacional->ledgers()->with('user')->get()->sortByDesc('created_at');

            return view('contactos.informaciones_relacionales.show')->with(['informacionRelacional'=> $informacionRelacional, 'audits'=>$audits, 'idContacto'=>$contacto->id]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un contacto asociado'], 500);     
        }        
    }

    /**
     * Show the form for editing the specified InformacionRelacional.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id,Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            $informacionRelacional = $this->informacionRelacionalRepository->find($id);
            if (empty($informacionRelacional)) {
                Flash::error(__('messages.not_found', ['model' => __('models/informacionesRelacionales.singular')]));

                return redirect(route('contactos.informacionesRelacionales.index'));
            }

            return view('contactos.informaciones_relacionales.edit', ['informacionRelacional'=> $informacionRelacional, 'idContacto'=>$contacto->id]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible editar este registro sin un contacto asociado'], 500);     
        } 
    }

    /**
     * Update the specified InformacionRelacional in storage.
     *
     * @param  int              $id
     * @param UpdateInformacionRelacionalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInformacionRelacionalRequest $request)
    {
        $informacionRelacional = $this->informacionRelacionalRepository->find($id);

        if (empty($informacionRelacional)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesRelacionales.singular')]));

            return redirect(route('contactos.informacionesRelacionales.index'));
        }

        $informacionRelacional = $this->informacionRelacionalRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/informacionesRelacionales.singular')]));

        return redirect(route('contactos.informacionesRelacionales.show',[$informacionRelacional, 'idContacto'=>$request->get('idContacto')]));
    }
}
