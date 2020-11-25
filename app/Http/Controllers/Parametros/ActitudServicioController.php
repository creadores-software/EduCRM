<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\ActitudServicioDataTable;
use App\Http\Requests\Parametros\CreateActitudServicioRequest;
use App\Http\Requests\Parametros\UpdateActitudServicioRequest;
use App\Repositories\Parametros\ActitudServicioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;
class ActitudServicioController extends AppBaseController
{
    /** @var  ActitudServicioRepository */
    private $actitudServicioRepository;

    public function __construct(ActitudServicioRepository $actitudServicioRepo)
    {
        $this->actitudServicioRepository = $actitudServicioRepo;
    }

    /**
     * Display a listing of the ActitudServicio.
     *
     * @param ActitudServicioDataTable $actitudServicioDataTable
     * @return Response
     */
    public function index(ActitudServicioDataTable $actitudServicioDataTable)
    {
        return $actitudServicioDataTable->render('parametros.actitudes_servicio.index');
    }

    /**
     * Show the form for creating a new ActitudServicio.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.actitudes_servicio.create');
    }

    /**
     * Store a newly created ActitudServicio in storage.
     *
     * @param CreateActitudServicioRequest $request
     *
     * @return Response
     */
    public function store(CreateActitudServicioRequest $request)
    {
        $input = $request->all();

        $actitudServicio = $this->actitudServicioRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/actitudesServicio.singular')]));

        return redirect(route('parametros.actitudesServicio.index'));
    }

    /**
     * Display the specified ActitudServicio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $actitudServicio = $this->actitudServicioRepository->find($id);

        if (empty($actitudServicio)) {
            Flash::error(__('models/actitudesServicio.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.actitudesServicio.index'));
        }

        $audits = $actitudServicio->audits;

        return view('parametros.actitudes_servicio.show')->with(['actitudServicio'=> $actitudServicio, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified ActitudServicio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $actitudServicio = $this->actitudServicioRepository->find($id);

        if (empty($actitudServicio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/actitudesServicio.singular')]));

            return redirect(route('parametros.actitudesServicio.index'));
        }

        return view('parametros.actitudes_servicio.edit')->with('actitudServicio', $actitudServicio);
    }

    /**
     * Update the specified ActitudServicio in storage.
     *
     * @param  int              $id
     * @param UpdateActitudServicioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActitudServicioRequest $request)
    {
        $actitudServicio = $this->actitudServicioRepository->find($id);

        if (empty($actitudServicio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/actitudesServicio.singular')]));

            return redirect(route('parametros.actitudesServicio.index'));
        }

        $actitudServicio = $this->actitudServicioRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/actitudesServicio.singular')]));

        return redirect(route('parametros.actitudesServicio.index'));
    }

    /**
     * Remove the specified ActitudServicio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $actitudServicio = $this->actitudServicioRepository->find($id);

        if (empty($actitudServicio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/actitudesServicio.singular')]));

            return redirect(route('parametros.actitudesServicio.index'));
        }

        $this->actitudServicioRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/actitudesServicio.singular')]));

        return redirect(route('parametros.actitudesServicio.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->actitudServicioRepository->infoSelect2($request->input('term', ''));
    }
}
