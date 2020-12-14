<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\EstatusLealtadDataTable;
use App\Http\Requests\Parametros\CreateEstatusLealtadRequest;
use App\Http\Requests\Parametros\UpdateEstatusLealtadRequest;
use App\Repositories\Parametros\EstatusLealtadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class EstatusLealtadController extends AppBaseController
{
    /** @var  EstatusLealtadRepository */
    private $estatusLealtadRepository;

    public function __construct(EstatusLealtadRepository $estatusLealtadRepo)
    {
        $this->estatusLealtadRepository = $estatusLealtadRepo;
    }

    /**
     * Display a listing of the EstatusLealtad.
     *
     * @param EstatusLealtadDataTable $estatusLealtadDataTable
     * @return Response
     */
    public function index(EstatusLealtadDataTable $estatusLealtadDataTable)
    {
        return $estatusLealtadDataTable->render('parametros.estatus_lealtad.index');
    }

    /**
     * Show the form for creating a new EstatusLealtad.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.estatus_lealtad.create');
    }

    /**
     * Store a newly created EstatusLealtad in storage.
     *
     * @param CreateEstatusLealtadRequest $request
     *
     * @return Response
     */
    public function store(CreateEstatusLealtadRequest $request)
    {
        $input = $request->all();

        $estatusLealtad = $this->estatusLealtadRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/estatusLealtad.singular')]));

        return redirect(route('parametros.estatusLealtad.index'));
    }

    /**
     * Display the specified EstatusLealtad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estatusLealtad = $this->estatusLealtadRepository->find($id);

        if (empty($estatusLealtad)) {
            Flash::error(__('models/estatusLealtad.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.estatusLealtad.index'));
        }

        $audits = $estatusLealtad->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('parametros.estatus_lealtad.show')->with(['estatusLealtad'=> $estatusLealtad, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified EstatusLealtad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estatusLealtad = $this->estatusLealtadRepository->find($id);

        if (empty($estatusLealtad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estatusLealtad.singular')]));

            return redirect(route('parametros.estatusLealtad.index'));
        }

        return view('parametros.estatus_lealtad.edit')->with('estatusLealtad', $estatusLealtad);
    }

    /**
     * Update the specified EstatusLealtad in storage.
     *
     * @param  int              $id
     * @param UpdateEstatusLealtadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstatusLealtadRequest $request)
    {
        $estatusLealtad = $this->estatusLealtadRepository->find($id);

        if (empty($estatusLealtad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estatusLealtad.singular')]));

            return redirect(route('parametros.estatusLealtad.index'));
        }

        $estatusLealtad = $this->estatusLealtadRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/estatusLealtad.singular')]));

        return redirect(route('parametros.estatusLealtad.index'));
    }

    /**
     * Remove the specified EstatusLealtad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estatusLealtad = $this->estatusLealtadRepository->find($id);

        if (empty($estatusLealtad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estatusLealtad.singular')]));

            return redirect(route('parametros.estatusLealtad.index'));
        }

        $this->estatusLealtadRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/estatusLealtad.singular')]));

        return redirect(route('parametros.estatusLealtad.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->estatusLealtadRepository->infoSelect2($request->input('q', ''));
    }
}
