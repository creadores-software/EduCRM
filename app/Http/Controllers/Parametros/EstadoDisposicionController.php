<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\EstadoDisposicionDataTable;
use App\Http\Requests\Parametros;
use App\Http\Requests\Parametros\CreateEstadoDisposicionRequest;
use App\Http\Requests\Parametros\UpdateEstadoDisposicionRequest;
use App\Repositories\Parametros\EstadoDisposicionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EstadoDisposicionController extends AppBaseController
{
    /** @var  EstadoDisposicionRepository */
    private $estadoDisposicionRepository;

    public function __construct(EstadoDisposicionRepository $estadoDisposicionRepo)
    {
        $this->estadoDisposicionRepository = $estadoDisposicionRepo;
    }

    /**
     * Display a listing of the EstadoDisposicion.
     *
     * @param EstadoDisposicionDataTable $estadoDisposicionDataTable
     * @return Response
     */
    public function index(EstadoDisposicionDataTable $estadoDisposicionDataTable)
    {
        return $estadoDisposicionDataTable->render('parametros.estados_disposicion.index');
    }

    /**
     * Show the form for creating a new EstadoDisposicion.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.estados_disposicion.create');
    }

    /**
     * Store a newly created EstadoDisposicion in storage.
     *
     * @param CreateEstadoDisposicionRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoDisposicionRequest $request)
    {
        $input = $request->all();

        $estadoDisposicion = $this->estadoDisposicionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/estadosDisposicion.singular')]));

        return redirect(route('parametros.estadosDisposicion.index'));
    }

    /**
     * Display the specified EstadoDisposicion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoDisposicion = $this->estadoDisposicionRepository->find($id);

        if (empty($estadoDisposicion)) {
            Flash::error(__('models/estadosDisposicion.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.estadosDisposicion.index'));
        }

        $audits = $estadoDisposicion->audits;

        return view('parametros.estados_disposicion.show')->with(['estadoDisposicion'=> $estadoDisposicion, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified EstadoDisposicion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoDisposicion = $this->estadoDisposicionRepository->find($id);

        if (empty($estadoDisposicion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estadosDisposicion.singular')]));

            return redirect(route('parametros.estadosDisposicion.index'));
        }

        return view('parametros.estados_disposicion.edit')->with('estadoDisposicion', $estadoDisposicion);
    }

    /**
     * Update the specified EstadoDisposicion in storage.
     *
     * @param  int              $id
     * @param UpdateEstadoDisposicionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoDisposicionRequest $request)
    {
        $estadoDisposicion = $this->estadoDisposicionRepository->find($id);

        if (empty($estadoDisposicion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estadosDisposicion.singular')]));

            return redirect(route('parametros.estadosDisposicion.index'));
        }

        $estadoDisposicion = $this->estadoDisposicionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/estadosDisposicion.singular')]));

        return redirect(route('parametros.estadosDisposicion.index'));
    }

    /**
     * Remove the specified EstadoDisposicion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoDisposicion = $this->estadoDisposicionRepository->find($id);

        if (empty($estadoDisposicion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estadosDisposicion.singular')]));

            return redirect(route('parametros.estadosDisposicion.index'));
        }

        $this->estadoDisposicionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/estadosDisposicion.singular')]));

        return redirect(route('parametros.estadosDisposicion.index'));
    }
}
