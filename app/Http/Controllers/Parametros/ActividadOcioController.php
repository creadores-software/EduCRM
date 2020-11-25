<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\ActividadOcioDataTable;
use App\Http\Requests\Parametros\CreateActividadOcioRequest;
use App\Http\Requests\Parametros\UpdateActividadOcioRequest;
use App\Repositories\Parametros\ActividadOcioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class ActividadOcioController extends AppBaseController
{
    /** @var  ActividadOcioRepository */
    private $actividadOcioRepository;

    public function __construct(ActividadOcioRepository $actividadOcioRepo)
    {
        $this->actividadOcioRepository = $actividadOcioRepo;
    }

    /**
     * Display a listing of the ActividadOcio.
     *
     * @param ActividadOcioDataTable $actividadOcioDataTable
     * @return Response
     */
    public function index(ActividadOcioDataTable $actividadOcioDataTable)
    {
        return $actividadOcioDataTable->render('parametros.actividades_ocio.index');
    }

    /**
     * Show the form for creating a new ActividadOcio.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.actividades_ocio.create');
    }

    /**
     * Store a newly created ActividadOcio in storage.
     *
     * @param CreateActividadOcioRequest $request
     *
     * @return Response
     */
    public function store(CreateActividadOcioRequest $request)
    {
        $input = $request->all();

        $actividadOcio = $this->actividadOcioRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/actividadesOcio.singular')]));

        return redirect(route('parametros.actividadesOcio.index'));
    }

    /**
     * Display the specified ActividadOcio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $actividadOcio = $this->actividadOcioRepository->find($id);

        if (empty($actividadOcio)) {
            Flash::error(__('models/actividadesOcio.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.actividadesOcio.index'));
        }

        $audits = $actividadOcio->audits;

        return view('parametros.actividades_ocio.show')->with(['actividadOcio'=> $actividadOcio, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified ActividadOcio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $actividadOcio = $this->actividadOcioRepository->find($id);

        if (empty($actividadOcio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/actividadesOcio.singular')]));

            return redirect(route('parametros.actividadesOcio.index'));
        }

        return view('parametros.actividades_ocio.edit')->with('actividadOcio', $actividadOcio);
    }

    /**
     * Update the specified ActividadOcio in storage.
     *
     * @param  int              $id
     * @param UpdateActividadOcioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActividadOcioRequest $request)
    {
        $actividadOcio = $this->actividadOcioRepository->find($id);

        if (empty($actividadOcio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/actividadesOcio.singular')]));

            return redirect(route('parametros.actividadesOcio.index'));
        }

        $actividadOcio = $this->actividadOcioRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/actividadesOcio.singular')]));

        return redirect(route('parametros.actividadesOcio.index'));
    }

    /**
     * Remove the specified ActividadOcio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $actividadOcio = $this->actividadOcioRepository->find($id);

        if (empty($actividadOcio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/actividadesOcio.singular')]));

            return redirect(route('parametros.actividadesOcio.index'));
        }

        $this->actividadOcioRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/actividadesOcio.singular')]));

        return redirect(route('parametros.actividadesOcio.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->actividadOcioRepository->infoSelect2($request->input('term', ''));
    }
}
