<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\InformacionLaboralDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreateInformacionLaboralRequest;
use App\Http\Requests\Contactos\UpdateInformacionLaboralRequest;
use App\Repositories\Contactos\InformacionLaboralRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use App\Models\Contactos\Contacto;

class InformacionLaboralController extends AppBaseController
{
    /** @var  InformacionLaboralRepository */
    private $informacionLaboralRepository;

    public function __construct(InformacionLaboralRepository $informacionLaboralRepo)
    {
        $this->informacionLaboralRepository = $informacionLaboralRepo;
    }

    /**
     * Display a listing of the InformacionLaboral.
     *
     * @param InformacionLaboralDataTable $informacionLaboralDataTable
     * @return Response
     */
    public function index(InformacionLaboralDataTable $informacionLaboralDataTable)
    {
        if ($informacionLaboralDataTable->request()->has('idContacto')) {
            $contacto = Contacto::find($informacionLaboralDataTable->request()->get('idContacto'));
            return $informacionLaboralDataTable->render('contactos.informaciones_laborales.index',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto]); 
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un contacto asociado'], 500);     
        }
    }

    /**
     * Show the form for creating a new InformacionLaboral.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            return view('contactos.informaciones_laborales.create',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible crear este registro sin un contacto asociado'], 500);     
        } 
    }

    /**
     * Store a newly created InformacionLaboral in storage.
     *
     * @param CreateInformacionLaboralRequest $request
     *
     * @return Response
     */
    public function store(CreateInformacionLaboralRequest $request)
    {
        $input = $request->all();

        $informacionLaboral = $this->informacionLaboralRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/informacionesLaborales.singular')]));

        return redirect(route('contactos.informacionesLaborales.index',['idContacto'=>$request->get('idContacto')]));
    }

    /**
     * Display the specified InformacionLaboral.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            $informacionLaboral = $this->informacionLaboralRepository->find($id);

            if (empty($informacionLaboral)) {
                Flash::error(__('models/informacionesLaborales.singular').' '.__('messages.not_found'));
    
                return redirect(route('contactos.informacionesLaborales.index',['idContacto'=>$request->get('idContacto')]));
            }
    
            $audits = $informacionLaboral->ledgers()->with('user')->get()->sortByDesc('created_at');
    
            return view('contactos.informaciones_laborales.show',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto,'audits'=>$audits,'informacionLaboral'=>$informacionLaboral]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un contacto asociado'], 500);     
        }
    }

    /**
     * Show the form for editing the specified InformacionLaboral.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            $informacionLaboral = $this->informacionLaboralRepository->find($id);

            if (empty($informacionLaboral)) {
                Flash::error(__('messages.not_found', ['model' => __('models/informacionLaboral.singular')]));
    
                return redirect(route('contactos.informacionLaboral.index',['idContacto'=>$request->get('idContacto')]));
            }
    
            return view('contactos.informaciones_laborales.edit',
            ['idContacto'=>$contacto->id,'contacto'=>$contacto,'informacionLaboral'=>$informacionLaboral]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible editar este registro sin un contacto asociado'], 500);     
        }  
    }

    /**
     * Update the specified InformacionLaboral in storage.
     *
     * @param  int              $id
     * @param UpdateInformacionLaboralRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInformacionLaboralRequest $request)
    {
        $informacionLaboral = $this->informacionLaboralRepository->find($id);

        if (empty($informacionLaboral)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesLaborales.singular')]));

            return redirect(route('contactos.informacionesLaborales.index',['idContacto'=>$request->get('idContacto')]));
        }

        $informacionLaboral = $this->informacionLaboralRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/informacionesLaborales.singular')]));

        return redirect(route('contactos.informacionesLaborales.index',['idContacto'=>$request->get('idContacto')]));
    }

    /**
     * Remove the specified InformacionLaboral from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $informacionLaboral = $this->informacionLaboralRepository->find($id);

        if (empty($informacionLaboral)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesLaborales.singular')]));

            return redirect(route('contactos.informacionesLaborales.index',['idContacto'=>$request->get('idContacto')]));
        }

        $this->informacionLaboralRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/informacionesLaborales.singular')]));

        return redirect(route('contactos.informacionesLaborales.index',['idContacto'=>$request->get('idContacto')]));
    }
}
