<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\TipoParentescoDataTable;
use App\Http\Requests\Parametros\CreateTipoParentescoRequest;
use App\Http\Requests\Parametros\UpdateTipoParentescoRequest;
use App\Repositories\Parametros\TipoParentescoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class TipoParentescoController extends AppBaseController
{
    /** @var  TipoParentescoRepository */
    private $tipoParentescoRepository;

    public function __construct(TipoParentescoRepository $tipoParentescoRepo)
    {
        $this->tipoParentescoRepository = $tipoParentescoRepo;
    }

    /**
     * Display a listing of the TipoParentesco.
     *
     * @param TipoParentescoDataTable $tipoParentescoDataTable
     * @return Response
     */
    public function index(TipoParentescoDataTable $tipoParentescoDataTable)
    {
        return $tipoParentescoDataTable->render('parametros.tipos_parentesco.index');
    }

    /**
     * Show the form for creating a new TipoParentesco.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.tipos_parentesco.create');
    }

    /**
     * Store a newly created TipoParentesco in storage.
     *
     * @param CreateTipoParentescoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoParentescoRequest $request)
    {
        $input = $request->all();

        $tipoParentesco = $this->tipoParentescoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tiposParentesco.singular')]));

        return redirect(route('parametros.tiposParentesco.index'));
    }

    /**
     * Display the specified TipoParentesco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoParentesco = $this->tipoParentescoRepository->find($id);

        if (empty($tipoParentesco)) {
            Flash::error(__('models/tiposParentesco.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.tiposParentesco.index'));
        }

        $audits = $tipoParentesco->ledgers()->with('user')->get();

        return view('parametros.tipos_parentesco.show')->with(['tipoParentesco'=> $tipoParentesco, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified TipoParentesco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoParentesco = $this->tipoParentescoRepository->find($id);

        if (empty($tipoParentesco)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposParentesco.singular')]));

            return redirect(route('parametros.tiposParentesco.index'));
        }

        return view('parametros.tipos_parentesco.edit')->with('tipoParentesco', $tipoParentesco);
    }

    /**
     * Update the specified TipoParentesco in storage.
     *
     * @param  int              $id
     * @param UpdateTipoParentescoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoParentescoRequest $request)
    {
        $tipoParentesco = $this->tipoParentescoRepository->find($id);

        if (empty($tipoParentesco)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposParentesco.singular')]));

            return redirect(route('parametros.tiposParentesco.index'));
        }

        $tipoParentesco = $this->tipoParentescoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tiposParentesco.singular')]));

        return redirect(route('parametros.tiposParentesco.index'));
    }

    /**
     * Remove the specified TipoParentesco from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoParentesco = $this->tipoParentescoRepository->find($id);

        if (empty($tipoParentesco)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposParentesco.singular')]));

            return redirect(route('parametros.tiposParentesco.index'));
        }

        $this->tipoParentescoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tiposParentesco.singular')]));

        return redirect(route('parametros.tiposParentesco.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->tipoParentescoRepository->infoSelect2($request->input('q', ''));
    }

}
