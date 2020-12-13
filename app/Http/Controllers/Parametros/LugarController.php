<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\LugarDataTable;
use App\Http\Requests\Parametros\CreateLugarRequest;
use App\Http\Requests\Parametros\UpdateLugarRequest;
use App\Repositories\Parametros\LugarRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class LugarController extends AppBaseController
{
    /** @var  LugarRepository */
    private $lugarRepository;

    public function __construct(LugarRepository $lugarRepo)
    {
        $this->lugarRepository = $lugarRepo;
    }

    /**
     * Display a listing of the Lugar.
     *
     * @param LugarDataTable $lugarDataTable
     * @return Response
     */
    public function index(LugarDataTable $lugarDataTable)
    {
        return $lugarDataTable->render('parametros.lugares.index');
    }

    /**
     * Show the form for creating a new Lugar.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.lugares.create');
    }

    /**
     * Store a newly created Lugar in storage.
     *
     * @param CreateLugarRequest $request
     *
     * @return Response
     */
    public function store(CreateLugarRequest $request)
    {
        $input = $request->all();

        $lugar = $this->lugarRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/lugares.singular')]));

        return redirect(route('parametros.lugares.index'));
    }

    /**
     * Display the specified Lugar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lugar = $this->lugarRepository->find($id);

        if (empty($lugar)) {
            Flash::error(__('models/lugares.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.lugares.index'));
        }

        $audits = $lugar->ledgers()->with('user')->get();

        return view('parametros.lugares.show')->with(['lugar'=> $lugar, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Lugar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lugar = $this->lugarRepository->find($id);

        if (empty($lugar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/lugares.singular')]));

            return redirect(route('parametros.lugares.index'));
        }

        return view('parametros.lugares.edit')->with('lugar', $lugar);
    }

    /**
     * Update the specified Lugar in storage.
     *
     * @param  int              $id
     * @param UpdateLugarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLugarRequest $request)
    {
        $lugar = $this->lugarRepository->find($id);

        if (empty($lugar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/lugares.singular')]));

            return redirect(route('parametros.lugares.index'));
        }

        $lugar = $this->lugarRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/lugares.singular')]));

        return redirect(route('parametros.lugares.index'));
    }

    /**
     * Remove the specified Lugar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lugar = $this->lugarRepository->find($id);

        if (empty($lugar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/lugares.singular')]));

            return redirect(route('parametros.lugares.index'));
        }

        $this->lugarRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/lugares.singular')]));

        return redirect(route('parametros.lugares.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    { 
        $search=null;
        $tipo=$request->input('tipo', '');
        $term=$request->input('q', '');
        $padre=$request->input('padre_id', '');
        //Si el tipo de lugar a crear no está vacio y es diferente a pais
        if(!empty($tipo)){
            $busqueda='';            
            if($tipo=='D'){
                //Si el tipo es departamento debe mostrar solo Colombia
                $busqueda='P';  
                $term='Colombia';  
            }else if($tipo=='C'){
                //Si el tipo es ciudad debe mostrar solo Departamentos
                $busqueda='D';   
            }else if($tipo=='P'){
                //Los paises no deben tener padre
                $term='noexiste';  
            }
            $search=['tipo'=>$busqueda];     
        }else if(empty($padre)){
            //Por defecto trae pais primero
            $search=['tipo'=>'P'];    
        }
        
        if(!empty($padre)){
            $search=['padre_id'=>$padre];      
        }
        return $this->lugarRepository->infoSelect2($term,$search);
    }

    /**
     * Obtiene la cantidad de lugares que tienen como padre 
     * el id seleccionado
     */
    public function childrenCount(Request $request)
    { 
        $padre=$request->input('padre_id');
        $cantidad=0;
        //Si el padre no está vacío
        if(!empty($padre)){
            $cantidad=$this->lugarRepository->count(['padre_id'=>$padre]);
        }
        return $cantidad;
    }

    /**
     * Obtiene todos los padres hacia arriba del lugar seleccionado
     */
    public function parents(Request $request) {
        $id=$request->input('id');
        $lugar=$this->lugarRepository->find($id);       
        $padres = array();
        $padre = $lugar;
        while ($padre != null && $padre->padre_id!=null) {
            $padre = $padre->lugarPadre;
            if($padre!=null){
                $padres[] = array('id' => $padre->id, 'label' => $padre->nombre);
            }         
        }
        return $padres;
    }

}
