<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\PreferenciaFormacionDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreatePreferenciaFormacionRequest;
use App\Http\Requests\Contactos\UpdatePreferenciaFormacionRequest;
use App\Repositories\Contactos\PreferenciaFormacionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PreferenciaFormacionController extends AppBaseController
{
    /** @var  PreferenciaFormacionRepository */
    private $preferenciaFormacionRepository;

    public function __construct(PreferenciaFormacionRepository $preferenciaFormacionRepo)
    {
        $this->preferenciaFormacionRepository = $preferenciaFormacionRepo;
    }

    /**
     * Display a listing of the PreferenciaFormacion.
     *
     * @param PreferenciaFormacionDataTable $preferenciaFormacionDataTable
     * @return Response
     */
    public function index(PreferenciaFormacionDataTable $preferenciaFormacionDataTable)
    {
        return $preferenciaFormacionDataTable->render('contactos.preferencias_formaciones.index');
    }

    /**
     * Show the form for creating a new PreferenciaFormacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactos.preferencias_formaciones.create');
    }

    /**
     * Store a newly created PreferenciaFormacion in storage.
     *
     * @param CreatePreferenciaFormacionRequest $request
     *
     * @return Response
     */
    public function store(CreatePreferenciaFormacionRequest $request)
    {
        $input = $request->all();

        $preferenciaFormacion = $this->preferenciaFormacionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/preferenciasFormaciones.singular')]));

        return redirect(route('contactos.preferenciasFormaciones.index'));
    }

    /**
     * Display the specified PreferenciaFormacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $preferenciaFormacion = $this->preferenciaFormacionRepository->find($id);

        if (empty($preferenciaFormacion)) {
            Flash::error(__('models/preferenciasFormaciones.singular').' '.__('messages.not_found'));

            return redirect(route('contactos.preferenciasFormaciones.index'));
        }

        return view('contactos.preferencias_formaciones.show')->with('preferenciaFormacion', $preferenciaFormacion);
    }

    /**
     * Show the form for editing the specified PreferenciaFormacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $preferenciaFormacion = $this->preferenciaFormacionRepository->find($id);

        if (empty($preferenciaFormacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/preferenciasFormaciones.singular')]));

            return redirect(route('contactos.preferenciasFormaciones.index'));
        }

        return view('contactos.preferencias_formaciones.edit')->with('preferenciaFormacion', $preferenciaFormacion);
    }

    /**
     * Update the specified PreferenciaFormacion in storage.
     *
     * @param  int              $id
     * @param UpdatePreferenciaFormacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePreferenciaFormacionRequest $request)
    {
        $preferenciaFormacion = $this->preferenciaFormacionRepository->find($id);

        if (empty($preferenciaFormacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/preferenciasFormaciones.singular')]));

            return redirect(route('contactos.preferenciasFormaciones.index'));
        }

        $preferenciaFormacion = $this->preferenciaFormacionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/preferenciasFormaciones.singular')]));

        return redirect(route('contactos.preferenciasFormaciones.index'));
    }

    /**
     * Remove the specified PreferenciaFormacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $preferenciaFormacion = $this->preferenciaFormacionRepository->find($id);

        if (empty($preferenciaFormacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/preferenciasFormaciones.singular')]));

            return redirect(route('contactos.preferenciasFormaciones.index'));
        }

        $this->preferenciaFormacionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/preferenciasFormaciones.singular')]));

        return redirect(route('contactos.preferenciasFormaciones.index'));
    }
}
