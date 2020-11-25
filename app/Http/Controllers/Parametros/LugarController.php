<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\LugarDataTable;
use App\Http\Requests\Parametros\CreateLugarRequest;
use App\Http\Requests\Parametros\UpdateLugarRequest;
use App\Repositories\Parametros\LugarRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class LugarController extends AppBaseController
{
    /** @var  LugarRepository */
    private $lugarRepository;

    public function __construct(LugarRepository $lugarRepo)
    {
        $this->lugarRepository = $lugarRepo;
    }

    /**
     * Display a listing of the Lugar.
     *
     * @param LugarDataTable $lugarDataTable
     * @return Response
     */
    public function index(LugarDataTable $lugarDataTable)
    {
        return $lugarDataTable->render('parametros.lugares.index');
    }

    /**
     * Show the form for creating a new Lugar.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.lugares.create');
    }

    /**
     * Store a newly created Lugar in storage.
     *
     * @param CreateLugarRequest $request
     *
     * @return Response
     */
    public function store(CreateLugarRequest $request)
    {
        $input = $request->all();

        $lugar = $this->lugarRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/lugares.singular')]));

        return redirect(route('parametros.lugares.index'));
    }

    /**
     * Display the specified Lugar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lugar = $this->lugarRepository->find($id);

        if (empty($lugar)) {
            Flash::error(__('models/lugares.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.lugares.index'));
        }

        $audits = $lugar->audits;

        return view('parametros.lugares.show')->with(['lugar'=> $lugar, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Lugar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lugar = $this->lugarRepository->find($id);

        if (empty($lugar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/lugares.singular')]));

            return redirect(route('parametros.lugares.index'));
        }

        return view('parametros.lugares.edit')->with('lugar', $lugar);
    }

    /**
     * Update the specified Lugar in storage.
     *
     * @param  int              $id
     * @param UpdateLugarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLugarRequest $request)
    {
        $lugar = $this->lugarRepository->find($id);

        if (empty($lugar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/lugares.singular')]));

            return redirect(route('parametros.lugares.index'));
        }

        $lugar = $this->lugarRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/lugares.singular')]));

        return redirect(route('parametros.lugares.index'));
    }

    /**
     * Remove the specified Lugar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lugar = $this->lugarRepository->find($id);

        if (empty($lugar)) {
            Flash::error(__('messages.not_found', ['model' => __('models/lugares.singular')]));

            return redirect(route('parametros.lugares.index'));
        }

        $this->lugarRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/lugares.singular')]));

        return redirect(route('parametros.lugares.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->lugarRepository->infoSelect2($request->input('term', ''));
    }

}
