<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\InformacionRelacionalDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreateInformacionRelacionalRequest;
use App\Http\Requests\Contactos\UpdateInformacionRelacionalRequest;
use App\Repositories\Contactos\InformacionRelacionalRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InformacionRelacionalController extends AppBaseController
{
    /** @var  InformacionRelacionalRepository */
    private $informacionRelacionalRepository;

    public function __construct(InformacionRelacionalRepository $informacionRelacionalRepo)
    {
        $this->informacionRelacionalRepository = $informacionRelacionalRepo;
    }

    //Solo se deja métodos de vista y edición pues creación y eliminación se realizará directamente desde el modelo

    /**
     * Display the specified InformacionRelacional.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $informacionRelacional = $this->informacionRelacionalRepository->find($id);

        if (empty($informacionRelacional)) {
            Flash::error(__('models/informacionesRelacionales.singular').' '.__('messages.not_found'));

            return redirect(route('contactos.informacionesRelacionales.index'));
        }

        $audits = $informacionRelacional->audits;

        return view('contactos.informaciones_relacionales.show')->with(['informacionRelacional'=> $informacionRelacional, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified InformacionRelacional.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $informacionRelacional = $this->informacionRelacionalRepository->find($id);

        if (empty($informacionRelacional)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesRelacionales.singular')]));

            return redirect(route('contactos.informacionesRelacionales.index'));
        }

        return view('contactos.informaciones_relacionales.edit')->with('informacionRelacional', $informacionRelacional);
    }

    /**
     * Update the specified InformacionRelacional in storage.
     *
     * @param  int              $id
     * @param UpdateInformacionRelacionalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInformacionRelacionalRequest $request)
    {
        $informacionRelacional = $this->informacionRelacionalRepository->find($id);

        if (empty($informacionRelacional)) {
            Flash::error(__('messages.not_found', ['model' => __('models/informacionesRelacionales.singular')]));

            return redirect(route('contactos.informacionesRelacionales.index'));
        }

        $informacionRelacional = $this->informacionRelacionalRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/informacionesRelacionales.singular')]));

        return redirect(route('contactos.informacionesRelacionales.show',$informacionRelacional->id));
    }
}
