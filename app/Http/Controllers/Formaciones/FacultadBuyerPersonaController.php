<?php

namespace App\Http\Controllers\Formaciones;

use App\DataTables\Formaciones\FacultadBuyerPersonaDataTable;
use App\Http\Requests\Formaciones;
use App\Http\Requests\Formaciones\CreateFacultadBuyerPersonaRequest;
use App\Http\Requests\Formaciones\UpdateFacultadBuyerPersonaRequest;
use App\Repositories\Formaciones\FacultadBuyerPersonaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FacultadBuyerPersonaController extends AppBaseController
{
    /** @var  FacultadBuyerPersonaRepository */
    private $facultadBuyerPersonaRepository;

    public function __construct(FacultadBuyerPersonaRepository $facultadBuyerPersonaRepo)
    {
        $this->facultadBuyerPersonaRepository = $facultadBuyerPersonaRepo;
    }

    /**
     * Display a listing of the FacultadBuyerPersona.
     *
     * @param FacultadBuyerPersonaDataTable $facultadBuyerPersonaDataTable
     * @return Response
     */
    public function index(FacultadBuyerPersonaDataTable $facultadBuyerPersonaDataTable)
    {
        return $facultadBuyerPersonaDataTable->render('formaciones.facultades_buyer_persona.index');
    }

    /**
     * Show the form for creating a new FacultadBuyerPersona.
     *
     * @return Response
     */
    public function create()
    {
        return view('formaciones.facultades_buyer_persona.create');
    }

    /**
     * Store a newly created FacultadBuyerPersona in storage.
     *
     * @param CreateFacultadBuyerPersonaRequest $request
     *
     * @return Response
     */
    public function store(CreateFacultadBuyerPersonaRequest $request)
    {
        $input = $request->all();

        $facultadBuyerPersona = $this->facultadBuyerPersonaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/facultadesBuyerPersona.singular')]));

        return redirect(route('formaciones.facultadesBuyerPersona.index'));
    }

    /**
     * Display the specified FacultadBuyerPersona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $facultadBuyerPersona = $this->facultadBuyerPersonaRepository->find($id);

        if (empty($facultadBuyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/facultadesBuyerPersona.singular')]));

            return redirect(route('formaciones.facultadesBuyerPersona.index'));
        }
        $audits = $facultadBuyerPersona->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('formaciones.facultades_buyer_persona.show')->with(['facultadBuyerPersona'=>$facultadBuyerPersona, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified FacultadBuyerPersona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $facultadBuyerPersona = $this->facultadBuyerPersonaRepository->find($id);

        if (empty($facultadBuyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/facultadesBuyerPersona.singular')]));

            return redirect(route('formaciones.facultadesBuyerPersona.index'));
        }

        return view('formaciones.facultades_buyer_persona.edit')->with('facultadBuyerPersona', $facultadBuyerPersona);
    }

    /**
     * Update the specified FacultadBuyerPersona in storage.
     *
     * @param  int              $id
     * @param UpdateFacultadBuyerPersonaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFacultadBuyerPersonaRequest $request)
    {
        $facultadBuyerPersona = $this->facultadBuyerPersonaRepository->find($id);

        if (empty($facultadBuyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/facultadesBuyerPersona.singular')]));

            return redirect(route('formaciones.facultadesBuyerPersona.index'));
        }

        $facultadBuyerPersona = $this->facultadBuyerPersonaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/facultadesBuyerPersona.singular')]));

        return redirect(route('formaciones.facultadesBuyerPersona.index'));
    }

    /**
     * Remove the specified FacultadBuyerPersona from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $facultadBuyerPersona = $this->facultadBuyerPersonaRepository->find($id);

        if (empty($facultadBuyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/facultadesBuyerPersona.singular')]));

            return redirect(route('formaciones.facultadesBuyerPersona.index'));
        }

        $this->facultadBuyerPersonaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/facultadesBuyerPersona.singular')]));

        return redirect(route('formaciones.facultadesBuyerPersona.index'));
    }
}
