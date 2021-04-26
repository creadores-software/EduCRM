<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\TipoCampaniaEstadosDataTable;
use App\Http\Requests\Campanias\CreateTipoCampaniaEstadosRequest;
use App\Http\Requests\Campanias\UpdateTipoCampaniaEstadosRequest;
use App\Repositories\Campanias\TipoCampaniaEstadosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class TipoCampaniaEstadosController extends AppBaseController
{
    /** @var  TipoCampaniaEstadosRepository */
    private $tipoCampaniaEstadosRepository;

    public function __construct(TipoCampaniaEstadosRepository $tipoCampaniaEstadosRepo)
    {
        $this->tipoCampaniaEstadosRepository = $tipoCampaniaEstadosRepo;
        $this->middleware('permission:campanias.tiposCampaniaEstados.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.tiposCampaniaEstados.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:campanias.tiposCampaniaEstados.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:campanias.tiposCampaniaEstados.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the TipoCampaniaEstados.
     *
     * @param TipoCampaniaEstadosDataTable $tipoCampaniaEstadosDataTable
     * @return Response
     */
    public function index(TipoCampaniaEstadosDataTable $tipoCampaniaEstadosDataTable)
    {
        return $tipoCampaniaEstadosDataTable->render('campanias.tipos_campania_estados.index');
    }

    /**
     * Show the form for creating a new TipoCampaniaEstados.
     *
     * @return Response
     */
    public function create()
    {
        return view('campanias.tipos_campania_estados.create');
    }

    /**
     * Store a newly created TipoCampaniaEstados in storage.
     *
     * @param CreateTipoCampaniaEstadosRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoCampaniaEstadosRequest $request)
    {
        $input = $request->all();

        $tipoCampaniaEstados = $this->tipoCampaniaEstadosRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tiposCampaniaEstados.singular')]));

        return redirect(route('campanias.tiposCampaniaEstados.index'));
    }

    /**
     * Display the specified TipoCampaniaEstados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoCampaniaEstados = $this->tipoCampaniaEstadosRepository->find($id);

        if (empty($tipoCampaniaEstados)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposCampaniaEstados.singular')]));

            return redirect(route('campanias.tiposCampaniaEstados.index'));
        }
        $audits = $tipoCampaniaEstados->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('campanias.tipos_campania_estados.show')->with(['tipoCampaniaEstados'=>$tipoCampaniaEstados,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified TipoCampaniaEstados.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoCampaniaEstados = $this->tipoCampaniaEstadosRepository->find($id);

        if (empty($tipoCampaniaEstados)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposCampaniaEstados.singular')]));

            return redirect(route('campanias.tiposCampaniaEstados.index'));
        }

        return view('campanias.tipos_campania_estados.edit')->with('tipoCampaniaEstados', $tipoCampaniaEstados);
    }

    /**
     * Update the specified TipoCampaniaEstados in storage.
     *
     * @param  int              $id
     * @param UpdateTipoCampaniaEstadosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoCampaniaEstadosRequest $request)
    {
        $tipoCampaniaEstados = $this->tipoCampaniaEstadosRepository->find($id);

        if (empty($tipoCampaniaEstados)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposCampaniaEstados.singular')]));

            return redirect(route('campanias.tiposCampaniaEstados.index'));
        }

        $tipoCampaniaEstados = $this->tipoCampaniaEstadosRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tiposCampaniaEstados.singular')]));

        return redirect(route('campanias.tiposCampaniaEstados.index'));
    }

    /**
     * Remove the specified TipoCampaniaEstados from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoCampaniaEstados = $this->tipoCampaniaEstadosRepository->find($id);

        if (empty($tipoCampaniaEstados)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposCampaniaEstados.singular')]));

            return redirect(route('campanias.tiposCampaniaEstados.index'));
        }

        $this->tipoCampaniaEstadosRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tiposCampaniaEstados.singular')]));

        return redirect(route('campanias.tiposCampaniaEstados.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->tipoCampaniaEstadosRepository->infoSelect2($request->input('q', ''));
    }

}
