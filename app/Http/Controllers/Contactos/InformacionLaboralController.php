<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\InformacionLaboralDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreateInformacionLaboralRequest;
use App\Http\Requests\Contactos\UpdateInformacionLaboralRequest;
use App\Repositories\Contactos\InformacionLaboralRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InformacionLaboralController extends AppBaseController
{
    /** @var  InformacionLaboralRepository */
    private $informacionLaboralRepository;

    public function __construct(InformacionLaboralRepository $informacionLaboralRepo)
    {
        $this->informacionLaboralRepository = $informacionLaboralRepo;
    }

    /**
     * Display a listing of the InformacionLaboral.
     *
     * @param InformacionLaboralDataTable $informacionLaboralDataTable
     * @return Response
     */
    public function index(InformacionLaboralDataTable $informacionLaboralDataTable)
    {
        return $informacionLaboralDataTable->render('contactos.informaciones_laborales.index');
    }

    /**
     * Show the form for creating a new InformacionLaboral.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactos.informaciones_laborales.create');
    }

    /**
     * Store a newly created InformacionLaboral in storage.
     *
     * @param CreateInformacionLaboralRequest $request
     *
     * @return Response
     */
    public function store(CreateInformacionLaboralRequest $request)
    {
        $input = $request->all();

        $informacionLaboral = $this->informacionLaboralRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/informacionesLaborales.singular')]));

        return redirect(route('contactos.informacionesLaborales.index'));
    }

    /**
     * Display the specified InformacionLaboral.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $informacionLaboral = $this->informacionLaboralRepository->find($id);

        if (empty($informacionLaboral)) {
            Flash::error(__('models/informacionesLaborales.singular').' '.__('messages.not_found'));

            return redirect(route('contactos.informacionesLaborales.index'));
        }

        $audits = $informacionLaboral->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('contactos.informaciones_laborales.show')->with(['informacionLaboral'=> $informacionLaboral, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified InformacionLaboral.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $informacionLaboral = $this->informacionLaboralRepository->find($id);

        if (empty($informacionLaboral)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesLaborales.singular')]));

            return redirect(route('contactos.informacionesLaborales.index'));
        }

        return view('contactos.informaciones_laborales.edit')->with('informacionLaboral', $informacionLaboral);
    }

    /**
     * Update the specified InformacionLaboral in storage.
     *
     * @param  int              $id
     * @param UpdateInformacionLaboralRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInformacionLaboralRequest $request)
    {
        $informacionLaboral = $this->informacionLaboralRepository->find($id);

        if (empty($informacionLaboral)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesLaborales.singular')]));

            return redirect(route('contactos.informacionesLaborales.index'));
        }

        $informacionLaboral = $this->informacionLaboralRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/informacionesLaborales.singular')]));

        return redirect(route('contactos.informacionesLaborales.index'));
    }

    /**
     * Remove the specified InformacionLaboral from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $informacionLaboral = $this->informacionLaboralRepository->find($id);

        if (empty($informacionLaboral)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesLaborales.singular')]));

            return redirect(route('contactos.informacionesLaborales.index'));
        }

        $this->informacionLaboralRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/informacionesLaborales.singular')]));

        return redirect(route('contactos.informacionesLaborales.index'));
    }
}
