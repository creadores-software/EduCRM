<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PertenenciaEquipoMercadeoDataTable;
use App\Models\Admin\EquipoMercadeo;
use App\Http\Requests\Admin\CreatePertenenciaEquipoMercadeoRequest;
use App\Http\Requests\Admin\UpdatePertenenciaEquipoMercadeoRequest;
use App\Repositories\Admin\PertenenciaEquipoMercadeoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class PertenenciaEquipoMercadeoController extends AppBaseController
{
    /** @var  PertenenciaEquipoMercadeoRepository */
    private $pertenenciaEquipoMercadeoRepository;

    public function __construct(PertenenciaEquipoMercadeoRepository $pertenenciaEquipoMercadeoRepo)
    {
        $this->pertenenciaEquipoMercadeoRepository = $pertenenciaEquipoMercadeoRepo;
        //$this->middleware('permission:admin.pertenenciasEquipoMercadeo.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:admin.pertenenciasEquipoMercadeo.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:admin.pertenenciasEquipoMercadeo.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:admin.pertenenciasEquipoMercadeo.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the PertenenciaEquipoMercadeo.
     *
     * @param PertenenciaEquipoMercadeoDataTable $pertenenciaEquipoMercadeoDataTable
     * @return Response
     */
    public function index(PertenenciaEquipoMercadeoDataTable $pertenenciaEquipoMercadeoDataTable)
    {
        if ($pertenenciaEquipoMercadeoDataTable->request()->has('idEquipo')) {
            $equipo = EquipoMercadeo::find($pertenenciaEquipoMercadeoDataTable->request()->get('idEquipo'));
            return $pertenenciaEquipoMercadeoDataTable->render('admin.pertenencias_equipo_mercadeo.index',
                ['idEquipo'=>$equipo->id,'nombreEquipo'=>$equipo->nombre]); 
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un equipo seleccionado'], 500);     
        } 
    }

    /**
     * Show the form for creating a new PertenenciaEquipoMercadeo.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if ($request->has('idEquipo')) {
            $equipo = EquipoMercadeo::find($request->get('idEquipo'));
            return view('admin.pertenencias_equipo_mercadeo.create')
            ->with(['idEquipo'=>$equipo->id,'nombreEquipo'=>$equipo->nombre]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un equipo seleccionado'], 500);     
        }         
    }

    /**
     * Store a newly created PertenenciaEquipoMercadeo in storage.
     *
     * @param CreatePertenenciaEquipoMercadeoRequest $request
     *
     * @return Response
     */
    public function store(CreatePertenenciaEquipoMercadeoRequest $request)
    {
        $input = $request->all();      

        $pertenenciaEquipoMercadeo = $this->pertenenciaEquipoMercadeoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/pertenenciasEquipoMercadeo.singular')]));

        return redirect(route('admin.pertenenciasEquipoMercadeo.index',['idEquipo'=>$pertenenciaEquipoMercadeo->equipo_mercadeo_id]));
    }

    /**
     * Display the specified PertenenciaEquipoMercadeo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pertenenciaEquipoMercadeo = $this->pertenenciaEquipoMercadeoRepository->find($id);

        if (empty($pertenenciaEquipoMercadeo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pertenenciasEquipoMercadeo.singular')]));

            return redirect(route('admin.pertenenciasEquipoMercadeo.index'));
        }
        $audits = $pertenenciaEquipoMercadeo->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('admin.pertenencias_equipo_mercadeo.show')->with(['pertenenciaEquipoMercadeo'=>$pertenenciaEquipoMercadeo,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified PertenenciaEquipoMercadeo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pertenenciaEquipoMercadeo = $this->pertenenciaEquipoMercadeoRepository->find($id);

        if (empty($pertenenciaEquipoMercadeo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pertenenciasEquipoMercadeo.singular')]));

            return redirect(route('admin.pertenenciasEquipoMercadeo.index'));
        }

        return view('admin.pertenencias_equipo_mercadeo.edit')
            ->with(['pertenenciaEquipoMercadeo'=> $pertenenciaEquipoMercadeo,
            'idEquipo'=>$pertenenciaEquipoMercadeo->equipoMercadeo->id,'nombreEquipo'=>$pertenenciaEquipoMercadeo->equipoMercadeo->nombre]);
    }

    /**
     * Update the specified PertenenciaEquipoMercadeo in storage.
     *
     * @param  int              $id
     * @param UpdatePertenenciaEquipoMercadeoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePertenenciaEquipoMercadeoRequest $request)
    {
        $pertenenciaEquipoMercadeo = $this->pertenenciaEquipoMercadeoRepository->find($id);

        if (empty($pertenenciaEquipoMercadeo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pertenenciasEquipoMercadeo.singular')]));

            return redirect(route('admin.pertenenciasEquipoMercadeo.index'));
        }

        $pertenenciaEquipoMercadeo = $this->pertenenciaEquipoMercadeoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/pertenenciasEquipoMercadeo.singular')]));

        return redirect(route('admin.pertenenciasEquipoMercadeo.index',['idEquipo'=>$pertenenciaEquipoMercadeo->equipo_mercadeo_id]));
    }

    /**
     * Remove the specified PertenenciaEquipoMercadeo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pertenenciaEquipoMercadeo = $this->pertenenciaEquipoMercadeoRepository->find($id);
       
        if (empty($pertenenciaEquipoMercadeo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/pertenenciasEquipoMercadeo.singular')]));

            return redirect(route('admin.pertenenciasEquipoMercadeo.index'));
        }
        $idEquipo =$pertenenciaEquipoMercadeo->equipo_mercadeo_id;
        $this->pertenenciaEquipoMercadeoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/pertenenciasEquipoMercadeo.singular')]));

        return redirect(route('admin.pertenenciasEquipoMercadeo.index',['idEquipo'=>$idEquipo]));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->pertenenciaEquipoMercadeoRepository->infoSelect2($request->input('q', ''));
    }

}
