<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\ParentescoDataTable;
use App\Http\Requests\Contactos;
use App\Http\Requests\Contactos\CreateParentescoRequest;
use App\Http\Requests\Contactos\UpdateParentescoRequest;
use App\Repositories\Contactos\ParentescoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ParentescoController extends AppBaseController
{
    /** @var  ParentescoRepository */
    private $parentescoRepository;

    public function __construct(ParentescoRepository $parentescoRepo)
    {
        $this->parentescoRepository = $parentescoRepo;
    }

    /**
     * Display a listing of the Parentesco.
     *
     * @param ParentescoDataTable $parentescoDataTable
     * @return Response
     */
    public function index(ParentescoDataTable $parentescoDataTable)
    {
        return $parentescoDataTable->render('contactos.parentescos.index');
    }

    /**
     * Show the form for creating a new Parentesco.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactos.parentescos.create');
    }

    /**
     * Store a newly created Parentesco in storage.
     *
     * @param CreateParentescoRequest $request
     *
     * @return Response
     */
    public function store(CreateParentescoRequest $request)
    {
        $input = $request->all();

        $parentesco = $this->parentescoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/parentescos.singular')]));

        return redirect(route('contactos.parentescos.index'));
    }

    /**
     * Display the specified Parentesco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $parentesco = $this->parentescoRepository->find($id);

        if (empty($parentesco)) {
            Flash::error(__('models/parentescos.singular').' '.__('messages.not_found'));

            return redirect(route('contactos.parentescos.index'));
        }

        $audits = $parentesco->ledgers()->with('user')->get();

        return view('contactos.parentescos.show')->with(['parentesco'=> $parentesco, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Parentesco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parentesco = $this->parentescoRepository->find($id);

        if (empty($parentesco)) {
            Flash::error(__('messages.not_found', ['model' => __('models/parentescos.singular')]));

            return redirect(route('contactos.parentescos.index'));
        }

        return view('contactos.parentescos.edit')->with('parentesco', $parentesco);
    }

    /**
     * Update the specified Parentesco in storage.
     *
     * @param  int              $id
     * @param UpdateParentescoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParentescoRequest $request)
    {
        $parentesco = $this->parentescoRepository->find($id);

        if (empty($parentesco)) {
            Flash::error(__('messages.not_found', ['model' => __('models/parentescos.singular')]));

            return redirect(route('contactos.parentescos.index'));
        }

        $parentesco = $this->parentescoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/parentescos.singular')]));

        return redirect(route('contactos.parentescos.index'));
    }

    /**
     * Remove the specified Parentesco from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parentesco = $this->parentescoRepository->find($id);

        if (empty($parentesco)) {
            Flash::error(__('messages.not_found', ['model' => __('models/parentescos.singular')]));

            return redirect(route('contactos.parentescos.index'));
        }

        $this->parentescoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/parentescos.singular')]));

        return redirect(route('contactos.parentescos.index'));
    }
}
