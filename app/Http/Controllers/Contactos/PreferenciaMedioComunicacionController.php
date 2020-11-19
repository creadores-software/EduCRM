<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\PreferenciaMedioComunicacionDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreatePreferenciaMedioComunicacionRequest;
use App\Http\Requests\Contactos\UpdatePreferenciaMedioComunicacionRequest;
use App\Repositories\Contactos\PreferenciaMedioComunicacionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PreferenciaMedioComunicacionController extends AppBaseController
{
    /** @var  PreferenciaMedioComunicacionRepository */
    private $preferenciaMedioComunicacionRepository;

    public function __construct(PreferenciaMedioComunicacionRepository $preferenciaMedioComunicacionRepo)
    {
        $this->preferenciaMedioComunicacionRepository = $preferenciaMedioComunicacionRepo;
    }

    /**
     * Display a listing of the PreferenciaMedioComunicacion.
     *
     * @param PreferenciaMedioComunicacionDataTable $preferenciaMedioComunicacionDataTable
     * @return Response
     */
    public function index(PreferenciaMedioComunicacionDataTable $preferenciaMedioComunicacionDataTable)
    {
        return $preferenciaMedioComunicacionDataTable->render('contactos.preferencias_medios_comunicacion.index');
    }

    /**
     * Show the form for creating a new PreferenciaMedioComunicacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactos.preferencias_medios_comunicacion.create');
    }

    /**
     * Store a newly created PreferenciaMedioComunicacion in storage.
     *
     * @param CreatePreferenciaMedioComunicacionRequest $request
     *
     * @return Response
     */
    public function store(CreatePreferenciaMedioComunicacionRequest $request)
    {
        $input = $request->all();

        $preferenciaMedioComunicacion = $this->preferenciaMedioComunicacionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/preferenciasMediosComunicacion.singular')]));

        return redirect(route('contactos.preferenciasMediosComunicacion.index'));
    }

    /**
     * Display the specified PreferenciaMedioComunicacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $preferenciaMedioComunicacion = $this->preferenciaMedioComunicacionRepository->find($id);

        if (empty($preferenciaMedioComunicacion)) {
            Flash::error(__('models/preferenciasMediosComunicacion.singular').' '.__('messages.not_found'));

            return redirect(route('contactos.preferenciasMediosComunicacion.index'));
        }

        return view('contactos.preferencias_medios_comunicacion.show')->with('preferenciaMedioComunicacion', $preferenciaMedioComunicacion);
    }

    /**
     * Show the form for editing the specified PreferenciaMedioComunicacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $preferenciaMedioComunicacion = $this->preferenciaMedioComunicacionRepository->find($id);

        if (empty($preferenciaMedioComunicacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/preferenciasMediosComunicacion.singular')]));

            return redirect(route('contactos.preferenciasMediosComunicacion.index'));
        }

        return view('contactos.preferencias_medios_comunicacion.edit')->with('preferenciaMedioComunicacion', $preferenciaMedioComunicacion);
    }

    /**
     * Update the specified PreferenciaMedioComunicacion in storage.
     *
     * @param  int              $id
     * @param UpdatePreferenciaMedioComunicacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePreferenciaMedioComunicacionRequest $request)
    {
        $preferenciaMedioComunicacion = $this->preferenciaMedioComunicacionRepository->find($id);

        if (empty($preferenciaMedioComunicacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/preferenciasMediosComunicacion.singular')]));

            return redirect(route('contactos.preferenciasMediosComunicacion.index'));
        }

        $preferenciaMedioComunicacion = $this->preferenciaMedioComunicacionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/preferenciasMediosComunicacion.singular')]));

        return redirect(route('contactos.preferenciasMediosComunicacion.index'));
    }

    /**
     * Remove the specified PreferenciaMedioComunicacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $preferenciaMedioComunicacion = $this->preferenciaMedioComunicacionRepository->find($id);

        if (empty($preferenciaMedioComunicacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/preferenciasMediosComunicacion.singular')]));

            return redirect(route('contactos.preferenciasMediosComunicacion.index'));
        }

        $this->preferenciaMedioComunicacionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/preferenciasMediosComunicacion.singular')]));

        return redirect(route('contactos.preferenciasMediosComunicacion.index'));
    }
}
