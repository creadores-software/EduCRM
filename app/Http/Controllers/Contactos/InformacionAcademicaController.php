<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\InformacionAcademicaDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreateInformacionAcademicaRequest;
use App\Http\Requests\Contactos\UpdateInformacionAcademicaRequest;
use App\Repositories\Contactos\InformacionAcademicaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InformacionAcademicaController extends AppBaseController
{
    /** @var  InformacionAcademicaRepository */
    private $informacionAcademicaRepository;

    public function __construct(InformacionAcademicaRepository $informacionAcademicaRepo)
    {
        $this->informacionAcademicaRepository = $informacionAcademicaRepo;
    }

    /**
     * Display a listing of the InformacionAcademica.
     *
     * @param InformacionAcademicaDataTable $informacionAcademicaDataTable
     * @return Response
     */
    public function index(InformacionAcademicaDataTable $informacionAcademicaDataTable)
    {
        return $informacionAcademicaDataTable->render('contactos.informaciones_academicas.index');
    }

    /**
     * Show the form for creating a new InformacionAcademica.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactos.informaciones_academicas.create');
    }

    /**
     * Store a newly created InformacionAcademica in storage.
     *
     * @param CreateInformacionAcademicaRequest $request
     *
     * @return Response
     */
    public function store(CreateInformacionAcademicaRequest $request)
    {
        $input = $request->all();

        $informacionAcademica = $this->informacionAcademicaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/informacionesAcademicas.singular')]));

        return redirect(route('contactos.informacionesAcademicas.index'));
    }

    /**
     * Display the specified InformacionAcademica.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $informacionAcademica = $this->informacionAcademicaRepository->find($id);

        if (empty($informacionAcademica)) {
            Flash::error(__('models/informacionesAcademicas.singular').' '.__('messages.not_found'));

            return redirect(route('contactos.informacionesAcademicas.index'));
        }

        $audits = $informacionAcademica->audits;

        return view('contactos.informaciones_academicas.show')->with(['informacionAcademica'=> $informacionAcademica, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified InformacionAcademica.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $informacionAcademica = $this->informacionAcademicaRepository->find($id);

        if (empty($informacionAcademica)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesAcademicas.singular')]));

            return redirect(route('contactos.informacionesAcademicas.index'));
        }

        return view('contactos.informaciones_academicas.edit')->with('informacionAcademica', $informacionAcademica);
    }

    /**
     * Update the specified InformacionAcademica in storage.
     *
     * @param  int              $id
     * @param UpdateInformacionAcademicaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInformacionAcademicaRequest $request)
    {
        $informacionAcademica = $this->informacionAcademicaRepository->find($id);

        if (empty($informacionAcademica)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesAcademicas.singular')]));

            return redirect(route('contactos.informacionesAcademicas.index'));
        }

        $informacionAcademica = $this->informacionAcademicaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/informacionesAcademicas.singular')]));

        return redirect(route('contactos.informacionesAcademicas.index'));
    }

    /**
     * Remove the specified InformacionAcademica from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $informacionAcademica = $this->informacionAcademicaRepository->find($id);

        if (empty($informacionAcademica)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesAcademicas.singular')]));

            return redirect(route('contactos.informacionesAcademicas.index'));
        }

        $this->informacionAcademicaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/informacionesAcademicas.singular')]));

        return redirect(route('contactos.informacionesAcademicas.index'));
    }
}