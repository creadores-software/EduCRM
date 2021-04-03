<?php

namespace App\Http\Controllers\Formaciones;

use App\DataTables\Formaciones\TipoAccesoDataTable;
use App\Http\Requests\Formaciones\CreateTipoAccesoRequest;
use App\Http\Requests\Formaciones\UpdateTipoAccesoRequest;
use App\Repositories\Formaciones\TipoAccesoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class TipoAccesoController extends AppBaseController
{
    /** @var  TipoAccesoRepository */
    private $tipoAccesoRepository;

    public function __construct(TipoAccesoRepository $tipoAccesoRepo)
    {
        $this->tipoAccesoRepository = $tipoAccesoRepo;
    }

    /**
     * Display a listing of the TipoAcceso.
     *
     * @param TipoAccesoDataTable $tipoAccesoDataTable
     * @return Response
     */
    public function index(TipoAccesoDataTable $tipoAccesoDataTable)
    {
        return $tipoAccesoDataTable->render('formaciones.tipos_acceso.index');
    }

    /**
     * Show the form for creating a new TipoAcceso.
     *
     * @return Response
     */
    public function create()
    {
        return view('formaciones.tipos_acceso.create');
    }

    /**
     * Store a newly created TipoAcceso in storage.
     *
     * @param CreateTipoAccesoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoAccesoRequest $request)
    {
        $input = $request->all();

        $tipoAcceso = $this->tipoAccesoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tiposAcceso.singular')]));

        return redirect(route('formaciones.tiposAcceso.index'));
    }

    /**
     * Display the specified TipoAcceso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoAcceso = $this->tipoAccesoRepository->find($id);

        if (empty($tipoAcceso)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposAcceso.singular')]));

            return redirect(route('formaciones.tiposAcceso.index'));
        }
        $audits = $tipoAcceso->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('formaciones.tipos_acceso.show')->with(['tipoAcceso'=>$tipoAcceso, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified TipoAcceso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoAcceso = $this->tipoAccesoRepository->find($id);

        if (empty($tipoAcceso)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposAcceso.singular')]));

            return redirect(route('formaciones.tiposAcceso.index'));
        }

        return view('formaciones.tipos_acceso.edit')->with('tipoAcceso', $tipoAcceso);
    }

    /**
     * Update the specified TipoAcceso in storage.
     *
     * @param  int              $id
     * @param UpdateTipoAccesoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoAccesoRequest $request)
    {
        $tipoAcceso = $this->tipoAccesoRepository->find($id);

        if (empty($tipoAcceso)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposAcceso.singular')]));

            return redirect(route('formaciones.tiposAcceso.index'));
        }

        $tipoAcceso = $this->tipoAccesoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tiposAcceso.singular')]));

        return redirect(route('formaciones.tiposAcceso.index'));
    }

    /**
     * Remove the specified TipoAcceso from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoAcceso = $this->tipoAccesoRepository->find($id);

        if (empty($tipoAcceso)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposAcceso.singular')]));

            return redirect(route('formaciones.tiposAcceso.index'));
        }

        $this->tipoAccesoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tiposAcceso.singular')]));

        return redirect(route('formaciones.tiposAcceso.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->tipoAccesoRepository->infoSelect2($request->input('q', ''));
    }
}
