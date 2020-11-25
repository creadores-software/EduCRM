<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\ReligionDataTable;
use App\Http\Requests\Parametros\CreateReligionRequest;
use App\Http\Requests\Parametros\UpdateReligionRequest;
use App\Repositories\Parametros\ReligionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class ReligionController extends AppBaseController
{
    /** @var  ReligionRepository */
    private $religionRepository;

    public function __construct(ReligionRepository $religionRepo)
    {
        $this->religionRepository = $religionRepo;
    }

    /**
     * Display a listing of the Religion.
     *
     * @param ReligionDataTable $religionDataTable
     * @return Response
     */
    public function index(ReligionDataTable $religionDataTable)
    {
        return $religionDataTable->render('parametros.religiones.index');
    }

    /**
     * Show the form for creating a new Religion.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.religiones.create');
    }

    /**
     * Store a newly created Religion in storage.
     *
     * @param CreateReligionRequest $request
     *
     * @return Response
     */
    public function store(CreateReligionRequest $request)
    {
        $input = $request->all();

        $religion = $this->religionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/religiones.singular')]));

        return redirect(route('parametros.religiones.index'));
    }

    /**
     * Display the specified Religion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $religion = $this->religionRepository->find($id);

        if (empty($religion)) {
            Flash::error(__('models/religiones.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.religiones.index'));
        }

        $audits = $religion->audits;

        return view('parametros.religiones.show')->with(['religion'=> $religion, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Religion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $religion = $this->religionRepository->find($id);

        if (empty($religion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/religiones.singular')]));

            return redirect(route('parametros.religiones.index'));
        }

        return view('parametros.religiones.edit')->with('religion', $religion);
    }

    /**
     * Update the specified Religion in storage.
     *
     * @param  int              $id
     * @param UpdateReligionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReligionRequest $request)
    {
        $religion = $this->religionRepository->find($id);

        if (empty($religion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/religiones.singular')]));

            return redirect(route('parametros.religiones.index'));
        }

        $religion = $this->religionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/religiones.singular')]));

        return redirect(route('parametros.religiones.index'));
    }

    /**
     * Remove the specified Religion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $religion = $this->religionRepository->find($id);

        if (empty($religion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/religiones.singular')]));

            return redirect(route('parametros.religiones.index'));
        }

        $this->religionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/religiones.singular')]));

        return redirect(route('parametros.religiones.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->religionRepository->infoSelect2($request->input('q', ''));
    }
}
