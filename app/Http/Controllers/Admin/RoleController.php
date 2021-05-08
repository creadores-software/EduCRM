<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RoleDataTable;
use App\Http\Requests\Admin\CreateRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;
use App\Repositories\Admin\RoleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;
use Spatie\Permission\Models\Role;

class RoleController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
        $this->middleware('permission:admin.roles.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:admin.roles.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:admin.roles.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:admin.roles.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Role.
     *
     * @param RoleDataTable $roleDataTable
     * @return Response
     */
    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('admin.roles.index');
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        $role = $this->roleRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/roles.singular')]));

        return redirect(route('admin.roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roles.singular')]));

            return redirect(route('admin.roles.index'));
        }
        return view('admin.roles.show')->with(['role'=>$role]);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->find($id);
        if (empty($role)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roles.singular')]));

            return redirect(route('admin.roles.index'));
        }

        return view('admin.roles.edit')->with('role', $role);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  int              $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roles.singular')]));

            return redirect(route('admin.roles.index'));
        }

        $role = $this->roleRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/roles.singular')]));

        return redirect(route('admin.roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error(__('messages.not_found', ['model' => __('models/roles.singular')]));

            return redirect(route('admin.roles.index'));
        }

        $this->roleRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/roles.singular')]));

        return redirect(route('admin.roles.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        $term=$request->input('q', ''); 
        $name="name";
        return $this->roleRepository->infoSelect2($term,null,null,null,['text','DESC'],$name);
    }

}
