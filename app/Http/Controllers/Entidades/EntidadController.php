<?php

namespace App\Http\Controllers\Entidades;

use App\DataTables\Entidades\EntidadDataTable;
use App\Models\Entidades\Entidad;
use App\Http\Requests\Entidades\CreateEntidadRequest;
use App\Http\Requests\Entidades\UpdateEntidadRequest;
use App\Repositories\Entidades\EntidadRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Entidades\ActividadEconomica;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Response;
use Flash;

class EntidadController extends AppBaseController
{
    /** @var  EntidadRepository */
    private $entidadRepository;

    public function __construct(EntidadRepository $entidadRepo)
    {
        $this->entidadRepository = $entidadRepo;
        $this->middleware('permission:entidades.entidades.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:entidades.entidades.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:entidades.entidades.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:entidades.entidades.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Entidad.
     *
     * @param EntidadDataTable $entidadDataTable
     * @return Response
     */
    public function index(EntidadDataTable $entidadDataTable)
    {
        return $entidadDataTable->render('entidades.entidades.index');
    }

    /**
     * Show the form for creating a new Entidad.
     *
     * @return Response
     */
    public function create()
    {
        $actividadesColegio = ActividadEconomica::where('es_colegio',1)->pluck('id')->toArray();
        $actividadesIES = ActividadEconomica::where('es_ies',1)->pluck('id')->toArray();
        return view('entidades.entidades.create')->with(['actividadesColegio'=> $actividadesColegio, 'actividadesIES'=>$actividadesIES]);
    }

    /**
     * Store a newly created Entidad in storage.
     *
     * @param CreateEntidadRequest $request
     *
     * @return Response
     */
    public function store(CreateEntidadRequest $request)
    {
        $input = $request->all();

        $entidad = $this->entidadRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/entidades.singular')]));

        return redirect(route('entidades.entidades.index'));
    }

    /**
     * Display the specified Entidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $entidad = $this->entidadRepository->find($id);

        if (empty($entidad)) {
            Flash::error(__('models/entidades.singular').' '.__('messages.not_found'));

            return redirect(route('entidades.entidades.index'));
        }

        $audits = $entidad->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('entidades.entidades.show')->with(['entidad'=> $entidad, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Entidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $entidad = $this->entidadRepository->find($id);
        $actividadesColegio = ActividadEconomica::where('es_colegio',1)->pluck('id')->toArray();
        $actividadesIES = ActividadEconomica::where('es_ies',1)->pluck('id')->toArray();

        if (empty($entidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entidades.singular')]));

            return redirect(route('entidades.entidades.index'));
        }

        return view('entidades.entidades.edit')->with(['entidad'=>$entidad,'actividadesColegio'=> $actividadesColegio, 'actividadesIES'=>$actividadesIES]);
    }

    /**
     * Update the specified Entidad in storage.
     *
     * @param  int              $id
     * @param UpdateEntidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEntidadRequest $request)
    {
        $entidad = $this->entidadRepository->find($id);

        if (empty($entidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entidades.singular')]));

            return redirect(route('entidades.entidades.index'));
        }

        $entidad = $this->entidadRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/entidades.singular')]));

        return redirect(route('entidades.entidades.index'));
    }

    /**
     * Remove the specified Entidad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $entidad = $this->entidadRepository->find($id);

        if (empty($entidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entidades.singular')]));

            return redirect(route('entidades.entidades.index'));
        }

        $this->entidadRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/entidades.singular')]));

        return redirect(route('entidades.entidades.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        $term=$request->input('q', '');
        $es_ies=$request->input('es_ies');
        $es_colegio=$request->input('es_colegio');
        $page=$request->input('page', ''); 
        $join=[
            ['actividad_economica','entidad.actividad_economica_id','=','actividad_economica.id'],
            ['lugar','entidad.lugar_id','=','lugar.id'],
        ];
        $search=null;
        if($es_ies!=null){
            $search=['actividad_economica.es_ies'=>$es_ies]; 
        }else if($es_colegio!=null){
            $search=['actividad_economica.es_colegio'=>$es_colegio];  
        }
        $name="CONCAT(entidad.nombre, ' (', lugar.nombre, ')')";
        return $this->entidadRepository->infoSelect2($term,$search,$join,null,null,$name,$page);
    }
}
