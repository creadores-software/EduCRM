<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\JustificacionEstadoCampaniaDataTable;
use App\Models\Campanias\EstadoCampania;
use App\Http\Requests\Campanias\CreateJustificacionEstadoCampaniaRequest;
use App\Http\Requests\Campanias\UpdateJustificacionEstadoCampaniaRequest;
use App\Repositories\Campanias\JustificacionEstadoCampaniaRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Campanias\EstadoCampania as CampaniasEstadoCampania;
use Illuminate\Http\Request;
use Response;
use Flash;

class JustificacionEstadoCampaniaController extends AppBaseController
{
    /** @var  JustificacionEstadoCampaniaRepository */
    private $justificacionEstadoCampaniaRepository;

    public function __construct(JustificacionEstadoCampaniaRepository $justificacionEstadoCampaniaRepo)
    {
        $this->justificacionEstadoCampaniaRepository = $justificacionEstadoCampaniaRepo;
        $this->middleware('permission:campanias.justificacionesEstadoCampania.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.justificacionesEstadoCampania.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:campanias.justificacionesEstadoCampania.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:campanias.justificacionesEstadoCampania.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the JustificacionEstadoCampania.
     *
     * @param JustificacionEstadoCampaniaDataTable $justificacionEstadoCampaniaDataTable
     * @return Response
     */
    public function index(JustificacionEstadoCampaniaDataTable $justificacionEstadoCampaniaDataTable)
    {
        if ($justificacionEstadoCampaniaDataTable->request()->has('idEstado')) {
            $estado = EstadoCampania::find($justificacionEstadoCampaniaDataTable->request()->get('idEstado'));
            return $justificacionEstadoCampaniaDataTable->render('campanias.justificaciones_estado_campania.index',
                ['idEstado'=>$estado->id,'nombreEstado'=>$estado->nombre]); 
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un estado seleccionado'], 500);     
        } 
    }

    /**
     * Show the form for creating a new JustificacionEstadoCampania.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if ($request->has('idEstado')) {
            $estado = EstadoCampania::find($request->get('idEstado'));
            return view('campanias.justificaciones_estado_campania.create')
            ->with(['idEstado'=>$estado->id,'nombreEstado'=>$estado->nombre]); 
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un estado seleccionado'], 500);     
        }        
    }

    /**
     * Store a newly created JustificacionEstadoCampania in storage.
     *
     * @param CreateJustificacionEstadoCampaniaRequest $request
     *
     * @return Response
     */
    public function store(CreateJustificacionEstadoCampaniaRequest $request)
    {
        $input = $request->all();

        $justificacionEstadoCampania = $this->justificacionEstadoCampaniaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/justificacionesEstadoCampania.singular')]));

        return redirect(route('campanias.justificacionesEstadoCampania.index',['idEstado'=>$justificacionEstadoCampania->estado_campania_id]));
    }

    /**
     * Display the specified JustificacionEstadoCampania.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $justificacionEstadoCampania = $this->justificacionEstadoCampaniaRepository->find($id);

        if (empty($justificacionEstadoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/justificacionesEstadoCampania.singular')]));

            return redirect(route('campanias.justificacionesEstadoCampania.index'));
        }
        $audits = $justificacionEstadoCampania->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('campanias.justificaciones_estado_campania.show')->with(['justificacionEstadoCampania'=>$justificacionEstadoCampania,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified JustificacionEstadoCampania.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $justificacionEstadoCampania = $this->justificacionEstadoCampaniaRepository->find($id);

        if (empty($justificacionEstadoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/justificacionesEstadoCampania.singular')]));

            return redirect(route('campanias.justificacionesEstadoCampania.index'));
        }

        return view('campanias.justificaciones_estado_campania.edit')
            ->with(['justificacionEstadoCampania'=>$justificacionEstadoCampania,
            'idEstado'=>$justificacionEstadoCampania->estadoCampania->id,'nombreEstado'=>$justificacionEstadoCampania->estadoCampania->nombre]);     
    }

    /**
     * Update the specified JustificacionEstadoCampania in storage.
     *
     * @param  int              $id
     * @param UpdateJustificacionEstadoCampaniaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJustificacionEstadoCampaniaRequest $request)
    {
        $justificacionEstadoCampania = $this->justificacionEstadoCampaniaRepository->find($id);

        if (empty($justificacionEstadoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/justificacionesEstadoCampania.singular')]));

            return redirect(route('campanias.justificacionesEstadoCampania.index'));
        }

        $justificacionEstadoCampania = $this->justificacionEstadoCampaniaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/justificacionesEstadoCampania.singular')]));

        return redirect(route('campanias.justificacionesEstadoCampania.index',['idEstado'=>$justificacionEstadoCampania->estado_campania_id]));
    }

    /**
     * Remove the specified JustificacionEstadoCampania from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $justificacionEstadoCampania = $this->justificacionEstadoCampaniaRepository->find($id);

        if (empty($justificacionEstadoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/justificacionesEstadoCampania.singular')]));

            return redirect(route('campanias.justificacionesEstadoCampania.index'));
        }
        $idEstado = $justificacionEstadoCampania->estado_campania_id;
        $this->justificacionEstadoCampaniaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/justificacionesEstadoCampania.singular')]));

        return redirect(route('campanias.justificacionesEstadoCampania.index',['idEstado'=>$idEstado]));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        $term=$request->input('q', ''); 
        $estado=$request->input('estado', '');
        $search=[];
        if(!empty($estado)){         
            $estadoDatos = EstadoCampania::where('id',$estado)->first();
            if(!empty($estadoDatos)){               
                $razones=[];
                foreach($estadoDatos->justificacionEstadoCampania as $razon){
                    $razones[]=$razon->id;
                }
                if(!empty($razones)){
                    $search['justificacion_estado_campania.id']=$razones; 
                }
            } 
        }
        return $this->justificacionEstadoCampaniaRepository->infoSelect2($term,$search);
    }

}
