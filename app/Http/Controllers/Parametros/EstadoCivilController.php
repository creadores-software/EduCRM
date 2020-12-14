<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\EstadoCivilDataTable;
use App\Http\Requests\Parametros\CreateEstadoCivilRequest;
use App\Http\Requests\Parametros\UpdateEstadoCivilRequest;
use App\Repositories\Parametros\EstadoCivilRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class EstadoCivilController extends AppBaseController
{
    /** @var  EstadoCivilRepository */
    private $estadoCivilRepository;

    public function __construct(EstadoCivilRepository $estadoCivilRepo)
    {
        $this->estadoCivilRepository = $estadoCivilRepo;
    }

    /**
     * Display a listing of the EstadoCivil.
     *
     * @param EstadoCivilDataTable $estadoCivilDataTable
     * @return Response
     */
    public function index(EstadoCivilDataTable $estadoCivilDataTable)
    {
        return $estadoCivilDataTable->render('parametros.estados_civiles.index');
    }

    /**
     * Show the form for creating a new EstadoCivil.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.estados_civiles.create');
    }

    /**
     * Store a newly created EstadoCivil in storage.
     *
     * @param CreateEstadoCivilRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoCivilRequest $request)
    {
        $input = $request->all();

        $estadoCivil = $this->estadoCivilRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/estadosCiviles.singular')]));

        return redirect(route('parametros.estadosCiviles.index'));
    }

    /**
     * Display the specified EstadoCivil.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoCivil = $this->estadoCivilRepository->find($id);

        if (empty($estadoCivil)) {
            Flash::error(__('models/estadosCiviles.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.estadosCiviles.index'));
        }

        $audits = $estadoCivil->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('parametros.estados_civiles.show')->with(['estadoCivil'=> $estadoCivil, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified EstadoCivil.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoCivil = $this->estadoCivilRepository->find($id);

        if (empty($estadoCivil)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estadosCiviles.singular')]));

            return redirect(route('parametros.estadosCiviles.index'));
        }

        return view('parametros.estados_civiles.edit')->with('estadoCivil', $estadoCivil);
    }

    /**
     * Update the specified EstadoCivil in storage.
     *
     * @param  int              $id
     * @param UpdateEstadoCivilRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoCivilRequest $request)
    {
        $estadoCivil = $this->estadoCivilRepository->find($id);

        if (empty($estadoCivil)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estadosCiviles.singular')]));

            return redirect(route('parametros.estadosCiviles.index'));
        }

        $estadoCivil = $this->estadoCivilRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/estadosCiviles.singular')]));

        return redirect(route('parametros.estadosCiviles.index'));
    }

    /**
     * Remove the specified EstadoCivil from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoCivil = $this->estadoCivilRepository->find($id);

        if (empty($estadoCivil)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estadosCiviles.singular')]));

            return redirect(route('parametros.estadosCiviles.index'));
        }

        $this->estadoCivilRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/estadosCiviles.singular')]));

        return redirect(route('parametros.estadosCiviles.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->estadoCivilRepository->infoSelect2($request->input('q', ''));
    }
}
