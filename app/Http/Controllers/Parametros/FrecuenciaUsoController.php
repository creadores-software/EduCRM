<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\FrecuenciaUsoDataTable;
use App\Http\Requests\Parametros\CreateFrecuenciaUsoRequest;
use App\Http\Requests\Parametros\UpdateFrecuenciaUsoRequest;
use App\Repositories\Parametros\FrecuenciaUsoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class FrecuenciaUsoController extends AppBaseController
{
    /** @var  FrecuenciaUsoRepository */
    private $frecuenciaUsoRepository;

    public function __construct(FrecuenciaUsoRepository $frecuenciaUsoRepo)
    {
        $this->frecuenciaUsoRepository = $frecuenciaUsoRepo;
    }

    /**
     * Display a listing of the FrecuenciaUso.
     *
     * @param FrecuenciaUsoDataTable $frecuenciaUsoDataTable
     * @return Response
     */
    public function index(FrecuenciaUsoDataTable $frecuenciaUsoDataTable)
    {
        return $frecuenciaUsoDataTable->render('parametros.frecuencias_uso.index');
    }

    /**
     * Show the form for creating a new FrecuenciaUso.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.frecuencias_uso.create');
    }

    /**
     * Store a newly created FrecuenciaUso in storage.
     *
     * @param CreateFrecuenciaUsoRequest $request
     *
     * @return Response
     */
    public function store(CreateFrecuenciaUsoRequest $request)
    {
        $input = $request->all();

        $frecuenciaUso = $this->frecuenciaUsoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/frecuenciasUso.singular')]));

        return redirect(route('parametros.frecuenciasUso.index'));
    }

    /**
     * Display the specified FrecuenciaUso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $frecuenciaUso = $this->frecuenciaUsoRepository->find($id);

        if (empty($frecuenciaUso)) {
            Flash::error(__('models/frecuenciasUso.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.frecuenciasUso.index'));
        }

        $audits = $frecuenciaUso->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('parametros.frecuencias_uso.show')->with(['frecuenciaUso'=> $frecuenciaUso, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified FrecuenciaUso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $frecuenciaUso = $this->frecuenciaUsoRepository->find($id);

        if (empty($frecuenciaUso)) {
            Flash::error(__('messages.not_found', ['model' => __('models/frecuenciasUso.singular')]));

            return redirect(route('parametros.frecuenciasUso.index'));
        }

        return view('parametros.frecuencias_uso.edit')->with('frecuenciaUso', $frecuenciaUso);
    }

    /**
     * Update the specified FrecuenciaUso in storage.
     *
     * @param  int              $id
     * @param UpdateFrecuenciaUsoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFrecuenciaUsoRequest $request)
    {
        $frecuenciaUso = $this->frecuenciaUsoRepository->find($id);

        if (empty($frecuenciaUso)) {
            Flash::error(__('messages.not_found', ['model' => __('models/frecuenciasUso.singular')]));

            return redirect(route('parametros.frecuenciasUso.index'));
        }

        $frecuenciaUso = $this->frecuenciaUsoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/frecuenciasUso.singular')]));

        return redirect(route('parametros.frecuenciasUso.index'));
    }

    /**
     * Remove the specified FrecuenciaUso from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $frecuenciaUso = $this->frecuenciaUsoRepository->find($id);

        if (empty($frecuenciaUso)) {
            Flash::error(__('messages.not_found', ['model' => __('models/frecuenciasUso.singular')]));

            return redirect(route('parametros.frecuenciasUso.index'));
        }

        $this->frecuenciaUsoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/frecuenciasUso.singular')]));

        return redirect(route('parametros.frecuenciasUso.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->frecuenciaUsoRepository->infoSelect2($request->input('q', ''));
    }
}
