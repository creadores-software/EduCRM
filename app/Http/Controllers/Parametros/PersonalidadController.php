<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\PersonalidadDataTable;
use App\Http\Requests\Parametros;
use App\Http\Requests\Parametros\CreatePersonalidadRequest;
use App\Http\Requests\Parametros\UpdatePersonalidadRequest;
use App\Repositories\Parametros\PersonalidadRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PersonalidadController extends AppBaseController
{
    /** @var  PersonalidadRepository */
    private $personalidadRepository;

    public function __construct(PersonalidadRepository $personalidadRepo)
    {
        $this->personalidadRepository = $personalidadRepo;
    }

    /**
     * Display a listing of the Personalidad.
     *
     * @param PersonalidadDataTable $personalidadDataTable
     * @return Response
     */
    public function index(PersonalidadDataTable $personalidadDataTable)
    {
        return $personalidadDataTable->render('parametros.personalidades.index');
    }

    /**
     * Show the form for creating a new Personalidad.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.personalidades.create');
    }

    /**
     * Store a newly created Personalidad in storage.
     *
     * @param CreatePersonalidadRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonalidadRequest $request)
    {
        $input = $request->all();

        $personalidad = $this->personalidadRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/personalidades.singular')]));

        return redirect(route('parametros.personalidades.index'));
    }

    /**
     * Display the specified Personalidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personalidad = $this->personalidadRepository->find($id);

        if (empty($personalidad)) {
            Flash::error(__('models/personalidades.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.personalidades.index'));
        }

        return view('parametros.personalidades.show')->with('personalidad', $personalidad);
    }

    /**
     * Show the form for editing the specified Personalidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personalidad = $this->personalidadRepository->find($id);

        if (empty($personalidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/personalidades.singular')]));

            return redirect(route('parametros.personalidades.index'));
        }

        return view('parametros.personalidades.edit')->with('personalidad', $personalidad);
    }

    /**
     * Update the specified Personalidad in storage.
     *
     * @param  int              $id
     * @param UpdatePersonalidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonalidadRequest $request)
    {
        $personalidad = $this->personalidadRepository->find($id);

        if (empty($personalidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/personalidades.singular')]));

            return redirect(route('parametros.personalidades.index'));
        }

        $personalidad = $this->personalidadRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/personalidades.singular')]));

        return redirect(route('parametros.personalidades.index'));
    }

    /**
     * Remove the specified Personalidad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personalidad = $this->personalidadRepository->find($id);

        if (empty($personalidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/personalidades.singular')]));

            return redirect(route('parametros.personalidades.index'));
        }

        $this->personalidadRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/personalidades.singular')]));

        return redirect(route('parametros.personalidades.index'));
    }
}
