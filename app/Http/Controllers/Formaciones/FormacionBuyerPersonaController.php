<?php

namespace App\Http\Controllers\Formaciones;

use App\DataTables\Formaciones\FormacionBuyerPersonaDataTable;
use App\Http\Requests\Formaciones;
use App\Http\Requests\Formaciones\CreateFormacionBuyerPersonaRequest;
use App\Http\Requests\Formaciones\UpdateFormacionBuyerPersonaRequest;
use App\Repositories\Formaciones\FormacionBuyerPersonaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FormacionBuyerPersonaController extends AppBaseController
{
    /** @var  FormacionBuyerPersonaRepository */
    private $formacionBuyerPersonaRepository;

    public function __construct(FormacionBuyerPersonaRepository $formacionBuyerPersonaRepo)
    {
        $this->formacionBuyerPersonaRepository = $formacionBuyerPersonaRepo;
    }

    /**
     * Display a listing of the FormacionBuyerPersona.
     *
     * @param FormacionBuyerPersonaDataTable $formacionBuyerPersonaDataTable
     * @return Response
     */
    public function index(FormacionBuyerPersonaDataTable $formacionBuyerPersonaDataTable)
    {
        return $formacionBuyerPersonaDataTable->render('formaciones.formacion_buyer_personas.index');
    }

    /**
     * Show the form for creating a new FormacionBuyerPersona.
     *
     * @return Response
     */
    public function create()
    {
        return view('formaciones.formacion_buyer_personas.create');
    }

    /**
     * Store a newly created FormacionBuyerPersona in storage.
     *
     * @param CreateFormacionBuyerPersonaRequest $request
     *
     * @return Response
     */
    public function store(CreateFormacionBuyerPersonaRequest $request)
    {
        $input = $request->all();

        $formacionBuyerPersona = $this->formacionBuyerPersonaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/formacionBuyerPersonas.singular')]));

        return redirect(route('formaciones.formacionBuyerPersonas.index'));
    }

    /**
     * Display the specified FormacionBuyerPersona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formacionBuyerPersona = $this->formacionBuyerPersonaRepository->find($id);

        if (empty($formacionBuyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/formacionBuyerPersonas.singular')]));

            return redirect(route('formaciones.formacionBuyerPersonas.index'));
        }
        $audits = $formacionBuyerPersona->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('formaciones.formacion_buyer_personas.show')->with(['formacionBuyerPersona'=>$formacionBuyerPersona, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified FormacionBuyerPersona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formacionBuyerPersona = $this->formacionBuyerPersonaRepository->find($id);

        if (empty($formacionBuyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/formacionBuyerPersonas.singular')]));

            return redirect(route('formaciones.formacionBuyerPersonas.index'));
        }

        return view('formaciones.formacion_buyer_personas.edit')->with('formacionBuyerPersona', $formacionBuyerPersona);
    }

    /**
     * Update the specified FormacionBuyerPersona in storage.
     *
     * @param  int              $id
     * @param UpdateFormacionBuyerPersonaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormacionBuyerPersonaRequest $request)
    {
        $formacionBuyerPersona = $this->formacionBuyerPersonaRepository->find($id);

        if (empty($formacionBuyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/formacionBuyerPersonas.singular')]));

            return redirect(route('formaciones.formacionBuyerPersonas.index'));
        }

        $formacionBuyerPersona = $this->formacionBuyerPersonaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/formacionBuyerPersonas.singular')]));

        return redirect(route('formaciones.formacionBuyerPersonas.index'));
    }

    /**
     * Remove the specified FormacionBuyerPersona from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formacionBuyerPersona = $this->formacionBuyerPersonaRepository->find($id);

        if (empty($formacionBuyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/formacionBuyerPersonas.singular')]));

            return redirect(route('formaciones.formacionBuyerPersonas.index'));
        }

        $this->formacionBuyerPersonaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/formacionBuyerPersonas.singular')]));

        return redirect(route('formaciones.formacionBuyerPersonas.index'));
    }
}
