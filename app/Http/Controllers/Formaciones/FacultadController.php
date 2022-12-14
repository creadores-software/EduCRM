<?php

namespace App\Http\Controllers\Formaciones;

use App\DataTables\Formaciones\FacultadDataTable;
use App\Http\Requests\Formaciones\CreateFacultadRequest;
use App\Http\Requests\Formaciones\UpdateFacultadRequest;
use App\Repositories\Formaciones\FacultadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class FacultadController extends AppBaseController
{
    /** @var  FacultadRepository */
    private $facultadRepository;

    public function __construct(FacultadRepository $facultadRepo)
    {
        $this->facultadRepository = $facultadRepo;
        $this->middleware('permission:formaciones.facultades.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:formaciones.facultades.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:formaciones.facultades.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:formaciones.facultades.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Facultad.
     *
     * @param FacultadDataTable $facultadDataTable
     * @return Response
     */
    public function index(FacultadDataTable $facultadDataTable)
    {
        return $facultadDataTable->render('formaciones.facultades.index');
    }

    /**
     * Show the form for creating a new Facultad.
     *
     * @return Response
     */
    public function create()
    {
        return view('formaciones.facultades.create');
    }

    /**
     * Store a newly created Facultad in storage.
     *
     * @param CreateFacultadRequest $request
     *
     * @return Response
     */
    public function store(CreateFacultadRequest $request)
    {
        $input = $request->all();

        $facultad = $this->facultadRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/facultades.singular')]));

        return redirect(route('formaciones.facultades.index'));
    }

    /**
     * Display the specified Facultad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $facultad = $this->facultadRepository->find($id);

        if (empty($facultad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/facultades.singular')]));

            return redirect(route('formaciones.facultades.index'));
        }
        $audits = $facultad->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('formaciones.facultades.show')->with(['facultad'=>$facultad, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Facultad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $facultad = $this->facultadRepository->find($id);

        if (empty($facultad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/facultades.singular')]));

            return redirect(route('formaciones.facultades.index'));
        }

        return view('formaciones.facultades.edit')->with('facultad', $facultad);
    }

    /**
     * Update the specified Facultad in storage.
     *
     * @param  int              $id
     * @param UpdateFacultadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFacultadRequest $request)
    {
        $facultad = $this->facultadRepository->find($id);

        if (empty($facultad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/facultades.singular')]));

            return redirect(route('formaciones.facultades.index'));
        }

        $facultad = $this->facultadRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/facultades.singular')]));

        return redirect(route('formaciones.facultades.index'));
    }

    /**
     * Remove the specified Facultad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $facultad = $this->facultadRepository->find($id);

        if (empty($facultad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/facultades.singular')]));

            return redirect(route('formaciones.facultades.index'));
        }

        $this->facultadRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/facultades.singular')]));

        return redirect(route('formaciones.facultades.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->facultadRepository->infoSelect2($request->input('q', ''));
    }
}
