<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\EstadoInteraccionDataTable;
use App\Models\Campanias\TipoEstadoColor;
use App\Models\Campanias\TipoInteraccion;
use App\Http\Requests\Campanias\CreateEstadoInteraccionRequest;
use App\Http\Requests\Campanias\UpdateEstadoInteraccionRequest;
use App\Repositories\Campanias\EstadoInteraccionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class EstadoInteraccionController extends AppBaseController
{
    /** @var  EstadoInteraccionRepository */
    private $estadoInteraccionRepository;

    public function __construct(EstadoInteraccionRepository $estadoInteraccionRepo)
    {
        $this->estadoInteraccionRepository = $estadoInteraccionRepo;
        $this->middleware('permission:campanias.estadosInteraccion.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.estadosInteraccion.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:campanias.estadosInteraccion.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:campanias.estadosInteraccion.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the EstadoInteraccion.
     *
     * @param EstadoInteraccionDataTable $estadoInteraccionDataTable
     * @return Response
     */
    public function index(EstadoInteraccionDataTable $estadoInteraccionDataTable)
    {
        return $estadoInteraccionDataTable->render('campanias.estados_interaccion.index');
    }

    /**
     * Show the form for creating a new EstadoInteraccion.
     *
     * @return Response
     */
    public function create()
    {
        $colores = TipoEstadoColor::arrayColores();
        return view('campanias.estados_interaccion.create')
        ->with(['colores'=>$colores]);
    }

    /**
     * Store a newly created EstadoInteraccion in storage.
     *
     * @param CreateEstadoInteraccionRequest $request
     *
     * @return Response
     */
    public function store(CreateEstadoInteraccionRequest $request)
    {
        $input = $request->all();

        $estadoInteraccion = $this->estadoInteraccionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/estadosInteraccion.singular')]));

        return redirect(route('campanias.estadosInteraccion.index'));
    }

    /**
     * Display the specified EstadoInteraccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estadoInteraccion = $this->estadoInteraccionRepository->find($id);

        if (empty($estadoInteraccion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estadosInteraccion.singular')]));

            return redirect(route('campanias.estadosInteraccion.index'));
        }
        $audits = $estadoInteraccion->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('campanias.estados_interaccion.show')->with(['estadoInteraccion'=>$estadoInteraccion,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified EstadoInteraccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estadoInteraccion = $this->estadoInteraccionRepository->find($id);
        $colores = TipoEstadoColor::arrayColores();
        if (empty($estadoInteraccion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estadosInteraccion.singular')]));

            return redirect(route('campanias.estadosInteraccion.index'));
        }

        return view('campanias.estados_interaccion.edit')
            ->with(['estadoInteraccion'=>$estadoInteraccion,'colores'=>$colores]);
    }

    /**
     * Update the specified EstadoInteraccion in storage.
     *
     * @param  int              $id
     * @param UpdateEstadoInteraccionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstadoInteraccionRequest $request)
    {
        $estadoInteraccion = $this->estadoInteraccionRepository->find($id);

        if (empty($estadoInteraccion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estadosInteraccion.singular')]));

            return redirect(route('campanias.estadosInteraccion.index'));
        }

        $estadoInteraccion = $this->estadoInteraccionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/estadosInteraccion.singular')]));

        return redirect(route('campanias.estadosInteraccion.index'));
    }

    /**
     * Remove the specified EstadoInteraccion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estadoInteraccion = $this->estadoInteraccionRepository->find($id);

        if (empty($estadoInteraccion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estadosInteraccion.singular')]));

            return redirect(route('campanias.estadosInteraccion.index'));
        }

        $this->estadoInteraccionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/estadosInteraccion.singular')]));

        return redirect(route('campanias.estadosInteraccion.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        $term=$request->input('q', ''); 
        $tipo=$request->input('tipo', '');
        $search=[];
        if(!empty($tipo)){         
            $tipoDatos = TipoInteraccion::where('id',$tipo)->first();
            if(!empty($tipoDatos)){               
                $estados=[];
                foreach($tipoDatos->tipoInteraccionEstados as $estado){
                    $estados[]=$estado->id;
                }
                if(!empty($estados)){
                    $search['estado_interaccion.id']=$estados; 
                }
            } 
        }
        return $this->estadoInteraccionRepository->infoSelect2($term,$search,null,null,['estado_interaccion.tipo_estado_color_id','ASC']);
    }

}
