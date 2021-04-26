<?php

namespace App\Http\Controllers\Formaciones;

use App\DataTables\Formaciones\PeriodoAcademicoDataTable;
use App\Http\Requests\Formaciones\CreatePeriodoAcademicoRequest;
use App\Http\Requests\Formaciones\UpdatePeriodoAcademicoRequest;
use App\Repositories\Formaciones\PeriodoAcademicoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class PeriodoAcademicoController extends AppBaseController
{
    /** @var  PeriodoAcademicoRepository */
    private $periodoAcademicoRepository;

    public function __construct(PeriodoAcademicoRepository $periodoAcademicoRepo)
    {
        $this->periodoAcademicoRepository = $periodoAcademicoRepo;
        $this->middleware('permission:formaciones.periodosAcademico.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:formaciones.periodosAcademico.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:formaciones.periodosAcademico.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:formaciones.periodosAcademico.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the PeriodoAcademico.
     *
     * @param PeriodoAcademicoDataTable $periodoAcademicoDataTable
     * @return Response
     */
    public function index(PeriodoAcademicoDataTable $periodoAcademicoDataTable)
    {
        return $periodoAcademicoDataTable->render('formaciones.periodos_academico.index');
    }

    /**
     * Show the form for creating a new PeriodoAcademico.
     *
     * @return Response
     */
    public function create()
    {
        return view('formaciones.periodos_academico.create');
    }

    /**
     * Store a newly created PeriodoAcademico in storage.
     *
     * @param CreatePeriodoAcademicoRequest $request
     *
     * @return Response
     */
    public function store(CreatePeriodoAcademicoRequest $request)
    {
        $input = $request->all();

        $periodoAcademico = $this->periodoAcademicoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/periodosAcademico.singular')]));

        return redirect(route('formaciones.periodosAcademico.index'));
    }

    /**
     * Display the specified PeriodoAcademico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $periodoAcademico = $this->periodoAcademicoRepository->find($id);

        if (empty($periodoAcademico)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodosAcademico.singular')]));

            return redirect(route('formaciones.periodosAcademico.index'));
        }
        $audits = $periodoAcademico->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('formaciones.periodos_academico.show')->with(['periodoAcademico'=>$periodoAcademico,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified PeriodoAcademico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $periodoAcademico = $this->periodoAcademicoRepository->find($id);

        if (empty($periodoAcademico)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodosAcademico.singular')]));

            return redirect(route('formaciones.periodosAcademico.index'));
        }

        return view('formaciones.periodos_academico.edit')->with('periodoAcademico', $periodoAcademico);
    }

    /**
     * Update the specified PeriodoAcademico in storage.
     *
     * @param  int              $id
     * @param UpdatePeriodoAcademicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeriodoAcademicoRequest $request)
    {
        $periodoAcademico = $this->periodoAcademicoRepository->find($id);

        if (empty($periodoAcademico)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodosAcademico.singular')]));

            return redirect(route('formaciones.periodosAcademico.index'));
        }

        $periodoAcademico = $this->periodoAcademicoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/periodosAcademico.singular')]));

        return redirect(route('formaciones.periodosAcademico.index'));
    }

    /**
     * Remove the specified PeriodoAcademico from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $periodoAcademico = $this->periodoAcademicoRepository->find($id);

        if (empty($periodoAcademico)) {
            Flash::error(__('messages.not_found', ['model' => __('models/periodosAcademico.singular')]));

            return redirect(route('formaciones.periodosAcademico.index'));
        }

        $this->periodoAcademicoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/periodosAcademico.singular')]));

        return redirect(route('formaciones.periodosAcademico.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->periodoAcademicoRepository->infoSelect2($request->input('q', ''));
    }

}
