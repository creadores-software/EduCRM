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

class InformacionEscolarController extends AppBaseController
{
    /** @var  InformacionEscolarRepository */
    private $informacionEscolarRepository;

    public function __construct(InformacionEscolarRepository $informacionEscolarRepo)
    {
        $this->informacionEscolarRepository = $informacionEscolarRepo;
    }

    /**
     * Display a listing of the InformacionEscolar.
     *
     * @param InformacionEscolarDataTable $informacionEscolarDataTable
     * @return Response
     */
    public function index(InformacionEscolarDataTable $informacionEscolarDataTable, Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            return $informacionEscolarDataTable->render('contactos.informaciones_escolares.index',
                ['idContacto'=>$request->get('idContacto'),'contacto'=>$contacto]); 
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
            return view('contactos.informaciones_escolares.create',['idContacto'=>$request->get('idContacto')]);
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

        return redirect(route('contactos.informacionesEscolares.index'));
    }

    /**
     * Display the specified InformacionEscolar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $informacionEscolar = $this->informacionEscolarRepository->find($id);

        if (empty($informacionEscolar)) {
            Flash::error(__('models/informacionesEscolares.singular').' '.__('messages.not_found'));

            return redirect(route('contactos.informacionesEscolares.index'));
        }

        $audits = $informacionEscolar->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('contactos.informaciones_escolares.show')->with(['informacionEscolar'=> $informacionEscolar, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified InformacionEscolar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $informacionEscolar = $this->informacionEscolarRepository->find($id);

        if (empty($informacionEscolar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesEscolares.singular')]));

            return redirect(route('contactos.informacionesEscolares.index'));
        }

        return view('contactos.informaciones_escolares.edit')->with('informacionEscolar', $informacionEscolar);
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

            return redirect(route('contactos.informacionesEscolares.index'));
        }

        $informacionEscolar = $this->informacionEscolarRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/informacionesEscolares.singular')]));

        return redirect(route('contactos.informacionesEscolares.index'));
    }

    /**
     * Remove the specified InformacionEscolar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $informacionEscolar = $this->informacionEscolarRepository->find($id);

        if (empty($informacionEscolar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesEscolares.singular')]));

            return redirect(route('contactos.informacionesEscolares.index'));
        }

        $this->informacionEscolarRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/informacionesEscolares.singular')]));

        return redirect(route('contactos.informacionesEscolares.index'));
    }
}
