<?php

namespace App\Http\Controllers\Formaciones;

use App\DataTables\Formaciones\NivelAcademicoDataTable;
use App\Http\Requests\Formaciones\CreateNivelAcademicoRequest;
use App\Http\Requests\Formaciones\UpdateNivelAcademicoRequest;
use App\Repositories\Formaciones\NivelAcademicoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class NivelAcademicoController extends AppBaseController
{
    /** @var  NivelAcademicoRepository */
    private $nivelAcademicoRepository;

    public function __construct(NivelAcademicoRepository $nivelAcademicoRepo)
    {
        $this->nivelAcademicoRepository = $nivelAcademicoRepo;
        $this->middleware('permission:formaciones.nivelesAcademicos.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:formaciones.nivelesAcademicos.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:formaciones.nivelesAcademicos.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:formaciones.nivelesAcademicos.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the NivelAcademico.
     *
     * @param NivelAcademicoDataTable $nivelAcademicoDataTable
     * @return Response
     */
    public function index(NivelAcademicoDataTable $nivelAcademicoDataTable)
    {
        return $nivelAcademicoDataTable->render('formaciones.niveles_academicos.index');
    }

    /**
     * Show the form for creating a new NivelAcademico.
     *
     * @return Response
     */
    public function create()
    {
        return view('formaciones.niveles_academicos.create');
    }

    /**
     * Store a newly created NivelAcademico in storage.
     *
     * @param CreateNivelAcademicoRequest $request
     *
     * @return Response
     */
    public function store(CreateNivelAcademicoRequest $request)
    {
        $input = $request->all();

        $nivelAcademico = $this->nivelAcademicoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/nivelesAcademicos.singular')]));

        return redirect(route('formaciones.nivelesAcademicos.index'));
    }

    /**
     * Display the specified NivelAcademico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nivelAcademico = $this->nivelAcademicoRepository->find($id);

        if (empty($nivelAcademico)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nivelesAcademicos.singular')]));

            return redirect(route('formaciones.nivelesAcademicos.index'));
        }
        $audits = $nivelAcademico->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('formaciones.niveles_academicos.show')->with(['nivelAcademico'=>$nivelAcademico, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified NivelAcademico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nivelAcademico = $this->nivelAcademicoRepository->find($id);

        if (empty($nivelAcademico)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nivelesAcademicos.singular')]));

            return redirect(route('formaciones.nivelesAcademicos.index'));
        }

        return view('formaciones.niveles_academicos.edit')->with('nivelAcademico', $nivelAcademico);
    }

    /**
     * Update the specified NivelAcademico in storage.
     *
     * @param  int              $id
     * @param UpdateNivelAcademicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNivelAcademicoRequest $request)
    {
        $nivelAcademico = $this->nivelAcademicoRepository->find($id);

        if (empty($nivelAcademico)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nivelesAcademicos.singular')]));

            return redirect(route('formaciones.nivelesAcademicos.index'));
        }

        $nivelAcademico = $this->nivelAcademicoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/nivelesAcademicos.singular')]));

        return redirect(route('formaciones.nivelesAcademicos.index'));
    }

    /**
     * Remove the specified NivelAcademico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nivelAcademico = $this->nivelAcademicoRepository->find($id);

        if (empty($nivelAcademico)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nivelesAcademicos.singular')]));

            return redirect(route('formaciones.nivelesAcademicos.index'));
        }

        $this->nivelAcademicoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/nivelesAcademicos.singular')]));

        return redirect(route('formaciones.nivelesAcademicos.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        $es_ies=$request->input('es_ies');
        $term=$request->input('q', '');
        if($es_ies!=null){
            $search=['es_ies'=>$es_ies];  
        }
        return $this->nivelAcademicoRepository->infoSelect2($term,$search);
    }
}
