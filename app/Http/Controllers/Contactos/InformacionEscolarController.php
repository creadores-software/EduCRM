<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\InformacionEscolarDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreateInformacionEscolarRequest;
use App\Http\Requests\Contactos\UpdateInformacionEscolarRequest;
use App\Repositories\Contactos\InformacionEscolarRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use App\Models\Contactos\Contacto;

class InformacionEscolarController extends AppBaseController
{
    /** @var  InformacionEscolarRepository */
    private $informacionEscolarRepository;

    public function __construct(InformacionEscolarRepository $informacionEscolarRepo)
    {
        $this->informacionEscolarRepository = $informacionEscolarRepo;
        $this->middleware('permission:contactos.informacionesEscolares.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:contactos.informacionesEscolares.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:contactos.informacionesEscolares.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:contactos.informacionesEscolares.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the InformacionEscolar.
     *
     * @param InformacionEscolarDataTable $informacionEscolarDataTable
     * @return Response
     */
    public function index(InformacionEscolarDataTable $informacionEscolarDataTable)
    {
        if ($informacionEscolarDataTable->request()->has('idContacto')) {
            $contacto = Contacto::find($informacionEscolarDataTable->request()->get('idContacto'));
            return $informacionEscolarDataTable->render('contactos.informaciones_escolares.index',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto]); 
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un contacto asociado'], 500);     
        }       
    }

    /**
     * Show the form for creating a new InformacionEscolar.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            return view('contactos.informaciones_escolares.create',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible crear este registro sin un contacto asociado'], 500);     
        } 
    }

    /**
     * Store a newly created InformacionEscolar in storage.
     *
     * @param CreateInformacionEscolarRequest $request
     *
     * @return Response
     */
    public function store(CreateInformacionEscolarRequest $request)
    {
        $input = $request->all();

        $informacionEscolar = $this->informacionEscolarRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/informacionesEscolares.singular')]));

        return redirect(route('contactos.informacionesEscolares.index',['idContacto'=>$request->get('idContacto')]));
    }

    /**
     * Display the specified InformacionEscolar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            $informacionEscolar = $this->informacionEscolarRepository->find($id);

            if (empty($informacionEscolar)) {
                Flash::error(__('models/informacionesEscolares.singular').' '.__('messages.not_found'));
    
                return redirect(route('contactos.informacionesEscolares.index',['idContacto'=>$request->get('idContacto')]));
            }
    
            $audits = $informacionEscolar->ledgers()->with('user')->get()->sortByDesc('created_at');
    
            return view('contactos.informaciones_escolares.show',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto,'audits'=>$audits,'informacionEscolar'=>$informacionEscolar]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un contacto asociado'], 500);     
        }
    }

    /**
     * Show the form for editing the specified InformacionEscolar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            $informacionEscolar = $this->informacionEscolarRepository->find($id);

            if (empty($informacionEscolar)) {
                Flash::error(__('messages.not_found', ['model' => __('models/informacionesEscolares.singular')]));
    
                return redirect(route('contactos.informacionesEscolares.index',['idContacto'=>$request->get('idContacto')]));
            }
    
            return view('contactos.informaciones_escolares.edit',
            ['idContacto'=>$contacto->id,'contacto'=>$contacto,'informacionEscolar'=>$informacionEscolar]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible editar este registro sin un contacto asociado'], 500);     
        }  
    }

    /**
     * Update the specified InformacionEscolar in storage.
     *
     * @param  int              $id
     * @param UpdateInformacionEscolarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInformacionEscolarRequest $request)
    {
        $informacionEscolar = $this->informacionEscolarRepository->find($id);

        if (empty($informacionEscolar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesEscolares.singular')]));

            return redirect(route('contactos.informacionesEscolares.index',['idContacto'=>$request->get('idContacto')]));
        }

        $informacionEscolar = $this->informacionEscolarRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/informacionesEscolares.singular')]));

        return redirect(route('contactos.informacionesEscolares.index',['idContacto'=>$request->get('idContacto')]));
    }

    /**
     * Remove the specified InformacionEscolar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        $informacionEscolar = $this->informacionEscolarRepository->find($id);

        if (empty($informacionEscolar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesEscolares.singular')]));

            return redirect(route('contactos.informacionesEscolares.index',['idContacto'=>$request->get('idContacto')]));
        }

        $this->informacionEscolarRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/informacionesEscolares.singular')]));

        return redirect(route('contactos.informacionesEscolares.index',['idContacto'=>$request->get('idContacto')]));
    }
}
