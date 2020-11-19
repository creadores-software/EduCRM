<?php

namespace App\Http\Controllers\Entidades;

use App\DataTables\Entidades\ActividadEconomicaDataTable;
use App\Http\Requests\Entidades;
use App\Http\Requests\Entidades\CreateActividadEconomicaRequest;
use App\Http\Requests\Entidades\UpdateActividadEconomicaRequest;
use App\Repositories\Entidades\ActividadEconomicaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ActividadEconomicaController extends AppBaseController
{
    /** @var  ActividadEconomicaRepository */
    private $actividadEconomicaRepository;

    public function __construct(ActividadEconomicaRepository $actividadEconomicaRepo)
    {
        $this->actividadEconomicaRepository = $actividadEconomicaRepo;
    }

    /**
     * Display a listing of the ActividadEconomica.
     *
     * @param ActividadEconomicaDataTable $actividadEconomicaDataTable
     * @return Response
     */
    public function index(ActividadEconomicaDataTable $actividadEconomicaDataTable)
    {
        return $actividadEconomicaDataTable->render('entidades.actividades_economicas.index');
    }

    /**
     * Show the form for creating a new ActividadEconomica.
     *
     * @return Response
     */
    public function create()
    {
        return view('entidades.actividades_economicas.create');
    }

    /**
     * Store a newly created ActividadEconomica in storage.
     *
     * @param CreateActividadEconomicaRequest $request
     *
     * @return Response
     */
    public function store(CreateActividadEconomicaRequest $request)
    {
        $input = $request->all();

        $actividadEconomica = $this->actividadEconomicaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/actividadesEconomicas.singular')]));

        return redirect(route('entidades.actividadesEconomicas.index'));
    }

    /**
     * Display the specified ActividadEconomica.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $actividadEconomica = $this->actividadEconomicaRepository->find($id);

        if (empty($actividadEconomica)) {
            Flash::error(__('models/actividadesEconomicas.singular').' '.__('messages.not_found'));

            return redirect(route('entidades.actividadesEconomicas.index'));
        }

        return view('entidades.actividades_economicas.show')->with('actividadEconomica', $actividadEconomica);
    }

    /**
     * Show the form for editing the specified ActividadEconomica.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $actividadEconomica = $this->actividadEconomicaRepository->find($id);

        if (empty($actividadEconomica)) {
            Flash::error(__('messages.not_found', ['model' => __('models/actividadesEconomicas.singular')]));

            return redirect(route('entidades.actividadesEconomicas.index'));
        }

        return view('entidades.actividades_economicas.edit')->with('actividadEconomica', $actividadEconomica);
    }

    /**
     * Update the specified ActividadEconomica in storage.
     *
     * @param  int              $id
     * @param UpdateActividadEconomicaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActividadEconomicaRequest $request)
    {
        $actividadEconomica = $this->actividadEconomicaRepository->find($id);

        if (empty($actividadEconomica)) {
            Flash::error(__('messages.not_found', ['model' => __('models/actividadesEconomicas.singular')]));

            return redirect(route('entidades.actividadesEconomicas.index'));
        }

        $actividadEconomica = $this->actividadEconomicaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/actividadesEconomicas.singular')]));

        return redirect(route('entidades.actividadesEconomicas.index'));
    }

    /**
     * Remove the specified ActividadEconomica from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $actividadEconomica = $this->actividadEconomicaRepository->find($id);

        if (empty($actividadEconomica)) {
            Flash::error(__('messages.not_found', ['model' => __('models/actividadesEconomicas.singular')]));

            return redirect(route('entidades.actividadesEconomicas.index'));
        }

        $this->actividadEconomicaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/actividadesEconomicas.singular')]));

        return redirect(route('entidades.actividadesEconomicas.index'));
    }
}
