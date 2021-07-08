<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\SegmentoDataTable;
use App\Http\Requests\Contactos\CreateSegmentoRequest;
use App\Http\Requests\Contactos\UpdateSegmentoRequest;
use App\Repositories\Contactos\SegmentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;
use Auth;

class SegmentoController extends AppBaseController
{
    /** @var  SegmentoRepository */
    private $segmentoRepository;

    public function __construct(SegmentoRepository $segmentoRepo)
    {
        $this->segmentoRepository = $segmentoRepo;
        $this->middleware('permission:contactos.segmentos.consultar', ['only' => ['index','show','dataAjax','filtros']]);
        $this->middleware('permission:contactos.segmentos.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:contactos.segmentos.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:contactos.segmentos.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Segmento.
     *
     * @param SegmentoDataTable $segmentoDataTable
     * @return Response
     */
    public function index(SegmentoDataTable $segmentoDataTable)
    {
        return $segmentoDataTable->render('contactos.segmentos.index');
    }

    /**
     * Show the form for creating a new Segmento.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactos.segmentos.create');
    }

     /**
     * Duplicar un segmento trayendo los filtros del segmento con el id dado
     *
     * @return Response
     */
    public function duplicar(Request $request)
    {
        $id=$request->input('id', '');
        return view('contactos.segmentos.create')->with('id',$id);
    }

    private function procesarRequest($request){
        $input = $request->all();        
        $filtro_texto=$request->input('filtros_texto','');
        if(!empty($filtro_texto)){
            $input['filtros']=[]; 
            $filtros=explode(';',$filtro_texto);            
            foreach($filtros as $filtro){
                $valores=explode(':',$filtro);
                if(count($valores)==2){
                    $input['filtros'][]=['campo'=>$valores[0],'valor'=>$valores[1]];  
                }
            }
        }
        return $input;
    }

    /**
     * Store a newly created Segmento in storage.
     *
     * @param CreateSegmentoRequest $request
     *
     * @return Response
     */
    public function store(CreateSegmentoRequest $request)
    {
        $input=$this->procesarRequest($request);
        $input['usuario_id'] = Auth::user()->id;
        
        $segmento = $this->segmentoRepository->create($input);
        $mensaje=__('messages.saved', ['model' => __('models/segmentos.singular')]);

        if ($request->ajax()) {
            return response()->json([
                'id'      => $segmento->id,
                'message' => $mensaje
            ]);
        }

        Flash::success($mensaje);

        return redirect(route('contactos.segmentos.index'));
    }

    /**
     * Display the specified Segmento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $segmento = $this->segmentoRepository->find($id);

        if (empty($segmento)) {
            Flash::error(__('models/segmentos.singular').' '.__('messages.not_found'));

            return redirect(route('contactos.segmentos.index'));
        }

        $audits = $segmento->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('contactos.segmentos.show')->with(['segmento'=> $segmento, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Segmento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $segmento = $this->segmentoRepository->find($id);

        if (empty($segmento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/segmentos.singular')]));

            return redirect(route('contactos.segmentos.index'));
        }

        return view('contactos.segmentos.edit')->with('segmento', $segmento);
    }    

    /**
     * Update the specified Segmento in storage.
     *
     * @param  int              $id
     * @param UpdateSegmentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSegmentoRequest $request)
    {
        $segmento = $this->segmentoRepository->find($id);

        if (empty($segmento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/segmentos.singular')]));

            return redirect(route('contactos.segmentos.index'));
        }
        $input=$this->procesarRequest($request);
        $segmento = $this->segmentoRepository->update($input, $id);

        Flash::success(__('messages.updated', ['model' => __('models/segmentos.singular')]));

        return redirect(route('contactos.segmentos.index'));
    }

    /**
     * Remove the specified Segmento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $segmento = $this->segmentoRepository->find($id);

        if (empty($segmento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/segmentos.singular')]));

            return redirect(route('contactos.segmentos.index'));
        }

        $this->segmentoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/segmentos.singular')]));

        return redirect(route('contactos.segmentos.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        $search=null;
        $term=$request->input('q', '');
        $conNuevo=$request->input('conNuevo', '');
        $search=['usuario_id'=>Auth::user()->id]; 
        $orSearch=['global'=>1];  
        $resultado=$this->segmentoRepository->infoSelect2($term,$search, null, $orSearch);
        if($conNuevo){
            $resultado['results']->prepend(['id'=>'nuevo','text'=>' [ Nuevo ] ']);
        }        
        return $resultado;
    }

    /**
     * Obtiene la lista de filtros
     */
    public function filtros(Request $request)
    {
        $resultado=[];
        $id=$request->input('id', '');
        if(!empty($id)){
            $resultado=$this->segmentoRepository->find($id, ['filtros']);
            if(!empty($resultado)){
                $resultado=$resultado['filtros'];   
            }
        }
        return  $resultado;
    }
}
