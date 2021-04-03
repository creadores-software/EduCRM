<?php

namespace App\Http\Controllers\Formaciones;

use App\DataTables\Formaciones\ModalidadDataTable;
use App\Http\Requests\Formaciones;
use App\Http\Requests\Formaciones\CreateModalidadRequest;
use App\Http\Requests\Formaciones\UpdateModalidadRequest;
use App\Repositories\Formaciones\ModalidadRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ModalidadController extends AppBaseController
{
    /** @var  ModalidadRepository */
    private $modalidadRepository;

    public function __construct(ModalidadRepository $modalidadRepo)
    {
        $this->modalidadRepository = $modalidadRepo;
    }

    /**
     * Display a listing of the Modalidad.
     *
     * @param ModalidadDataTable $modalidadDataTable
     * @return Response
     */
    public function index(ModalidadDataTable $modalidadDataTable)
    {
        return $modalidadDataTable->render('formaciones.modalidades.index');
    }

    /**
     * Show the form for creating a new Modalidad.
     *
     * @return Response
     */
    public function create()
    {
        return view('formaciones.modalidades.create');
    }

    /**
     * Store a newly created Modalidad in storage.
     *
     * @param CreateModalidadRequest $request
     *
     * @return Response
     */
    public function store(CreateModalidadRequest $request)
    {
        $input = $request->all();

        $modalidad = $this->modalidadRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/modalidades.singular')]));

        return redirect(route('formaciones.modalidades.index'));
    }

    /**
     * Display the specified Modalidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modalidad = $this->modalidadRepository->find($id);

        if (empty($modalidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modalidades.singular')]));

            return redirect(route('formaciones.modalidades.index'));
        }
        $audits = $modalidad->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('formaciones.modalidades.show')->with(['modalidad'=>$modalidad, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Modalidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modalidad = $this->modalidadRepository->find($id);

        if (empty($modalidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modalidades.singular')]));

            return redirect(route('formaciones.modalidades.index'));
        }

        return view('formaciones.modalidades.edit')->with('modalidad', $modalidad);
    }

    /**
     * Update the specified Modalidad in storage.
     *
     * @param  int              $id
     * @param UpdateModalidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModalidadRequest $request)
    {
        $modalidad = $this->modalidadRepository->find($id);

        if (empty($modalidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modalidades.singular')]));

            return redirect(route('formaciones.modalidades.index'));
        }

        $modalidad = $this->modalidadRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modalidades.singular')]));

        return redirect(route('formaciones.modalidades.index'));
    }

    /**
     * Remove the specified Modalidad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modalidad = $this->modalidadRepository->find($id);

        if (empty($modalidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modalidades.singular')]));

            return redirect(route('formaciones.modalidades.index'));
        }

        $this->modalidadRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modalidades.singular')]));

        return redirect(route('formaciones.modalidades.index'));
    }
}
