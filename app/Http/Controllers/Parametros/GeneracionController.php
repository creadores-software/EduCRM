<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\GeneracionDataTable;
use App\Http\Requests\Parametros;
use App\Http\Requests\Parametros\CreateGeneracionRequest;
use App\Http\Requests\Parametros\UpdateGeneracionRequest;
use App\Repositories\Parametros\GeneracionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GeneracionController extends AppBaseController
{
    /** @var  GeneracionRepository */
    private $generacionRepository;

    public function __construct(GeneracionRepository $generacionRepo)
    {
        $this->generacionRepository = $generacionRepo;
    }

    /**
     * Display a listing of the Generacion.
     *
     * @param GeneracionDataTable $generacionDataTable
     * @return Response
     */
    public function index(GeneracionDataTable $generacionDataTable)
    {
        return $generacionDataTable->render('parametros.generaciones.index');
    }

    /**
     * Show the form for creating a new Generacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.generaciones.create');
    }

    /**
     * Store a newly created Generacion in storage.
     *
     * @param CreateGeneracionRequest $request
     *
     * @return Response
     */
    public function store(CreateGeneracionRequest $request)
    {
        $input = $request->all();

        $generacion = $this->generacionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/generaciones.singular')]));

        return redirect(route('parametros.generaciones.index'));
    }

    /**
     * Display the specified Generacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $generacion = $this->generacionRepository->find($id);

        if (empty($generacion)) {
            Flash::error(__('models/generaciones.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.generaciones.index'));
        }

        return view('parametros.generaciones.show')->with('generacion', $generacion);
    }

    /**
     * Show the form for editing the specified Generacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $generacion = $this->generacionRepository->find($id);

        if (empty($generacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/generaciones.singular')]));

            return redirect(route('parametros.generaciones.index'));
        }

        return view('parametros.generaciones.edit')->with('generacion', $generacion);
    }

    /**
     * Update the specified Generacion in storage.
     *
     * @param  int              $id
     * @param UpdateGeneracionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGeneracionRequest $request)
    {
        $generacion = $this->generacionRepository->find($id);

        if (empty($generacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/generaciones.singular')]));

            return redirect(route('parametros.generaciones.index'));
        }

        $generacion = $this->generacionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/generaciones.singular')]));

        return redirect(route('parametros.generaciones.index'));
    }

    /**
     * Remove the specified Generacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $generacion = $this->generacionRepository->find($id);

        if (empty($generacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/generaciones.singular')]));

            return redirect(route('parametros.generaciones.index'));
        }

        $this->generacionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/generaciones.singular')]));

        return redirect(route('parametros.generaciones.index'));
    }
}
