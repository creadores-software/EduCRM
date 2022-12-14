<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\TipoContactoDataTable;
use App\Http\Requests\Parametros\CreateTipoContactoRequest;
use App\Http\Requests\Parametros\UpdateTipoContactoRequest;
use App\Repositories\Parametros\TipoContactoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class TipoContactoController extends AppBaseController
{
    /** @var  TipoContactoRepository */
    private $tipoContactoRepository;

    public function __construct(TipoContactoRepository $tipoContactoRepo)
    {
        $this->tipoContactoRepository = $tipoContactoRepo;
        $this->middleware('permission:parametros.tiposContacto.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:parametros.tiposContacto.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:parametros.tiposContacto.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:parametros.tiposContacto.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the TipoContacto.
     *
     * @param TipoContactoDataTable $tipoContactoDataTable
     * @return Response
     */
    public function index(TipoContactoDataTable $tipoContactoDataTable)
    {
        return $tipoContactoDataTable->render('parametros.tipos_contacto.index');
    }

    /**
     * Show the form for creating a new TipoContacto.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.tipos_contacto.create');
    }

    /**
     * Store a newly created TipoContacto in storage.
     *
     * @param CreateTipoContactoRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoContactoRequest $request)
    {
        $input = $request->all();

        $tipoContacto = $this->tipoContactoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tiposContacto.singular')]));

        return redirect(route('parametros.tiposContacto.index'));
    }

    /**
     * Display the specified TipoContacto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoContacto = $this->tipoContactoRepository->find($id);

        if (empty($tipoContacto)) {
            Flash::error(__('models/tiposContacto.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.tiposContacto.index'));
        }

        $audits = $tipoContacto->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('parametros.tipos_contacto.show')->with(['tipoContacto'=> $tipoContacto, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified TipoContacto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoContacto = $this->tipoContactoRepository->find($id);

        if (empty($tipoContacto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposContacto.singular')]));

            return redirect(route('parametros.tiposContacto.index'));
        }

        return view('parametros.tipos_contacto.edit')->with('tipoContacto', $tipoContacto);
    }

    /**
     * Update the specified TipoContacto in storage.
     *
     * @param  int              $id
     * @param UpdateTipoContactoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoContactoRequest $request)
    {
        $tipoContacto = $this->tipoContactoRepository->find($id);

        if (empty($tipoContacto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposContacto.singular')]));

            return redirect(route('parametros.tiposContacto.index'));
        }

        $tipoContacto = $this->tipoContactoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tiposContacto.singular')]));

        return redirect(route('parametros.tiposContacto.index'));
    }

    /**
     * Remove the specified TipoContacto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoContacto = $this->tipoContactoRepository->find($id);

        if (empty($tipoContacto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposContacto.singular')]));

            return redirect(route('parametros.tiposContacto.index'));
        }

        $this->tipoContactoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tiposContacto.singular')]));

        return redirect(route('parametros.tiposContacto.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->tipoContactoRepository->infoSelect2($request->input('q', ''));
    }
}
