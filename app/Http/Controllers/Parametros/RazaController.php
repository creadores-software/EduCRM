<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\RazaDataTable;
use App\Http\Requests\Parametros\CreateRazaRequest;
use App\Http\Requests\Parametros\UpdateRazaRequest;
use App\Repositories\Parametros\RazaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;
class RazaController extends AppBaseController
{
    /** @var  RazaRepository */
    private $razaRepository;

    public function __construct(RazaRepository $razaRepo)
    {
        $this->razaRepository = $razaRepo;
    }

    /**
     * Display a listing of the Raza.
     *
     * @param RazaDataTable $razaDataTable
     * @return Response
     */
    public function index(RazaDataTable $razaDataTable)
    {
        return $razaDataTable->render('parametros.razas.index');
    }

    /**
     * Show the form for creating a new Raza.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.razas.create');
    }

    /**
     * Store a newly created Raza in storage.
     *
     * @param CreateRazaRequest $request
     *
     * @return Response
     */
    public function store(CreateRazaRequest $request)
    {
        $input = $request->all();

        $raza = $this->razaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/razas.singular')]));

        return redirect(route('parametros.razas.index'));
    }

    /**
     * Display the specified Raza.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $raza = $this->razaRepository->find($id);

        if (empty($raza)) {
            Flash::error(__('models/razas.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.razas.index'));
        }

        $audits = $raza->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('parametros.razas.show')->with(['raza'=> $raza, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Raza.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $raza = $this->razaRepository->find($id);

        if (empty($raza)) {
            Flash::error(__('messages.not_found', ['model' => __('models/razas.singular')]));

            return redirect(route('parametros.razas.index'));
        }

        return view('parametros.razas.edit')->with('raza', $raza);
    }

    /**
     * Update the specified Raza in storage.
     *
     * @param  int              $id
     * @param UpdateRazaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRazaRequest $request)
    {
        $raza = $this->razaRepository->find($id);

        if (empty($raza)) {
            Flash::error(__('messages.not_found', ['model' => __('models/razas.singular')]));

            return redirect(route('parametros.razas.index'));
        }

        $raza = $this->razaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/razas.singular')]));

        return redirect(route('parametros.razas.index'));
    }

    /**
     * Remove the specified Raza from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $raza = $this->razaRepository->find($id);

        if (empty($raza)) {
            Flash::error(__('messages.not_found', ['model' => __('models/razas.singular')]));

            return redirect(route('parametros.razas.index'));
        }

        $this->razaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/razas.singular')]));

        return redirect(route('parametros.razas.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->razaRepository->infoSelect2($request->input('q', ''));
    }
}
