<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\SisbenDataTable;
use App\Http\Requests\Parametros\CreateSisbenRequest;
use App\Http\Requests\Parametros\UpdateSisbenRequest;
use App\Repositories\Parametros\SisbenRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class SisbenController extends AppBaseController
{
    /** @var  SisbenRepository */
    private $sisbenRepository;

    public function __construct(SisbenRepository $sisbenRepo)
    {
        $this->sisbenRepository = $sisbenRepo;
        $this->middleware('permission:parametros.sisbenes.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:parametros.sisbenes.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:parametros.sisbenes.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:parametros.sisbenes.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Sisben.
     *
     * @param SisbenDataTable $sisbenDataTable
     * @return Response
     */
    public function index(SisbenDataTable $sisbenDataTable)
    {
        return $sisbenDataTable->render('parametros.sisbenes.index');
    }

    /**
     * Show the form for creating a new Sisben.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.sisbenes.create');
    }

    /**
     * Store a newly created Sisben in storage.
     *
     * @param CreateSisbenRequest $request
     *
     * @return Response
     */
    public function store(CreateSisbenRequest $request)
    {
        $input = $request->all();

        $sisben = $this->sisbenRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/sisbenes.singular')]));

        return redirect(route('parametros.sisbenes.index'));
    }

    /**
     * Display the specified Sisben.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sisben = $this->sisbenRepository->find($id);

        if (empty($sisben)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sisbenes.singular')]));

            return redirect(route('parametros.sisbenes.index'));
        }
        $audits = $sisben->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('parametros.sisbenes.show')->with(['sisben'=>$sisben,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Sisben.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sisben = $this->sisbenRepository->find($id);

        if (empty($sisben)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sisbenes.singular')]));

            return redirect(route('parametros.sisbenes.index'));
        }

        return view('parametros.sisbenes.edit')->with('sisben', $sisben);
    }

    /**
     * Update the specified Sisben in storage.
     *
     * @param  int              $id
     * @param UpdateSisbenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSisbenRequest $request)
    {
        $sisben = $this->sisbenRepository->find($id);

        if (empty($sisben)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sisbenes.singular')]));

            return redirect(route('parametros.sisbenes.index'));
        }

        $sisben = $this->sisbenRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/sisbenes.singular')]));

        return redirect(route('parametros.sisbenes.index'));
    }

    /**
     * Remove the specified Sisben from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sisben = $this->sisbenRepository->find($id);

        if (empty($sisben)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sisbenes.singular')]));

            return redirect(route('parametros.sisbenes.index'));
        }

        $this->sisbenRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/sisbenes.singular')]));

        return redirect(route('parametros.sisbenes.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->sisbenRepository->infoSelect2($request->input('q', ''));
    }

}
