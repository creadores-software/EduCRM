<?php

namespace App\Http\Controllers\Formaciones;

use App\DataTables\Formaciones\CampoEducacionDataTable;
use App\Http\Requests\Formaciones;
use App\Http\Requests\Formaciones\CreateCampoEducacionRequest;
use App\Http\Requests\Formaciones\UpdateCampoEducacionRequest;
use App\Repositories\Formaciones\CampoEducacionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CampoEducacionController extends AppBaseController
{
    /** @var  CampoEducacionRepository */
    private $campoEducacionRepository;

    public function __construct(CampoEducacionRepository $campoEducacionRepo)
    {
        $this->campoEducacionRepository = $campoEducacionRepo;
    }

    /**
     * Display a listing of the CampoEducacion.
     *
     * @param CampoEducacionDataTable $campoEducacionDataTable
     * @return Response
     */
    public function index(CampoEducacionDataTable $campoEducacionDataTable)
    {
        return $campoEducacionDataTable->render('formaciones.campos_educacion.index');
    }

    /**
     * Show the form for creating a new CampoEducacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('formaciones.campos_educacion.create');
    }

    /**
     * Store a newly created CampoEducacion in storage.
     *
     * @param CreateCampoEducacionRequest $request
     *
     * @return Response
     */
    public function store(CreateCampoEducacionRequest $request)
    {
        $input = $request->all();

        $campoEducacion = $this->campoEducacionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/camposEducacion.singular')]));

        return redirect(route('formaciones.camposEducacion.index'));
    }

    /**
     * Display the specified CampoEducacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $campoEducacion = $this->campoEducacionRepository->find($id);

        if (empty($campoEducacion)) {
            Flash::error(__('models/camposEducacion.singular').' '.__('messages.not_found'));

            return redirect(route('formaciones.camposEducacion.index'));
        }

        return view('formaciones.campos_educacion.show')->with('campoEducacion', $campoEducacion);
    }

    /**
     * Show the form for editing the specified CampoEducacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $campoEducacion = $this->campoEducacionRepository->find($id);

        if (empty($campoEducacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/camposEducacion.singular')]));

            return redirect(route('formaciones.camposEducacion.index'));
        }

        return view('formaciones.campos_educacion.edit')->with('campoEducacion', $campoEducacion);
    }

    /**
     * Update the specified CampoEducacion in storage.
     *
     * @param  int              $id
     * @param UpdateCampoEducacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCampoEducacionRequest $request)
    {
        $campoEducacion = $this->campoEducacionRepository->find($id);

        if (empty($campoEducacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/camposEducacion.singular')]));

            return redirect(route('formaciones.camposEducacion.index'));
        }

        $campoEducacion = $this->campoEducacionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/camposEducacion.singular')]));

        return redirect(route('formaciones.camposEducacion.index'));
    }

    /**
     * Remove the specified CampoEducacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $campoEducacion = $this->campoEducacionRepository->find($id);

        if (empty($campoEducacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/camposEducacion.singular')]));

            return redirect(route('formaciones.camposEducacion.index'));
        }

        $this->campoEducacionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/camposEducacion.singular')]));

        return redirect(route('formaciones.camposEducacion.index'));
    }
}
