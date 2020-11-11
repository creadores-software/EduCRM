<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\TipoDocumentoDataTable;
use App\Http\Requests\Parametros;
use App\Http\Requests\Parametros\CreateTipoDocumentoRequest;
use App\Http\Requests\Parametros\UpdateTipoDocumentoRequest;
use App\Repositories\Parametros\TipoDocumentoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TipoDocumentoController extends AppBaseController
{
    /** @var  TipoDocumentoRepository */
    private $tipoDocumentoRepository;

    public function __construct(TipoDocumentoRepository $tipoDocumentoRepo)
    {
        $this->tipoDocumentoRepository = $tipoDocumentoRepo;
    }

    /**
     * Display a listing of the TipoDocumento.
     *
     * @param TipoDocumentoDataTable $tipoDocumentoDataTable
     * @return Response
     */
    public function index(TipoDocumentoDataTable $tipoDocumentoDataTable)
    {
        return $tipoDocumentoDataTable->render('parametros.tipos_documento.index');
    }

    /**
     * Show the form for creating a new TipoDocumento.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.tipos_documento.create');
    }

    /**
     * Store a newly created TipoDocumento in storage.
     *
     * @param CreateTipoDocumentoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoDocumentoRequest $request)
    {
        $input = $request->all();

        $tipoDocumento = $this->tipoDocumentoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tiposDocumento.singular')]));

        return redirect(route('parametros.tiposDocumento.index'));
    }

    /**
     * Display the specified TipoDocumento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoDocumento = $this->tipoDocumentoRepository->find($id);

        if (empty($tipoDocumento)) {
            Flash::error(__('models/tiposDocumento.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.tiposDocumento.index'));
        }

        return view('parametros.tipos_documento.show')->with('tipoDocumento', $tipoDocumento);
    }

    /**
     * Show the form for editing the specified TipoDocumento.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoDocumento = $this->tipoDocumentoRepository->find($id);

        if (empty($tipoDocumento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposDocumento.singular')]));

            return redirect(route('parametros.tiposDocumento.index'));
        }

        return view('parametros.tipos_documento.edit')->with('tipoDocumento', $tipoDocumento);
    }

    /**
     * Update the specified TipoDocumento in storage.
     *
     * @param  int              $id
     * @param UpdateTipoDocumentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoDocumentoRequest $request)
    {
        $tipoDocumento = $this->tipoDocumentoRepository->find($id);

        if (empty($tipoDocumento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposDocumento.singular')]));

            return redirect(route('parametros.tiposDocumento.index'));
        }

        $tipoDocumento = $this->tipoDocumentoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tiposDocumento.singular')]));

        return redirect(route('parametros.tiposDocumento.index'));
    }

    /**
     * Remove the specified TipoDocumento from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoDocumento = $this->tipoDocumentoRepository->find($id);

        if (empty($tipoDocumento)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposDocumento.singular')]));

            return redirect(route('parametros.tiposDocumento.index'));
        }

        $this->tipoDocumentoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tiposDocumento.singular')]));

        return redirect(route('parametros.tiposDocumento.index'));
    }
}
