<?php

namespace App\Http\Controllers\Entidades;

use App\DataTables\Entidades\OcupacionDataTable;
use App\Http\Requests\Entidades;
use App\Http\Requests\Entidades\CreateOcupacionRequest;
use App\Http\Requests\Entidades\UpdateOcupacionRequest;
use App\Repositories\Entidades\OcupacionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OcupacionController extends AppBaseController
{
    /** @var  OcupacionRepository */
    private $ocupacionRepository;

    public function __construct(OcupacionRepository $ocupacionRepo)
    {
        $this->ocupacionRepository = $ocupacionRepo;
    }

    /**
     * Display a listing of the Ocupacion.
     *
     * @param OcupacionDataTable $ocupacionDataTable
     * @return Response
     */
    public function index(OcupacionDataTable $ocupacionDataTable)
    {
        return $ocupacionDataTable->render('entidades.ocupaciones.index');
    }

    /**
     * Show the form for creating a new Ocupacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('entidades.ocupaciones.create');
    }

    /**
     * Store a newly created Ocupacion in storage.
     *
     * @param CreateOcupacionRequest $request
     *
     * @return Response
     */
    public function store(CreateOcupacionRequest $request)
    {
        $input = $request->all();

        $ocupacion = $this->ocupacionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ocupaciones.singular')]));

        return redirect(route('entidades.ocupaciones.index'));
    }

    /**
     * Display the specified Ocupacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ocupacion = $this->ocupacionRepository->find($id);

        if (empty($ocupacion)) {
            Flash::error(__('models/ocupaciones.singular').' '.__('messages.not_found'));

            return redirect(route('entidades.ocupaciones.index'));
        }

        $audits = $ocupacion->audits;

        return view('entidades.ocupaciones.show')->with(['ocupacion'=> $ocupacion, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Ocupacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ocupacion = $this->ocupacionRepository->find($id);

        if (empty($ocupacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ocupaciones.singular')]));

            return redirect(route('entidades.ocupaciones.index'));
        }

        return view('entidades.ocupaciones.edit')->with('ocupacion', $ocupacion);
    }

    /**
     * Update the specified Ocupacion in storage.
     *
     * @param  int              $id
     * @param UpdateOcupacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOcupacionRequest $request)
    {
        $ocupacion = $this->ocupacionRepository->find($id);

        if (empty($ocupacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ocupaciones.singular')]));

            return redirect(route('entidades.ocupaciones.index'));
        }

        $ocupacion = $this->ocupacionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ocupaciones.singular')]));

        return redirect(route('entidades.ocupaciones.index'));
    }

    /**
     * Remove the specified Ocupacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ocupacion = $this->ocupacionRepository->find($id);

        if (empty($ocupacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ocupaciones.singular')]));

            return redirect(route('entidades.ocupaciones.index'));
        }

        $this->ocupacionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ocupaciones.singular')]));

        return redirect(route('entidades.ocupaciones.index'));
    }
}
