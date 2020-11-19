<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\ContactoTipoContactoDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreateContactoTipoContactoRequest;
use App\Http\Requests\Contactos\UpdateContactoTipoContactoRequest;
use App\Repositories\Contactos\ContactoTipoContactoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ContactoTipoContactoController extends AppBaseController
{
    /** @var  ContactoTipoContactoRepository */
    private $contactoTipoContactoRepository;

    public function __construct(ContactoTipoContactoRepository $contactoTipoContactoRepo)
    {
        $this->contactoTipoContactoRepository = $contactoTipoContactoRepo;
    }

    /**
     * Display a listing of the ContactoTipoContacto.
     *
     * @param ContactoTipoContactoDataTable $contactoTipoContactoDataTable
     * @return Response
     */
    public function index(ContactoTipoContactoDataTable $contactoTipoContactoDataTable)
    {
        return $contactoTipoContactoDataTable->render('contactos.contactos_tipo_contacto.index');
    }

    /**
     * Show the form for creating a new ContactoTipoContacto.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactos.contactos_tipo_contacto.create');
    }

    /**
     * Store a newly created ContactoTipoContacto in storage.
     *
     * @param CreateContactoTipoContactoRequest $request
     *
     * @return Response
     */
    public function store(CreateContactoTipoContactoRequest $request)
    {
        $input = $request->all();

        $contactoTipoContacto = $this->contactoTipoContactoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/contactosTipoContacto.singular')]));

        return redirect(route('contactos.contactosTipoContacto.index'));
    }

    /**
     * Display the specified ContactoTipoContacto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactoTipoContacto = $this->contactoTipoContactoRepository->find($id);

        if (empty($contactoTipoContacto)) {
            Flash::error(__('models/contactosTipoContacto.singular').' '.__('messages.not_found'));

            return redirect(route('contactos.contactosTipoContacto.index'));
        }

        return view('contactos.contactos_tipo_contacto.show')->with('contactoTipoContacto', $contactoTipoContacto);
    }

    /**
     * Show the form for editing the specified ContactoTipoContacto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contactoTipoContacto = $this->contactoTipoContactoRepository->find($id);

        if (empty($contactoTipoContacto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactosTipoContacto.singular')]));

            return redirect(route('contactos.contactosTipoContacto.index'));
        }

        return view('contactos.contactos_tipo_contacto.edit')->with('contactoTipoContacto', $contactoTipoContacto);
    }

    /**
     * Update the specified ContactoTipoContacto in storage.
     *
     * @param  int              $id
     * @param UpdateContactoTipoContactoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactoTipoContactoRequest $request)
    {
        $contactoTipoContacto = $this->contactoTipoContactoRepository->find($id);

        if (empty($contactoTipoContacto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactosTipoContacto.singular')]));

            return redirect(route('contactos.contactosTipoContacto.index'));
        }

        $contactoTipoContacto = $this->contactoTipoContactoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/contactosTipoContacto.singular')]));

        return redirect(route('contactos.contactosTipoContacto.index'));
    }

    /**
     * Remove the specified ContactoTipoContacto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contactoTipoContacto = $this->contactoTipoContactoRepository->find($id);

        if (empty($contactoTipoContacto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactosTipoContacto.singular')]));

            return redirect(route('contactos.contactosTipoContacto.index'));
        }

        $this->contactoTipoContactoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/contactosTipoContacto.singular')]));

        return redirect(route('contactos.contactosTipoContacto.index'));
    }
}
