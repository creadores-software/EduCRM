<?php

namespace App\Http\Controllers\Formaciones;

use App\DataTables\Formaciones\NivelFormacionDataTable;
use App\Http\Requests\Formaciones\CreateNivelFormacionRequest;
use App\Http\Requests\Formaciones\UpdateNivelFormacionRequest;
use App\Repositories\Formaciones\NivelFormacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class NivelFormacionController extends AppBaseController
{
    /** @var  NivelFormacionRepository */
    private $nivelFormacionRepository;

    public function __construct(NivelFormacionRepository $nivelFormacionRepo)
    {
        $this->nivelFormacionRepository = $nivelFormacionRepo;
        $this->middleware('permission:formaciones.nivelesFormacion.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:formaciones.nivelesFormacion.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:formaciones.nivelesFormacion.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:formaciones.nivelesFormacion.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the NivelFormacion.
     *
     * @param NivelFormacionDataTable $nivelFormacionDataTable
     * @return Response
     */
    public function index(NivelFormacionDataTable $nivelFormacionDataTable)
    {
        return $nivelFormacionDataTable->render('formaciones.niveles_formacion.index');
    }

    /**
     * Show the form for creating a new NivelFormacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('formaciones.niveles_formacion.create');
    }

    /**
     * Store a newly created NivelFormacion in storage.
     *
     * @param CreateNivelFormacionRequest $request
     *
     * @return Response
     */
    public function store(CreateNivelFormacionRequest $request)
    {
        $input = $request->all();

        $nivelFormacion = $this->nivelFormacionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/nivelesFormacion.singular')]));

        return redirect(route('formaciones.nivelesFormacion.index'));
    }

    /**
     * Display the specified NivelFormacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nivelFormacion = $this->nivelFormacionRepository->find($id);

        if (empty($nivelFormacion)) {
            Flash::error(__('models/nivelesFormacion.singular').' '.__('messages.not_found'));

            return redirect(route('formaciones.nivelesFormacion.index'));
        }

        $audits = $nivelFormacion->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('formaciones.niveles_formacion.show')->with(['nivelFormacion'=> $nivelFormacion, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified NivelFormacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nivelFormacion = $this->nivelFormacionRepository->find($id);

        if (empty($nivelFormacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nivelesFormacion.singular')]));

            return redirect(route('formaciones.nivelesFormacion.index'));
        }

        return view('formaciones.niveles_formacion.edit')->with('nivelFormacion', $nivelFormacion);
    }

    /**
     * Update the specified NivelFormacion in storage.
     *
     * @param  int              $id
     * @param UpdateNivelFormacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNivelFormacionRequest $request)
    {
        $nivelFormacion = $this->nivelFormacionRepository->find($id);

        if (empty($nivelFormacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nivelesFormacion.singular')]));

            return redirect(route('formaciones.nivelesFormacion.index'));
        }

        $nivelFormacion = $this->nivelFormacionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/nivelesFormacion.singular')]));

        return redirect(route('formaciones.nivelesFormacion.index'));
    }

    /**
     * Remove the specified NivelFormacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nivelFormacion = $this->nivelFormacionRepository->find($id);

        if (empty($nivelFormacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nivelesFormacion.singular')]));

            return redirect(route('formaciones.nivelesFormacion.index'));
        }

        $this->nivelFormacionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/nivelesFormacion.singular')]));

        return redirect(route('formaciones.nivelesFormacion.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        $search=null;
        $es_ies=$request->input('es_ies');
        $nivelAcademico=$request->input('nivelAcademico');
        $nivelAcademicoExcluir=$request->input('nivelAcademicoExcluir');
        $term=$request->input('q', '');
        $join=['nivel_academico','nivel_formacion.nivel_academico_id','=','nivel_academico.id'];
        $customWhere=[];
        if($es_ies!=null){
            $search['nivel_academico.es_ies']=$es_ies;  
        }
        if($nivelAcademico!=null){    
            $search['nivel_academico_id']=$nivelAcademico;
        }
        if($nivelAcademicoExcluir!=null){    
            $customWhere=['nivel_academico_id <> :excluir',['excluir'=>$nivelAcademicoExcluir]];
        }
        return $this->nivelFormacionRepository->infoSelect2($term,$search, $join,null,null,null,null,$customWhere);
    }
}
