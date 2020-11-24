<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\PreferenciaActividadOcioDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreatePreferenciaActividadOcioRequest;
use App\Http\Requests\Contactos\UpdatePreferenciaActividadOcioRequest;
use App\Repositories\Contactos\PreferenciaActividadOcioRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PreferenciaActividadOcioController extends AppBaseController
{
    /** @var  PreferenciaActividadOcioRepository */
    private $preferenciaActividadOcioRepository;

    public function __construct(PreferenciaActividadOcioRepository $preferenciaActividadOcioRepo)
    {
        $this->preferenciaActividadOcioRepository = $preferenciaActividadOcioRepo;
    }

    /**
     * Display a listing of the PreferenciaActividadOcio.
     *
     * @param PreferenciaActividadOcioDataTable $preferenciaActividadOcioDataTable
     * @return Response
     */
    public function index(PreferenciaActividadOcioDataTable $preferenciaActividadOcioDataTable)
    {
        return $preferenciaActividadOcioDataTable->render('contactos.preferencias_actividades_ocio.index');
    }

    /**
     * Show the form for creating a new PreferenciaActividadOcio.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactos.preferencias_actividades_ocio.create');
    }

    /**
     * Store a newly created PreferenciaActividadOcio in storage.
     *
     * @param CreatePreferenciaActividadOcioRequest $request
     *
     * @return Response
     */
    public function store(CreatePreferenciaActividadOcioRequest $request)
    {
        $input = $request->all();

        $preferenciaActividadOcio = $this->preferenciaActividadOcioRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/preferenciasActividadesOcio.singular')]));

        return redirect(route('contactos.preferenciasActividadesOcio.index'));
    }

    /**
     * Display the specified PreferenciaActividadOcio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $preferenciaActividadOcio = $this->preferenciaActividadOcioRepository->find($id);

        if (empty($preferenciaActividadOcio)) {
            Flash::error(__('models/preferenciasActividadesOcio.singular').' '.__('messages.not_found'));

            return redirect(route('contactos.preferenciasActividadesOcio.index'));
        }

        $audits = $preferenciaActividadOcio->audits;

        return view('contactos.preferencias_actividades_ocio.show')->with(['genero'=> $preferenciaActividadOcio, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified PreferenciaActividadOcio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $preferenciaActividadOcio = $this->preferenciaActividadOcioRepository->find($id);

        if (empty($preferenciaActividadOcio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/preferenciasActividadesOcio.singular')]));

            return redirect(route('contactos.preferenciasActividadesOcio.index'));
        }

        return view('contactos.preferencias_actividades_ocio.edit')->with('preferenciaActividadOcio', $preferenciaActividadOcio);
    }

    /**
     * Update the specified PreferenciaActividadOcio in storage.
     *
     * @param  int              $id
     * @param UpdatePreferenciaActividadOcioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePreferenciaActividadOcioRequest $request)
    {
        $preferenciaActividadOcio = $this->preferenciaActividadOcioRepository->find($id);

        if (empty($preferenciaActividadOcio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/preferenciasActividadesOcio.singular')]));

            return redirect(route('contactos.preferenciasActividadesOcio.index'));
        }

        $preferenciaActividadOcio = $this->preferenciaActividadOcioRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/preferenciasActividadesOcio.singular')]));

        return redirect(route('contactos.preferenciasActividadesOcio.index'));
    }

    /**
     * Remove the specified PreferenciaActividadOcio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $preferenciaActividadOcio = $this->preferenciaActividadOcioRepository->find($id);

        if (empty($preferenciaActividadOcio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/preferenciasActividadesOcio.singular')]));

            return redirect(route('contactos.preferenciasActividadesOcio.index'));
        }

        $this->preferenciaActividadOcioRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/preferenciasActividadesOcio.singular')]));

        return redirect(route('contactos.preferenciasActividadesOcio.index'));
    }
}
