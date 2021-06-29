<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\TipoEstadoColorDataTable;
use App\Http\Requests\Campanias\CreateTipoEstadoColorRequest;
use App\Http\Requests\Campanias\UpdateTipoEstadoColorRequest;
use App\Repositories\Campanias\TipoEstadoColorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class TipoEstadoColorController extends AppBaseController
{
    /** @var  TipoEstadoColorRepository */
    private $tipoEstadoColorRepository;

    public function __construct(TipoEstadoColorRepository $tipoEstadoColorRepo)
    {
        $this->tipoEstadoColorRepository = $tipoEstadoColorRepo;
        $this->middleware('permission:campanias.tiposEstadoColor.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.tiposEstadoColor.editar', ['only' => ['edit','update']]);
    }

    /**
     * Display a listing of the TipoEstadoColor.
     *
     * @param TipoEstadoColorDataTable $tipoEstadoColorDataTable
     * @return Response
     */
    public function index(TipoEstadoColorDataTable $tipoEstadoColorDataTable)
    {
        return $tipoEstadoColorDataTable->render('campanias.tipos_estado_color.index');
    }

    /**
     * Display the specified TipoEstadoColor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoEstadoColor = $this->tipoEstadoColorRepository->find($id);

        if (empty($tipoEstadoColor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposEstadoColor.singular')]));

            return redirect(route('campanias.tiposEstadoColor.index'));
        }
        $audits = $tipoEstadoColor->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('campanias.tipos_estado_color.show')->with(['tipoEstadoColor'=>$tipoEstadoColor,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified TipoEstadoColor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoEstadoColor = $this->tipoEstadoColorRepository->find($id);

        if (empty($tipoEstadoColor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposEstadoColor.singular')]));

            return redirect(route('campanias.tiposEstadoColor.index'));
        }

        return view('campanias.tipos_estado_color.edit')->with('tipoEstadoColor', $tipoEstadoColor);
    }

    /**
     * Update the specified TipoEstadoColor in storage.
     *
     * @param  int              $id
     * @param UpdateTipoEstadoColorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoEstadoColorRequest $request)
    {
        $tipoEstadoColor = $this->tipoEstadoColorRepository->find($id);

        if (empty($tipoEstadoColor)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposEstadoColor.singular')]));

            return redirect(route('campanias.tiposEstadoColor.index'));
        }

        $tipoEstadoColor = $this->tipoEstadoColorRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tiposEstadoColor.singular')]));

        return redirect(route('campanias.tiposEstadoColor.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->tipoEstadoColorRepository->infoSelect2($request->input('q', ''));
    }

}
