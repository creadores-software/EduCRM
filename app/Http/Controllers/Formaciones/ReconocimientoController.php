<?php

namespace App\Http\Controllers\Formaciones;

use App\DataTables\Formaciones\ReconocimientoDataTable;
use App\Http\Requests\Formaciones\CreateReconocimientoRequest;
use App\Http\Requests\Formaciones\UpdateReconocimientoRequest;
use App\Repositories\Formaciones\ReconocimientoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class ReconocimientoController extends AppBaseController
{
    /** @var  ReconocimientoRepository */
    private $reconocimientoRepository;

    public function __construct(ReconocimientoRepository $reconocimientoRepo)
    {
        $this->reconocimientoRepository = $reconocimientoRepo;
    }

    /**
     * Display a listing of the Reconocimiento.
     *
     * @param ReconocimientoDataTable $reconocimientoDataTable
     * @return Response
     */
    public function index(ReconocimientoDataTable $reconocimientoDataTable)
    {
        return $reconocimientoDataTable->render('formaciones.reconocimientos.index');
    }

    /**
     * Show the form for creating a new Reconocimiento.
     *
     * @return Response
     */
    public function create()
    {
        return view('formaciones.reconocimientos.create');
    }

    /**
     * Store a newly created Reconocimiento in storage.
     *
     * @param CreateReconocimientoRequest $request
     *
     * @return Response
     */
    public function store(CreateReconocimientoRequest $request)
    {
        $input = $request->all();

        $reconocimiento = $this->reconocimientoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/reconocimientos.singular')]));

        return redirect(route('formaciones.reconocimientos.index'));
    }

    /**
     * Display the specified Reconocimiento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reconocimiento = $this->reconocimientoRepository->find($id);

        if (empty($reconocimiento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/reconocimientos.singular')]));

            return redirect(route('formaciones.reconocimientos.index'));
        }
        $audits = $reconocimiento->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('formaciones.reconocimientos.show')->with(['reconocimiento'=>$reconocimiento, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Reconocimiento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reconocimiento = $this->reconocimientoRepository->find($id);

        if (empty($reconocimiento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/reconocimientos.singular')]));

            return redirect(route('formaciones.reconocimientos.index'));
        }

        return view('formaciones.reconocimientos.edit')->with('reconocimiento', $reconocimiento);
    }

    /**
     * Update the specified Reconocimiento in storage.
     *
     * @param  int              $id
     * @param UpdateReconocimientoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReconocimientoRequest $request)
    {
        $reconocimiento = $this->reconocimientoRepository->find($id);

        if (empty($reconocimiento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/reconocimientos.singular')]));

            return redirect(route('formaciones.reconocimientos.index'));
        }

        $reconocimiento = $this->reconocimientoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/reconocimientos.singular')]));

        return redirect(route('formaciones.reconocimientos.index'));
    }

    /**
     * Remove the specified Reconocimiento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reconocimiento = $this->reconocimientoRepository->find($id);

        if (empty($reconocimiento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/reconocimientos.singular')]));

            return redirect(route('formaciones.reconocimientos.index'));
        }

        $this->reconocimientoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/reconocimientos.singular')]));

        return redirect(route('formaciones.reconocimientos.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->reconocimientoRepository->infoSelect2($request->input('q', ''));
    }
}
