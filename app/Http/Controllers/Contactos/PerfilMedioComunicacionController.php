<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\PerfilMedioComunicacionDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreatePerfilMedioComunicacionRequest;
use App\Http\Requests\Contactos\UpdatePerfilMedioComunicacionRequest;
use App\Repositories\Contactos\PerfilMedioComunicacionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PerfilMedioComunicacionController extends AppBaseController
{
    /** @var  PerfilMedioComunicacionRepository */
    private $perfilMedioComunicacionRepository;

    public function __construct(PerfilMedioComunicacionRepository $perfilMedioComunicacionRepo)
    {
        $this->perfilMedioComunicacionRepository = $perfilMedioComunicacionRepo;
    }

    /**
     * Display a listing of the PerfilMedioComunicacion.
     *
     * @param PerfilMedioComunicacionDataTable $perfilMedioComunicacionDataTable
     * @return Response
     */
    public function index(PerfilMedioComunicacionDataTable $perfilMedioComunicacionDataTable)
    {
        return $perfilMedioComunicacionDataTable->render('contactos.perfiles_medio_comunicacion.index');
    }

    /**
     * Show the form for creating a new PerfilMedioComunicacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactos.perfiles_medio_comunicacion.create');
    }

    /**
     * Store a newly created PerfilMedioComunicacion in storage.
     *
     * @param CreatePerfilMedioComunicacionRequest $request
     *
     * @return Response
     */
    public function store(CreatePerfilMedioComunicacionRequest $request)
    {
        $input = $request->all();

        $perfilMedioComunicacion = $this->perfilMedioComunicacionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/perfilesMedioComunicacion.singular')]));

        return redirect(route('contactos.perfilesMedioComunicacion.index'));
    }

    /**
     * Display the specified PerfilMedioComunicacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $perfilMedioComunicacion = $this->perfilMedioComunicacionRepository->find($id);

        if (empty($perfilMedioComunicacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/perfilesMedioComunicacion.singular')]));

            return redirect(route('contactos.perfilesMedioComunicacion.index'));
        }
        $audits = $perfilMedioComunicacion->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('contactos.perfiles_medio_comunicacion.show')->with(['perfilMedioComunicacion'=>$perfilMedioComunicacion, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified PerfilMedioComunicacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $perfilMedioComunicacion = $this->perfilMedioComunicacionRepository->find($id);

        if (empty($perfilMedioComunicacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/perfilesMedioComunicacion.singular')]));

            return redirect(route('contactos.perfilesMedioComunicacion.index'));
        }

        return view('contactos.perfiles_medio_comunicacion.edit')->with('perfilMedioComunicacion', $perfilMedioComunicacion);
    }

    /**
     * Update the specified PerfilMedioComunicacion in storage.
     *
     * @param  int              $id
     * @param UpdatePerfilMedioComunicacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePerfilMedioComunicacionRequest $request)
    {
        $perfilMedioComunicacion = $this->perfilMedioComunicacionRepository->find($id);

        if (empty($perfilMedioComunicacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/perfilesMedioComunicacion.singular')]));

            return redirect(route('contactos.perfilesMedioComunicacion.index'));
        }

        $perfilMedioComunicacion = $this->perfilMedioComunicacionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/perfilesMedioComunicacion.singular')]));

        return redirect(route('contactos.perfilesMedioComunicacion.index'));
    }

    /**
     * Remove the specified PerfilMedioComunicacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $perfilMedioComunicacion = $this->perfilMedioComunicacionRepository->find($id);

        if (empty($perfilMedioComunicacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/perfilesMedioComunicacion.singular')]));

            return redirect(route('contactos.perfilesMedioComunicacion.index'));
        }

        $this->perfilMedioComunicacionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/perfilesMedioComunicacion.singular')]));

        return redirect(route('contactos.perfilesMedioComunicacion.index'));
    }
}
