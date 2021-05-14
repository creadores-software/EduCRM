<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\EstadoCampaniaDataTable;
use App\Models\Campanias\TipoEstadoColor;
use App\Models\Campanias\Campania;
use App\Models\Campanias\Oportunidad;
use App\Http\Requests\Campanias\CreateEstadoCampaniaRequest;
use App\Http\Requests\Campanias\UpdateEstadoCampaniaRequest;
use App\Repositories\Campanias\EstadoCampaniaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class EstadoCampaniaController extends AppBaseController
{
    /** @var  EstadoCampaniaRepository */
    private $estadoCampaniaRepository;

    public function __construct(EstadoCampaniaRepository $estadoCampaniaRepo)
    {
        $this->estadoCampaniaRepository = $estadoCampaniaRepo;
        $this->middleware('permission:campanias.estadosCampania.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.estadosCampania.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:campanias.estadosCampania.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:campanias.estadosCampania.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the EstadoCampania.
     *
     * @param EstadoCampaniaDataTable $estadoCampaniaDataTable
     * @return Response
     */
    public function index(EstadoCampaniaDataTable $estadoCampaniaDataTable)
    {
        return $estadoCampaniaDataTable->render('campanias.estados_campania.index');
    }

    /**
     * Show the form for creating a new EstadoCampania.
     *
     * @return Response
     */
    public function create()
    {
        $colores = TipoEstadoColor::arrayColores();
        return view('campanias.estados_campania.create')
        ->with(['colores'=>$colores]);
    }

    /**
     * Store a newly created EstadoCampania in storage.
     *
     * @param CreateEstadoCampaniaRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoCampaniaRequest $request)
    {
        $input = $request->all();

        $estadoCampania = $this->estadoCampaniaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/estadosCampania.singular')]));

        return redirect(route('campanias.estadosCampania.index'));
    }

    /**
     * Display the specified EstadoCampania.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoCampania = $this->estadoCampaniaRepository->find($id);

        if (empty($estadoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estadosCampania.singular')]));

            return redirect(route('campanias.estadosCampania.index'));
        }
        $audits = $estadoCampania->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('campanias.estados_campania.show')->with(['estadoCampania'=>$estadoCampania,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified EstadoCampania.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $colores = TipoEstadoColor::arrayColores();
        $estadoCampania = $this->estadoCampaniaRepository->find($id);

        if (empty($estadoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estadosCampania.singular')]));

            return redirect(route('campanias.estadosCampania.index'));
        }

        return view('campanias.estados_campania.edit')
        ->with(['estadoCampania'=> $estadoCampania,'colores'=>$colores]);
    }

    /**
     * Update the specified EstadoCampania in storage.
     *
     * @param  int              $id
     * @param UpdateEstadoCampaniaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoCampaniaRequest $request)
    {
        $estadoCampania = $this->estadoCampaniaRepository->find($id);

        if (empty($estadoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estadosCampania.singular')]));

            return redirect(route('campanias.estadosCampania.index'));
        }

        $estadoCampania = $this->estadoCampaniaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/estadosCampania.singular')]));

        return redirect(route('campanias.estadosCampania.index'));
    }

    /**
     * Remove the specified EstadoCampania from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoCampania = $this->estadoCampaniaRepository->find($id);

        if (empty($estadoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estadosCampania.singular')]));

            return redirect(route('campanias.estadosCampania.index'));
        }

        $this->estadoCampaniaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/estadosCampania.singular')]));

        return redirect(route('campanias.estadosCampania.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        $term=$request->input('q', ''); 
        $campania=$request->input('campania', '');
        $oportunidad=$request->input('oportunidad', '');
        $search=[];
        if(!empty($oportunidad)){        
            $datosOportunidad=Oportunidad::where('id',$oportunidad)->first();
            if(!empty($datosOportunidad)){
                $campania=$datosOportunidad->campania_id; 
            }
        }
        if(!empty($campania)){         
            $datosCampania = Campania::where('id',$campania)->first();
            if(!empty($datosCampania)){               
                $estados=[];
                
                foreach($datosCampania->tipoCampania->tipoCampaniaEstados as $estado){
                    $estados[]=$estado->estadoCampania->id;
                }
                if(!empty($estados)){
                    $search['estado_campania.id']=$estados; 
                }else{
                    //No aplica ninguno
                    $search['estado_campania.id']='n';
                }
            } 
        }
        return $this->estadoCampaniaRepository->infoSelect2($term,$search);
    }

}
