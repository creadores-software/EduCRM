<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\PersonaBuyerPersonaDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreatePersonaBuyerPersonaRequest;
use App\Http\Requests\Contactos\UpdatePersonaBuyerPersonaRequest;
use App\Repositories\Contactos\PersonaBuyerPersonaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PersonaBuyerPersonaController extends AppBaseController
{
    /** @var  PersonaBuyerPersonaRepository */
    private $personaBuyerPersonaRepository;

    public function __construct(PersonaBuyerPersonaRepository $personaBuyerPersonaRepo)
    {
        $this->personaBuyerPersonaRepository = $personaBuyerPersonaRepo;
    }

    /**
     * Display a listing of the PersonaBuyerPersona.
     *
     * @param PersonaBuyerPersonaDataTable $personaBuyerPersonaDataTable
     * @return Response
     */
    public function index(PersonaBuyerPersonaDataTable $personaBuyerPersonaDataTable)
    {
        return $personaBuyerPersonaDataTable->render('contactos.persona_buyer_personas.index');
    }

    /**
     * Show the form for creating a new PersonaBuyerPersona.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactos.persona_buyer_personas.create');
    }

    /**
     * Store a newly created PersonaBuyerPersona in storage.
     *
     * @param CreatePersonaBuyerPersonaRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonaBuyerPersonaRequest $request)
    {
        $input = $request->all();

        $personaBuyerPersona = $this->personaBuyerPersonaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/personaBuyerPersonas.singular')]));

        return redirect(route('contactos.personaBuyerPersonas.index'));
    }

    /**
     * Display the specified PersonaBuyerPersona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personaBuyerPersona = $this->personaBuyerPersonaRepository->find($id);

        if (empty($personaBuyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/personaBuyerPersonas.singular')]));

            return redirect(route('contactos.personaBuyerPersonas.index'));
        }

        return view('contactos.persona_buyer_personas.show')->with('personaBuyerPersona', $personaBuyerPersona);
    }

    /**
     * Show the form for editing the specified PersonaBuyerPersona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personaBuyerPersona = $this->personaBuyerPersonaRepository->find($id);

        if (empty($personaBuyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/personaBuyerPersonas.singular')]));

            return redirect(route('contactos.personaBuyerPersonas.index'));
        }

        return view('contactos.persona_buyer_personas.edit')->with('personaBuyerPersona', $personaBuyerPersona);
    }

    /**
     * Update the specified PersonaBuyerPersona in storage.
     *
     * @param  int              $id
     * @param UpdatePersonaBuyerPersonaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonaBuyerPersonaRequest $request)
    {
        $personaBuyerPersona = $this->personaBuyerPersonaRepository->find($id);

        if (empty($personaBuyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/personaBuyerPersonas.singular')]));

            return redirect(route('contactos.personaBuyerPersonas.index'));
        }

        $personaBuyerPersona = $this->personaBuyerPersonaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/personaBuyerPersonas.singular')]));

        return redirect(route('contactos.personaBuyerPersonas.index'));
    }

    /**
     * Remove the specified PersonaBuyerPersona from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personaBuyerPersona = $this->personaBuyerPersonaRepository->find($id);

        if (empty($personaBuyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/personaBuyerPersonas.singular')]));

            return redirect(route('contactos.personaBuyerPersonas.index'));
        }

        $this->personaBuyerPersonaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/personaBuyerPersonas.singular')]));

        return redirect(route('contactos.personaBuyerPersonas.index'));
    }
}
