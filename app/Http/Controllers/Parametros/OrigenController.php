<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\OrigenDataTable;
use App\Http\Requests\Parametros;
use App\Http\Requests\Parametros\CreateOrigenRequest;
use App\Http\Requests\Parametros\UpdateOrigenRequest;
use App\Repositories\Parametros\OrigenRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class OrigenController extends AppBaseController
{
    /** @var  OrigenRepository */
    private $origenRepository;

    public function __construct(OrigenRepository $origenRepo)
    {
        $this->origenRepository = $origenRepo;
    }

    /**
     * Display a listing of the Origen.
     *
     * @param OrigenDataTable $origenDataTable
     * @return Response
     */
    public function index(OrigenDataTable $origenDataTable)
    {
        return $origenDataTable->render('parametros.origenes.index');
    }

    /**
     * Show the form for creating a new Origen.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.origenes.create');
    }

    /**
     * Store a newly created Origen in storage.
     *
     * @param CreateOrigenRequest $request
     *
     * @return Response
     */
    public function store(CreateOrigenRequest $request)
    {
        $input = $request->all();

        $origen = $this->origenRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/origenes.singular')]));

        return redirect(route('parametros.origenes.index'));
    }

    /**
     * Display the specified Origen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $origen = $this->origenRepository->find($id);

        if (empty($origen)) {
            Flash::error(__('models/origenes.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.origenes.index'));
        }

        $audits = $origen->audits;

        return view('parametros.origenes.show')->with(['origen'=> $origen, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Origen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)origen
    {
        $origen = $this->origenRepository->find($id);

        if (empty($origen)) {
            Flash::error(__('messages.not_found', ['model' => __('models/origenes.singular')]));

            return redirect(route('parametros.origenes.index'));
        }

        return view('parametros.origenes.edit')->with('origen', $origen);
    }

    /**
     * Update the specified Origen in storage.
     *
     * @param  int              $id
     * @param UpdateOrigenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrigenRequest $request)
    {
        $origen = $this->origenRepository->find($id);

        if (empty($origen)) {
            Flash::error(__('messages.not_found', ['model' => __('models/origenes.singular')]));

            return redirect(route('parametros.origenes.index'));
        }

        $origen = $this->origenRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/origenes.singular')]));

        return redirect(route('parametros.origenes.index'));
    }

    /**
     * Remove the specified Origen from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $origen = $this->origenRepository->find($id);

        if (empty($origen)) {
            Flash::error(__('messages.not_found', ['model' => __('models/origenes.singular')]));

            return redirect(route('parametros.origenes.index'));
        }

        $this->origenRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/origenes.singular')]));

        return redirect(route('parametros.origenes.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->origenRepository->infoSelect2($request->input('q', ''));
    }
}
