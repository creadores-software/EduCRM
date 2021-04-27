<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\JustificacionEstadoCampaniaDataTable;
use App\Http\Requests\Campanias\CreateJustificacionEstadoCampaniaRequest;
use App\Http\Requests\Campanias\UpdateJustificacionEstadoCampaniaRequest;
use App\Repositories\Campanias\JustificacionEstadoCampaniaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class JustificacionEstadoCampaniaController extends AppBaseController
{
    /** @var  JustificacionEstadoCampaniaRepository */
    private $justificacionEstadoCampaniaRepository;

    public function __construct(JustificacionEstadoCampaniaRepository $justificacionEstadoCampaniaRepo)
    {
        $this->justificacionEstadoCampaniaRepository = $justificacionEstadoCampaniaRepo;
        $this->middleware('permission:campanias.justificacionesEstadoCampania.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.justificacionesEstadoCampania.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:campanias.justificacionesEstadoCampania.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:campanias.justificacionesEstadoCampania.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the JustificacionEstadoCampania.
     *
     * @param JustificacionEstadoCampaniaDataTable $justificacionEstadoCampaniaDataTable
     * @return Response
     */
    public function index(JustificacionEstadoCampaniaDataTable $justificacionEstadoCampaniaDataTable)
    {
        return $justificacionEstadoCampaniaDataTable->render('campanias.justificaciones_estado_campania.index');
    }

    /**
     * Show the form for creating a new JustificacionEstadoCampania.
     *
     * @return Response
     */
    public function create()
    {
        return view('campanias.justificaciones_estado_campania.create');
    }

    /**
     * Store a newly created JustificacionEstadoCampania in storage.
     *
     * @param CreateJustificacionEstadoCampaniaRequest $request
     *
     * @return Response
     */
    public function store(CreateJustificacionEstadoCampaniaRequest $request)
    {
        $input = $request->all();

        $justificacionEstadoCampania = $this->justificacionEstadoCampaniaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/justificacionesEstadoCampania.singular')]));

        return redirect(route('campanias.justificacionesEstadoCampania.index'));
    }

    /**
     * Display the specified JustificacionEstadoCampania.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $justificacionEstadoCampania = $this->justificacionEstadoCampaniaRepository->find($id);

        if (empty($justificacionEstadoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/justificacionesEstadoCampania.singular')]));

            return redirect(route('campanias.justificacionesEstadoCampania.index'));
        }
        $audits = $justificacionEstadoCampania->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('campanias.justificaciones_estado_campania.show')->with(['justificacionEstadoCampania'=>$justificacionEstadoCampania,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified JustificacionEstadoCampania.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $justificacionEstadoCampania = $this->justificacionEstadoCampaniaRepository->find($id);

        if (empty($justificacionEstadoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/justificacionesEstadoCampania.singular')]));

            return redirect(route('campanias.justificacionesEstadoCampania.index'));
        }

        return view('campanias.justificaciones_estado_campania.edit')->with('justificacionEstadoCampania', $justificacionEstadoCampania);
    }

    /**
     * Update the specified JustificacionEstadoCampania in storage.
     *
     * @param  int              $id
     * @param UpdateJustificacionEstadoCampaniaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJustificacionEstadoCampaniaRequest $request)
    {
        $justificacionEstadoCampania = $this->justificacionEstadoCampaniaRepository->find($id);

        if (empty($justificacionEstadoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/justificacionesEstadoCampania.singular')]));

            return redirect(route('campanias.justificacionesEstadoCampania.index'));
        }

        $justificacionEstadoCampania = $this->justificacionEstadoCampaniaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/justificacionesEstadoCampania.singular')]));

        return redirect(route('campanias.justificacionesEstadoCampania.index'));
    }

    /**
     * Remove the specified JustificacionEstadoCampania from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $justificacionEstadoCampania = $this->justificacionEstadoCampaniaRepository->find($id);

        if (empty($justificacionEstadoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/justificacionesEstadoCampania.singular')]));

            return redirect(route('campanias.justificacionesEstadoCampania.index'));
        }

        $this->justificacionEstadoCampaniaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/justificacionesEstadoCampania.singular')]));

        return redirect(route('campanias.justificacionesEstadoCampania.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->justificacionEstadoCampaniaRepository->infoSelect2($request->input('q', ''));
    }

}