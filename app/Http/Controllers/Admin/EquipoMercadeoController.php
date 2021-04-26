<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\EquipoMercadeoDataTable;
use App\Http\Requests\Admin\CreateEquipoMercadeoRequest;
use App\Http\Requests\Admin\UpdateEquipoMercadeoRequest;
use App\Repositories\Admin\EquipoMercadeoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class EquipoMercadeoController extends AppBaseController
{
    /** @var  EquipoMercadeoRepository */
    private $equipoMercadeoRepository;

    public function __construct(EquipoMercadeoRepository $equipoMercadeoRepo)
    {
        $this->equipoMercadeoRepository = $equipoMercadeoRepo;
        $this->middleware('permission:admin.equiposMercadeo.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:admin.equiposMercadeo.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:admin.equiposMercadeo.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:admin.equiposMercadeo.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the EquipoMercadeo.
     *
     * @param EquipoMercadeoDataTable $equipoMercadeoDataTable
     * @return Response
     */
    public function index(EquipoMercadeoDataTable $equipoMercadeoDataTable)
    {
        return $equipoMercadeoDataTable->render('admin.equipos_mercadeo.index');
    }

    /**
     * Show the form for creating a new EquipoMercadeo.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.equipos_mercadeo.create');
    }

    /**
     * Store a newly created EquipoMercadeo in storage.
     *
     * @param CreateEquipoMercadeoRequest $request
     *
     * @return Response
     */
    public function store(CreateEquipoMercadeoRequest $request)
    {
        $input = $request->all();

        $equipoMercadeo = $this->equipoMercadeoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/equiposMercadeo.singular')]));

        return redirect(route('admin.equiposMercadeo.index'));
    }

    /**
     * Display the specified EquipoMercadeo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipoMercadeo = $this->equipoMercadeoRepository->find($id);

        if (empty($equipoMercadeo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/equiposMercadeo.singular')]));

            return redirect(route('admin.equiposMercadeo.index'));
        }
        $audits = $equipoMercadeo->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('admin.equipos_mercadeo.show')->with(['equipoMercadeo'=>$equipoMercadeo,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified EquipoMercadeo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipoMercadeo = $this->equipoMercadeoRepository->find($id);

        if (empty($equipoMercadeo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/equiposMercadeo.singular')]));

            return redirect(route('admin.equiposMercadeo.index'));
        }

        return view('admin.equipos_mercadeo.edit')->with('equipoMercadeo', $equipoMercadeo);
    }

    /**
     * Update the specified EquipoMercadeo in storage.
     *
     * @param  int              $id
     * @param UpdateEquipoMercadeoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEquipoMercadeoRequest $request)
    {
        $equipoMercadeo = $this->equipoMercadeoRepository->find($id);

        if (empty($equipoMercadeo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/equiposMercadeo.singular')]));

            return redirect(route('admin.equiposMercadeo.index'));
        }

        $equipoMercadeo = $this->equipoMercadeoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/equiposMercadeo.singular')]));

        return redirect(route('admin.equiposMercadeo.index'));
    }

    /**
     * Remove the specified EquipoMercadeo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipoMercadeo = $this->equipoMercadeoRepository->find($id);

        if (empty($equipoMercadeo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/equiposMercadeo.singular')]));

            return redirect(route('admin.equiposMercadeo.index'));
        }

        $this->equipoMercadeoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/equiposMercadeo.singular')]));

        return redirect(route('admin.equiposMercadeo.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->equipoMercadeoRepository->infoSelect2($request->input('q', ''));
    }

}
