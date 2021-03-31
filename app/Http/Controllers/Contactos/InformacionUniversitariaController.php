<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\InformacionUniversitariaDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreateInformacionUniversitariaRequest;
use App\Http\Requests\Contactos\UpdateInformacionUniversitariaRequest;
use App\Repositories\Contactos\InformacionUniversitariaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use App\Models\Contactos\Contacto;

class InformacionUniversitariaController extends AppBaseController
{
    /** @var  InformacionUniversitariaRepository */
    private $informacionUniversitariaRepository;

    public function __construct(InformacionUniversitariaRepository $informacionUniversitariaRepo)
    {
        $this->informacionUniversitariaRepository = $informacionUniversitariaRepo;
    }

    /**
     * Display a listing of the InformacionUniversitaria.
     *
     * @param InformacionUniversitariaDataTable $informacionUniversitariaDataTable
     * @return Response
     */
    public function index(InformacionUniversitariaDataTable $informacionUniversitariaDataTable)
    {
        if ($informacionUniversitariaDataTable->request()->has('idContacto')) {
            $contacto = Contacto::find($informacionUniversitariaDataTable->request()->get('idContacto'));
            return $informacionUniversitariaDataTable->render('contactos.informaciones_universitarias.index',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto]); 
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un contacto asociado'], 500);     
        }
    }

    /**
     * Show the form for creating a new InformacionUniversitaria.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            return view('contactos.informaciones_universitarias.create',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible crear este registro sin un contacto asociado'], 500);     
        } 
    }

    /**
     * Store a newly created InformacionUniversitaria in storage.
     *
     * @param CreateInformacionUniversitariaRequest $request
     *
     * @return Response
     */
    public function store(CreateInformacionUniversitariaRequest $request)
    {        
        $input = $request->all();

        $informacionUniversitaria = $this->informacionUniversitariaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/informacionesUniversitarias.singular')]));

        return redirect(route('contactos.informacionesUniversitarias.index',['idContacto'=>$request->get('idContacto')]));
    }

    /**
     * Display the specified InformacionUniversitaria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            $informacionUniversitaria = $this->informacionUniversitariaRepository->find($id);

            if (empty($informacionUniversitaria)) {
                Flash::error(__('models/informacionesUniversitarias.singular').' '.__('messages.not_found'));
    
                return redirect(route('contactos.informacionesUniversitarias.index',['idContacto'=>$request->get('idContacto')]));
            }
    
            $audits = $informacionUniversitaria->ledgers()->with('user')->get()->sortByDesc('created_at');
    
            return view('contactos.informaciones_universitarias.show',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto,'audits'=>$audits,'informacionUniversitaria'=>$informacionUniversitaria]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un contacto asociado'], 500);     
        }
    }

    /**
     * Show the form for editing the specified InformacionUniversitaria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            $informacionUniversitaria = $this->informacionUniversitariaRepository->find($id);

            if (empty($informacionUniversitaria)) {
                Flash::error(__('messages.not_found', ['model' => __('models/informacionesUniversitarias.singular')]));
    
                return redirect(route('contactos.informacionesUniversitarias.index',['idContacto'=>$request->get('idContacto')]));
            }
    
            return view('contactos.informaciones_universitarias.edit',
            ['idContacto'=>$contacto->id,'contacto'=>$contacto,'informacionUniversitaria'=>$informacionUniversitaria]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible editar este registro sin un contacto asociado'], 500);     
        }        
    }

    /**
     * Update the specified InformacionUniversitaria in storage.
     *
     * @param  int              $id
     * @param UpdateInformacionUniversitariaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInformacionUniversitariaRequest $request)
    {
        $informacionUniversitaria = $this->informacionUniversitariaRepository->find($id);

        if (empty($informacionUniversitaria)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesUniversitarias.singular')]));

            return redirect(route('contactos.informacionesUniversitarias.index',['idContacto'=>$request->get('idContacto')]));
        }

        $informacionUniversitaria = $this->informacionUniversitariaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/informacionesUniversitarias.singular')]));

        return redirect(route('contactos.informacionesUniversitarias.index',['idContacto'=>$request->get('idContacto')]));
    }

    /**
     * Remove the specified InformacionUniversitaria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        $informacionUniversitaria = $this->informacionUniversitariaRepository->find($id);

        if (empty($informacionUniversitaria)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesUniversitarias.singular')]));

            return redirect(route('contactos.informacionesUniversitarias.index',['idContacto'=>$request->get('idContacto')]));
        }

        $this->informacionUniversitariaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/informacionesUniversitarias.singular')]));

        return redirect(route('contactos.informacionesUniversitarias.index',['idContacto'=>$request->get('idContacto')]));
    }
}
