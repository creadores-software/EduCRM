<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\TipoCampaniaEstadosDataTable;
use App\Models\Campanias\TipoCampania;
use App\Http\Requests\Campanias\CreateTipoCampaniaEstadosRequest;
use App\Http\Requests\Campanias\UpdateTipoCampaniaEstadosRequest;
use App\Repositories\Campanias\TipoCampaniaEstadosRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Campanias\TipoCampaniaEstados;
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
        if ($tipoCampaniaEstadosDataTable->request()->has('idTipo')) {
            $tipo = TipoCampania::find($tipoCampaniaEstadosDataTable->request()->get('idTipo'));
            return $tipoCampaniaEstadosDataTable->render('campanias.tipos_campania_estados.index',
                ['idTipo'=>$tipo->id,'nombreTipo'=>$tipo->nombre]); 
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un estado seleccionado'], 500);     
        }
    }

    /**
     * Show the form for creating a new TipoCampaniaEstados.
     *
     * @return Response
     */
    public function create(Request $request)
    {   
        if ($request->has('idTipo')) {
            $tipo = TipoCampania::find($request->get('idTipo'));
            $siguienteOrden = TipoCampaniaEstados::where('tipo_campania_id',$tipo->id)->count()+1;
            return view('campanias.tipos_campania_estados.create')
            ->with(['idTipo'=>$tipo->id,'nombreTipo'=>$tipo->nombre,'siguienteOrden'=>$siguienteOrden]); 
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un estado seleccionado'], 500);     
        } 
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

        return redirect(route('campanias.tiposCampaniaEstados.index',['idTipo'=>$tipoCampaniaEstados->tipo_campania_id]));
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

        return view('campanias.tipos_campania_estados.edit')
            ->with(['tipoCampaniaEstados'=>$tipoCampaniaEstados,
            'idTipo'=>$tipoCampaniaEstados->tipoCampania->id,'nombreTipo'=>$tipoCampaniaEstados->tipoCampania->nombre,'siguienteOrden'=>$tipoCampaniaEstados->orden]);     
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

        return redirect(route('campanias.tiposCampaniaEstados.index',['idTipo'=>$tipoCampaniaEstados->tipo_campania_id]));
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
        $idTipo = $tipoCampaniaEstados->tipo_campania_id;
        $this->tipoCampaniaEstadosRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tiposCampaniaEstados.singular')]));

        return redirect(route('campanias.tiposCampaniaEstados.index',['idTipo'=>$idTipo]));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->tipoCampaniaEstadosRepository->infoSelect2($request->input('q', ''));
    }

}
