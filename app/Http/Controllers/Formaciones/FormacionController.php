<?php

namespace App\Http\Controllers\Formaciones;

use App\DataTables\Formaciones\FormacionDataTable;
use App\Models\Entidades\Entidad;
use App\Http\Requests\Formaciones\CreateFormacionRequest;
use App\Http\Requests\Formaciones\UpdateFormacionRequest;
use App\Repositories\Formaciones\FormacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class FormacionController extends AppBaseController
{
    /** @var  FormacionRepository */
    private $formacionRepository;

    public function __construct(FormacionRepository $formacionRepo)
    {
        $this->formacionRepository = $formacionRepo;
        $this->middleware('permission:formaciones.formaciones.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:formaciones.formaciones.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:formaciones.formaciones.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:formaciones.formaciones.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Formacion.
     *
     * @param FormacionDataTable $formacionDataTable
     * @return Response
     */
    public function index(FormacionDataTable $formacionDataTable)
    {
        return $formacionDataTable->render('formaciones.formaciones.index');
    }

    /**
     * Show the form for creating a new Formacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('formaciones.formaciones.create');
    }

    /**
     * Store a newly created Formacion in storage.
     *
     * @param CreateFormacionRequest $request
     *
     * @return Response
     */
    public function store(CreateFormacionRequest $request)
    {
        $input = $request->all();

        $formacion = $this->formacionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/formaciones.singular')]));

        return redirect(route('formaciones.formaciones.index'));
    }

    /**
     * Display the specified Formacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $formacion = $this->formacionRepository->find($id);

        if (empty($formacion)) {
            Flash::error(__('models/formaciones.singular').' '.__('messages.not_found'));

            return redirect(route('formaciones.formaciones.index'));
        }

        $audits = $formacion->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('formaciones.formaciones.show')->with(['formacion'=> $formacion, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Formacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $formacion = $this->formacionRepository->find($id);

        if (empty($formacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/formaciones.singular')]));

            return redirect(route('formaciones.formaciones.index'));
        }

        return view('formaciones.formaciones.edit')->with('formacion', $formacion);
    }

    /**
     * Update the specified Formacion in storage.
     *
     * @param  int              $id
     * @param UpdateFormacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormacionRequest $request)
    {
        $formacion = $this->formacionRepository->find($id);

        if (empty($formacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/formaciones.singular')]));

            return redirect(route('formaciones.formaciones.index'));
        }

        $formacion = $this->formacionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/formaciones.singular')]));

        return redirect(route('formaciones.formaciones.index'));
    }

    /**
     * Remove the specified Formacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $formacion = $this->formacionRepository->find($id);

        if (empty($formacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/formaciones.singular')]));

            return redirect(route('formaciones.formaciones.index'));
        }

        $this->formacionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/formaciones.singular')]));

        return redirect(route('formaciones.formaciones.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        $search=[];
        $entidad=$request->input('entidad', '');
        $activa=$request->input('activa', '');
        $nivelFormacion=$request->input('nivelFormacion', '');
        $nivelAcademico=$request->input('nivelAcademico', '');
        $facultad=$request->input('facultad', '');
        $term=$request->input('q', ''); 
        $page=$request->input('page', ''); 
        if(!empty($entidad)){         
            if($entidad=='miu'){
                $miu = Entidad::where('mi_universidad',1)->first();
                $entidad = $miu->id;
            }  
            $search=['entidad_id'=>$entidad];    
            if(!empty($activa)){   
                $search['activo']=$activa;        
            }
            if(!empty($nivelFormacion)){   
                $search['nivel_formacion_id']=$nivelFormacion;        
            } 
            if(!empty($nivelAcademico)){   
                $search['nivel_academico_id']=$nivelAcademico;        
            } 
            if(!empty($facultad)){   
                $search['facultad_id']=$facultad;        
            } 
        }
        $join=[
            ['jornada','jornada.id','=','formacion.jornada_id'],
            ['modalidad','modalidad.id','=','formacion.modalidad_id'],
            ['nivel_formacion','nivel_formacion.id','=','formacion.nivel_formacion_id'],
            ['nivel_academico','nivel_academico.id','=','nivel_formacion.nivel_academico_id'],
            ['facultad','facultad.id','=','formacion.facultad_id']
        ];
        $name="CONCAT(formacion.nombre, COALESCE(concat(' / ',modalidad.nombre),''),COALESCE(concat(' / ',jornada.nombre),''))";
        return $this->formacionRepository->infoSelect2($term,$search,$join,null,null,$name,$page);
    }
}
