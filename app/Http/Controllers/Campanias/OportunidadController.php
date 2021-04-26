<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\OportunidadDataTable;
use App\Http\Requests\Campanias\CreateOportunidadRequest;
use App\Http\Requests\Campanias\UpdateOportunidadRequest;
use App\Repositories\Campanias\OportunidadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class OportunidadController extends AppBaseController
{
    /** @var  OportunidadRepository */
    private $oportunidadRepository;

    public function __construct(OportunidadRepository $oportunidadRepo)
    {
        $this->oportunidadRepository = $oportunidadRepo;
        $this->middleware('permission:campanias.oportunidades.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.oportunidades.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:campanias.oportunidades.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:campanias.oportunidades.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Oportunidad.
     *
     * @param OportunidadDataTable $oportunidadDataTable
     * @return Response
     */
    public function index(OportunidadDataTable $oportunidadDataTable)
    {
        return $oportunidadDataTable->render('campanias.oportunidades.index');
    }

    /**
     * Show the form for creating a new Oportunidad.
     *
     * @return Response
     */
    public function create()
    {
        return view('campanias.oportunidades.create');
    }

    /**
     * Store a newly created Oportunidad in storage.
     *
     * @param CreateOportunidadRequest $request
     *
     * @return Response
     */
    public function store(CreateOportunidadRequest $request)
    {
        $input = $request->all();

        $oportunidad = $this->oportunidadRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/oportunidades.singular')]));

        return redirect(route('campanias.oportunidades.index'));
    }

    /**
     * Display the specified Oportunidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $oportunidad = $this->oportunidadRepository->find($id);

        if (empty($oportunidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/oportunidades.singular')]));

            return redirect(route('campanias.oportunidades.index'));
        }
        $audits = $oportunidad->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('campanias.oportunidades.show')->with(['oportunidad'=>$oportunidad,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Oportunidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $oportunidad = $this->oportunidadRepository->find($id);

        if (empty($oportunidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/oportunidades.singular')]));

            return redirect(route('campanias.oportunidades.index'));
        }

        return view('campanias.oportunidades.edit')->with('oportunidad', $oportunidad);
    }

    /**
     * Update the specified Oportunidad in storage.
     *
     * @param  int              $id
     * @param UpdateOportunidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOportunidadRequest $request)
    {
        $oportunidad = $this->oportunidadRepository->find($id);

        if (empty($oportunidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/oportunidades.singular')]));

            return redirect(route('campanias.oportunidades.index'));
        }

        $oportunidad = $this->oportunidadRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/oportunidades.singular')]));

        return redirect(route('campanias.oportunidades.index'));
    }

    /**
     * Remove the specified Oportunidad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $oportunidad = $this->oportunidadRepository->find($id);

        if (empty($oportunidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/oportunidades.singular')]));

            return redirect(route('campanias.oportunidades.index'));
        }

        $this->oportunidadRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/oportunidades.singular')]));

        return redirect(route('campanias.oportunidades.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->oportunidadRepository->infoSelect2($request->input('q', ''));
    }

}
