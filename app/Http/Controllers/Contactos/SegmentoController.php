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
     * Store a newly created Segmento in storage.
     *
     * @param CreateSegmentoRequest $request
     *
     * @return Response
     */
    public function store(CreateSegmentoRequest $request)
    {
        $input = $request->all();
        $input['usuario_id'] = Auth::user()->id;

        $segmento = $this->segmentoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/segmentos.singular')]));

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

        return view('contactos.segmentos.show')->with('segmento', $segmento);
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

        $segmento = $this->segmentoRepository->update($request->all(), $id);

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
