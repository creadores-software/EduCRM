<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\PreferenciaCampoEducacionDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreatePreferenciaCampoEducacionRequest;
use App\Http\Requests\Contactos\UpdatePreferenciaCampoEducacionRequest;
use App\Repositories\Contactos\PreferenciaCampoEducacionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PreferenciaCampoEducacionController extends AppBaseController
{
    /** @var  PreferenciaCampoEducacionRepository */
    private $preferenciaCampoEducacionRepository;

    public function __construct(PreferenciaCampoEducacionRepository $preferenciaCampoEducacionRepo)
    {
        $this->preferenciaCampoEducacionRepository = $preferenciaCampoEducacionRepo;
    }

    /**
     * Display a listing of the PreferenciaCampoEducacion.
     *
     * @param PreferenciaCampoEducacionDataTable $preferenciaCampoEducacionDataTable
     * @return Response
     */
    public function index(PreferenciaCampoEducacionDataTable $preferenciaCampoEducacionDataTable)
    {
        return $preferenciaCampoEducacionDataTable->render('contactos.preferencias_campos_educacion.index');
    }

    /**
     * Show the form for creating a new PreferenciaCampoEducacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactos.preferencias_campos_educacion.create');
    }

    /**
     * Store a newly created PreferenciaCampoEducacion in storage.
     *
     * @param CreatePreferenciaCampoEducacionRequest $request
     *
     * @return Response
     */
    public function store(CreatePreferenciaCampoEducacionRequest $request)
    {
        $input = $request->all();

        $preferenciaCampoEducacion = $this->preferenciaCampoEducacionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/preferenciasCamposEducacion.singular')]));

        return redirect(route('contactos.preferenciasCamposEducacion.index'));
    }

    /**
     * Display the specified PreferenciaCampoEducacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $preferenciaCampoEducacion = $this->preferenciaCampoEducacionRepository->find($id);

        if (empty($preferenciaCampoEducacion)) {
            Flash::error(__('models/preferenciasCamposEducacion.singular').' '.__('messages.not_found'));

            return redirect(route('contactos.preferenciasCamposEducacion.index'));
        }

        return view('contactos.preferencias_campos_educacion.show')->with('preferenciaCampoEducacion', $preferenciaCampoEducacion);
    }

    /**
     * Show the form for editing the specified PreferenciaCampoEducacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $preferenciaCampoEducacion = $this->preferenciaCampoEducacionRepository->find($id);

        if (empty($preferenciaCampoEducacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/preferenciasCamposEducacion.singular')]));

            return redirect(route('contactos.preferenciasCamposEducacion.index'));
        }

        return view('contactos.preferencias_campos_educacion.edit')->with('preferenciaCampoEducacion', $preferenciaCampoEducacion);
    }

    /**
     * Update the specified PreferenciaCampoEducacion in storage.
     *
     * @param  int              $id
     * @param UpdatePreferenciaCampoEducacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePreferenciaCampoEducacionRequest $request)
    {
        $preferenciaCampoEducacion = $this->preferenciaCampoEducacionRepository->find($id);

        if (empty($preferenciaCampoEducacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/preferenciasCamposEducacion.singular')]));

            return redirect(route('contactos.preferenciasCamposEducacion.index'));
        }

        $preferenciaCampoEducacion = $this->preferenciaCampoEducacionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/preferenciasCamposEducacion.singular')]));

        return redirect(route('contactos.preferenciasCamposEducacion.index'));
    }

    /**
     * Remove the specified PreferenciaCampoEducacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $preferenciaCampoEducacion = $this->preferenciaCampoEducacionRepository->find($id);

        if (empty($preferenciaCampoEducacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/preferenciasCamposEducacion.singular')]));

            return redirect(route('contactos.preferenciasCamposEducacion.index'));
        }

        $this->preferenciaCampoEducacionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/preferenciasCamposEducacion.singular')]));

        return redirect(route('contactos.preferenciasCamposEducacion.index'));
    }
}
