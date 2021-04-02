<?php

namespace App\Http\Controllers\Formaciones;

use App\DataTables\Formaciones\PeriodicidadDataTable;
use App\Http\Requests\Formaciones;
use App\Http\Requests\Formaciones\CreatePeriodicidadRequest;
use App\Http\Requests\Formaciones\UpdatePeriodicidadRequest;
use App\Repositories\Formaciones\PeriodicidadRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PeriodicidadController extends AppBaseController
{
    /** @var  PeriodicidadRepository */
    private $periodicidadRepository;

    public function __construct(PeriodicidadRepository $periodicidadRepo)
    {
        $this->periodicidadRepository = $periodicidadRepo;
    }

    /**
     * Display a listing of the Periodicidad.
     *
     * @param PeriodicidadDataTable $periodicidadDataTable
     * @return Response
     */
    public function index(PeriodicidadDataTable $periodicidadDataTable)
    {
        return $periodicidadDataTable->render('formaciones.periodicidades.index');
    }

    /**
     * Show the form for creating a new Periodicidad.
     *
     * @return Response
     */
    public function create()
    {
        return view('formaciones.periodicidades.create');
    }

    /**
     * Store a newly created Periodicidad in storage.
     *
     * @param CreatePeriodicidadRequest $request
     *
     * @return Response
     */
    public function store(CreatePeriodicidadRequest $request)
    {
        $input = $request->all();

        $periodicidad = $this->periodicidadRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/periodicidades.singular')]));

        return redirect(route('formaciones.periodicidades.index'));
    }

    /**
     * Display the specified Periodicidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $periodicidad = $this->periodicidadRepository->find($id);

        if (empty($periodicidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodicidades.singular')]));

            return redirect(route('formaciones.periodicidades.index'));
        }

        return view('formaciones.periodicidades.show')->with('periodicidad', $periodicidad);
    }

    /**
     * Show the form for editing the specified Periodicidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $periodicidad = $this->periodicidadRepository->find($id);

        if (empty($periodicidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodicidades.singular')]));

            return redirect(route('formaciones.periodicidades.index'));
        }

        return view('formaciones.periodicidades.edit')->with('periodicidad', $periodicidad);
    }

    /**
     * Update the specified Periodicidad in storage.
     *
     * @param  int              $id
     * @param UpdatePeriodicidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeriodicidadRequest $request)
    {
        $periodicidad = $this->periodicidadRepository->find($id);

        if (empty($periodicidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodicidades.singular')]));

            return redirect(route('formaciones.periodicidades.index'));
        }

        $periodicidad = $this->periodicidadRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/periodicidades.singular')]));

        return redirect(route('formaciones.periodicidades.index'));
    }

    /**
     * Remove the specified Periodicidad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $periodicidad = $this->periodicidadRepository->find($id);

        if (empty($periodicidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodicidades.singular')]));

            return redirect(route('formaciones.periodicidades.index'));
        }

        $this->periodicidadRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/periodicidades.singular')]));

        return redirect(route('formaciones.periodicidades.index'));
    }
}
