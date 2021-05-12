<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PermissionDataTable;
use App\Http\Requests\Admin\CreatePermissionRequest;
use App\Http\Requests\Admin\UpdatePermissionRequest;
use App\Repositories\Admin\PermissionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;
use Spatie\Permission\Models\Permission;

class PermissionController extends AppBaseController
{
    /** @var  PermissionRepository */
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepository = $permissionRepo;
        $this->middleware('permission:admin.permissions.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:admin.permissions.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:admin.permissions.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:admin.permissions.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Permission.
     *
     * @param PermissionDataTable $permissionDataTable
     * @return Response
     */
    public function index(PermissionDataTable $permissionDataTable)
    {
        return $permissionDataTable->render('admin.permissions.index');
    }

    /**
     * Show the form for creating a new Permission.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param CreatePermissionRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionRequest $request)
    {
        $input = $request->all();

        $permission = $this->permissionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/permissions.singular')]));

        return redirect(route('admin.permissions.index'));
    }

    /**
     * Display the specified Permission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error(__('messages.not_found', ['model' => __('models/permissions.singular')]));

            return redirect(route('admin.permissions.index'));
        }
        return view('admin.permissions.show')->with(['permission'=>$permission]);
    }

    /**
     * Show the form for editing the specified Permission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error(__('messages.not_found', ['model' => __('models/permissions.singular')]));

            return redirect(route('admin.permissions.index'));
        }

        return view('admin.permissions.edit')->with('permission', $permission);
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param  int              $id
     * @param UpdatePermissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionRequest $request)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error(__('messages.not_found', ['model' => __('models/permissions.singular')]));

            return redirect(route('admin.permissions.index'));
        }

        $permission = $this->permissionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/permissions.singular')]));

        return redirect(route('admin.permissions.index'));
    }

    /**
     * Remove the specified Permission from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error(__('messages.not_found', ['model' => __('models/permissions.singular')]));

            return redirect(route('admin.permissions.index'));
        }

        $this->permissionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/permissions.singular')]));

        return redirect(route('admin.permissions.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        $term=$request->input('q', ''); 
        $name="name";
        $page=$request->input('page', ''); 
        return $this->permissionRepository->infoSelect2($term,null,null,null,['text','ASC'],$name,$page);
    }

}
