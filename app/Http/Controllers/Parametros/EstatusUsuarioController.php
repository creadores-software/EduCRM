<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\EstatusUsuarioDataTable;
use App\Http\Requests\Parametros\CreateEstatusUsuarioRequest;
use App\Http\Requests\Parametros\UpdateEstatusUsuarioRequest;
use App\Repositories\Parametros\EstatusUsuarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class EstatusUsuarioController extends AppBaseController
{
    /** @var  EstatusUsuarioRepository */
    private $estatusUsuarioRepository;

    public function __construct(EstatusUsuarioRepository $estatusUsuarioRepo)
    {
        $this->estatusUsuarioRepository = $estatusUsuarioRepo;
        $this->middleware('permission:parametros.estatusUsuario.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:parametros.estatusUsuario.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:parametros.estatusUsuario.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:parametros.estatusUsuario.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the EstatusUsuario.
     *
     * @param EstatusUsuarioDataTable $estatusUsuarioDataTable
     * @return Response
     */
    public function index(EstatusUsuarioDataTable $estatusUsuarioDataTable)
    {
        return $estatusUsuarioDataTable->render('parametros.estatus_usuario.index');
    }

    /**
     * Show the form for creating a new EstatusUsuario.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.estatus_usuario.create');
    }

    /**
     * Store a newly created EstatusUsuario in storage.
     *
     * @param CreateEstatusUsuarioRequest $request
     *
     * @return Response
     */
    public function store(CreateEstatusUsuarioRequest $request)
    {
        $input = $request->all();

        $estatusUsuario = $this->estatusUsuarioRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/estatusUsuario.singular')]));

        return redirect(route('parametros.estatusUsuario.index'));
    }

    /**
     * Display the specified EstatusUsuario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estatusUsuario = $this->estatusUsuarioRepository->find($id);

        if (empty($estatusUsuario)) {
            Flash::error(__('models/estatusUsuario.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.estatusUsuario.index'));
        }

        $audits = $estatusUsuario->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('parametros.estatus_usuario.show')->with(['estatusUsuario'=> $estatusUsuario, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified EstatusUsuario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estatusUsuario = $this->estatusUsuarioRepository->find($id);

        if (empty($estatusUsuario)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estatusUsuario.singular')]));

            return redirect(route('parametros.estatusUsuario.index'));
        }

        return view('parametros.estatus_usuario.edit')->with('estatusUsuario', $estatusUsuario);
    }

    /**
     * Update the specified EstatusUsuario in storage.
     *
     * @param  int              $id
     * @param UpdateEstatusUsuarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstatusUsuarioRequest $request)
    {
        $estatusUsuario = $this->estatusUsuarioRepository->find($id);

        if (empty($estatusUsuario)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estatusUsuario.singular')]));

            return redirect(route('parametros.estatusUsuario.index'));
        }

        $estatusUsuario = $this->estatusUsuarioRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/estatusUsuario.singular')]));

        return redirect(route('parametros.estatusUsuario.index'));
    }

    /**
     * Remove the specified EstatusUsuario from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estatusUsuario = $this->estatusUsuarioRepository->find($id);

        if (empty($estatusUsuario)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estatusUsuario.singular')]));

            return redirect(route('parametros.estatusUsuario.index'));
        }

        $this->estatusUsuarioRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/estatusUsuario.singular')]));

        return redirect(route('parametros.estatusUsuario.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->estatusUsuarioRepository->infoSelect2($request->input('q', ''));
    }
}
