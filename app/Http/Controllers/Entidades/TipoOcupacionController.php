<?php

namespace App\Http\Controllers\Entidades;

use App\DataTables\Entidades\TipoOcupacionDataTable;
use App\Http\Requests\Entidades\CreateTipoOcupacionRequest;
use App\Http\Requests\Entidades\UpdateTipoOcupacionRequest;
use App\Repositories\Entidades\TipoOcupacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class TipoOcupacionController extends AppBaseController
{
    /** @var  TipoOcupacionRepository */
    private $tipoOcupacionRepository;

    public function __construct(TipoOcupacionRepository $tipoOcupacionRepo)
    {
        $this->tipoOcupacionRepository = $tipoOcupacionRepo;
        $this->middleware('permission:entidades.tiposOcupacion.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:entidades.tiposOcupacion.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:entidades.tiposOcupacion.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:entidades.tiposOcupacion.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the TipoOcupacion.
     *
     * @param TipoOcupacionDataTable $tipoOcupacionDataTable
     * @return Response
     */
    public function index(TipoOcupacionDataTable $tipoOcupacionDataTable)
    {
        return $tipoOcupacionDataTable->render('entidades.tipos_ocupacion.index');
    }

    /**
     * Show the form for creating a new TipoOcupacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('entidades.tipos_ocupacion.create');
    }

    /**
     * Store a newly created TipoOcupacion in storage.
     *
     * @param CreateTipoOcupacionRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoOcupacionRequest $request)
    {
        $input = $request->all();

        $tipoOcupacion = $this->tipoOcupacionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tiposOcupacion.singular')]));

        return redirect(route('entidades.tiposOcupacion.index'));
    }

    /**
     * Display the specified TipoOcupacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoOcupacion = $this->tipoOcupacionRepository->find($id);

        if (empty($tipoOcupacion)) {
            Flash::error(__('models/tiposOcupacion.singular').' '.__('messages.not_found'));

            return redirect(route('entidades.tiposOcupacion.index'));
        }

        $audits = $tipoOcupacion->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('entidades.tipos_ocupacion.show')->with(['tipoOcupacion'=> $tipoOcupacion, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified TipoOcupacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoOcupacion = $this->tipoOcupacionRepository->find($id);

        if (empty($tipoOcupacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposOcupacion.singular')]));

            return redirect(route('entidades.tiposOcupacion.index'));
        }

        return view('entidades.tipos_ocupacion.edit')->with('tipoOcupacion', $tipoOcupacion);
    }

    /**
     * Update the specified TipoOcupacion in storage.
     *
     * @param  int              $id
     * @param UpdateTipoOcupacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoOcupacionRequest $request)
    {
        $tipoOcupacion = $this->tipoOcupacionRepository->find($id);

        if (empty($tipoOcupacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposOcupacion.singular')]));

            return redirect(route('entidades.tiposOcupacion.index'));
        }

        $tipoOcupacion = $this->tipoOcupacionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tiposOcupacion.singular')]));

        return redirect(route('entidades.tiposOcupacion.index'));
    }

    /**
     * Remove the specified TipoOcupacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoOcupacion = $this->tipoOcupacionRepository->find($id);

        if (empty($tipoOcupacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposOcupacion.singular')]));

            return redirect(route('entidades.tiposOcupacion.index'));
        }

        $this->tipoOcupacionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tiposOcupacion.singular')]));

        return redirect(route('entidades.tiposOcupacion.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->tipoOcupacionRepository->infoSelect2($request->input('q', ''));
    }
}
