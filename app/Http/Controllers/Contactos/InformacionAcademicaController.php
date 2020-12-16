<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\InformacionAcademicaDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreateInformacionAcademicaRequest;
use App\Http\Requests\Contactos\UpdateInformacionAcademicaRequest;
use App\Repositories\Contactos\InformacionAcademicaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;
use App\Models\Contactos\Contacto;

class InformacionAcademicaController extends AppBaseController
{
    /** @var  InformacionAcademicaRepository */
    private $informacionAcademicaRepository;

    public function __construct(InformacionAcademicaRepository $informacionAcademicaRepo)
    {
        $this->informacionAcademicaRepository = $informacionAcademicaRepo;
    }

    /**
     * Display a listing of the InformacionAcademica.
     *
     * @param InformacionAcademicaDataTable $informacionAcademicaDataTable
     * @return Response
     */
    public function index(InformacionAcademicaDataTable $informacionAcademicaDataTable, Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            return $informacionAcademicaDataTable->render('contactos.informaciones_academicas.index',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto]); 
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un contacto asociado'], 500);     
        }
    }

    /**
     * Show the form for creating a new InformacionAcademica.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            return view('contactos.informaciones_academicas.create',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible crear este registro sin un contacto asociado'], 500);     
        } 
    }

    /**
     * Store a newly created InformacionAcademica in storage.
     *
     * @param CreateInformacionAcademicaRequest $request
     *
     * @return Response
     */
    public function store(CreateInformacionAcademicaRequest $request)
    {        
        $input = $request->all();

        $informacionAcademica = $this->informacionAcademicaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/informacionesAcademicas.singular')]));

        return redirect(route('contactos.informacionesAcademicas.index',['idContacto'=>$request->get('idContacto')]));
    }

    /**
     * Display the specified InformacionAcademica.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            $informacionAcademica = $this->informacionAcademicaRepository->find($id);

            if (empty($informacionAcademica)) {
                Flash::error(__('models/informacionesAcademicas.singular').' '.__('messages.not_found'));
    
                return redirect(route('contactos.informacionesAcademicas.index',['idContacto'=>$request->get('idContacto')]));
            }
    
            $audits = $informacionAcademica->ledgers()->with('user')->get()->sortByDesc('created_at');
    
            return view('contactos.informaciones_academicas.show',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto,'audits'=>$audits,'informacionAcademica'=>$informacionAcademica]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un contacto asociado'], 500);     
        }
    }

    /**
     * Show the form for editing the specified InformacionAcademica.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            $informacionAcademica = $this->informacionAcademicaRepository->find($id);

            if (empty($informacionAcademica)) {
                Flash::error(__('messages.not_found', ['model' => __('models/informacionesAcademicas.singular')]));
    
                return redirect(route('contactos.informacionesAcademicas.index',['idContacto'=>$request->get('idContacto')]));
            }
    
            return view('contactos.informaciones_academicas.edit',
            ['idContacto'=>$contacto->id,'contacto'=>$contacto,'informacionAcademica'=>$informacionAcademica]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible crear este registro sin un contacto asociado'], 500);     
        }        
    }

    /**
     * Update the specified InformacionAcademica in storage.
     *
     * @param  int              $id
     * @param UpdateInformacionAcademicaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInformacionAcademicaRequest $request)
    {
        dd($request);
        $informacionAcademica = $this->informacionAcademicaRepository->find($id);

        if (empty($informacionAcademica)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesAcademicas.singular')]));

            return redirect(route('contactos.informacionesAcademicas.index',['idContacto'=>$request->get('idContacto')]));
        }

        $informacionAcademica = $this->informacionAcademicaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/informacionesAcademicas.singular')]));

        return redirect(route('contactos.informacionesAcademicas.index',['idContacto'=>$request->get('idContacto')]));
    }

    /**
     * Remove the specified InformacionAcademica from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id,Request $request)
    {
        $informacionAcademica = $this->informacionAcademicaRepository->find($id);

        if (empty($informacionAcademica)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesAcademicas.singular')]));

            return redirect(route('contactos.informacionesAcademicas.index',['idContacto'=>$request->get('idContacto')]));
        }

        $this->informacionAcademicaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/informacionesAcademicas.singular')]));

        return redirect(route('contactos.informacionesAcademicas.index',['idContacto'=>$request->get('idContacto')]));
    }
}
