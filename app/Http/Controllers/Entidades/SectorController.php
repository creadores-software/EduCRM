<?php

namespace App\Http\Controllers\Entidades;

use App\DataTables\Entidades\SectorDataTable;
use App\Http\Requests\Entidades;
use App\Http\Requests\Entidades\CreateSectorRequest;
use App\Http\Requests\Entidades\UpdateSectorRequest;
use App\Repositories\Entidades\SectorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SectorController extends AppBaseController
{
    /** @var  SectorRepository */
    private $sectorRepository;

    public function __construct(SectorRepository $sectorRepo)
    {
        $this->sectorRepository = $sectorRepo;
    }

    /**
     * Display a listing of the Sector.
     *
     * @param SectorDataTable $sectorDataTable
     * @return Response
     */
    public function index(SectorDataTable $sectorDataTable)
    {
        return $sectorDataTable->render('entidades.sectores.index');
    }

    /**
     * Show the form for creating a new Sector.
     *
     * @return Response
     */
    public function create()
    {
        return view('entidades.sectores.create');
    }

    /**
     * Store a newly created Sector in storage.
     *
     * @param CreateSectorRequest $request
     *
     * @return Response
     */
    public function store(CreateSectorRequest $request)
    {
        $input = $request->all();

        $sector = $this->sectorRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/sectores.singular')]));

        return redirect(route('entidades.sectores.index'));
    }

    /**
     * Display the specified Sector.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sector = $this->sectorRepository->find($id);

        if (empty($sector)) {
            Flash::error(__('models/sectores.singular').' '.__('messages.not_found'));

            return redirect(route('entidades.sectores.index'));
        }

        $audits = $sector->audits;

        return view('entidades.sectores.show')->with(['sector'=> $sector, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Sector.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sector = $this->sectorRepository->find($id);

        if (empty($sector)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sectores.singular')]));

            return redirect(route('entidades.sectores.index'));
        }

        return view('entidades.sectores.edit')->with('sector', $sector);
    }

    /**
     * Update the specified Sector in storage.
     *
     * @param  int              $id
     * @param UpdateSectorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSectorRequest $request)
    {
        $sector = $this->sectorRepository->find($id);

        if (empty($sector)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sectores.singular')]));

            return redirect(route('entidades.sectores.index'));
        }

        $sector = $this->sectorRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/sectores.singular')]));

        return redirect(route('entidades.sectores.index'));
    }

    /**
     * Remove the specified Sector from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sector = $this->sectorRepository->find($id);

        if (empty($sector)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sectores.singular')]));

            return redirect(route('entidades.sectores.index'));
        }

        $this->sectorRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/sectores.singular')]));

        return redirect(route('entidades.sectores.index'));
    }
}
