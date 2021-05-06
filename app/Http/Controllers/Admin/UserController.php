<?php

namespace App\Http\Controllers\Admin;

use Altek\Accountant\Models\Ledger;
use App\Models\Contactos\Segmento;
use App\Models\Admin\User;
use App\DataTables\Admin\UserDataTable;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Repositories\Admin\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->middleware('permission:admin.users.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:admin.users.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:admin.users.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:admin.users.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('admin.users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/users.singular')]));

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(__('messages.not_found', ['model' => __('models/users.singular')]));

            return redirect(route('admin.users.index'));
        }
        $audits = $user->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('admin.users.show')->with(['user'=>$user,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(__('messages.not_found', ['model' => __('models/users.singular')]));

            return redirect(route('admin.users.index'));
        }

        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(__('messages.not_found', ['model' => __('models/users.singular')]));

            return redirect(route('admin.users.index'));
        }

        $inputs=$request->all();        
        if(array_key_exists('password', $inputs) && empty($inputs['password'])){
            unset($inputs['password']);
        }

        $user = $this->userRepository->update($inputs, $id);

        Flash::success(__('messages.updated', ['model' => __('models/users.singular')]));

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);
        $auditoriasUsuario = Ledger::where('user_id',$id)->get();
        $segmentosUsuario = Segmento::where('usuario_id',$id)->get();
        if (empty($user)) {
            Flash::error(__('messages.not_found', ['model' => __('models/users.singular')]));

            return redirect(route('admin.users.index'));
        }

        if ($auditoriasUsuario->count()>0 || $segmentosUsuario->count()>0) {
            Flash::error("No es posible eliminar el usuario {$user->name} pues tiene auditorías o segmentos asociados. Si desea lo puede inactivar");

            return redirect(route('admin.users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/users.singular')]));

        return redirect(route('admin.users.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        $term=$request->input('q', '');  
        $model = new User();        
        $query = $model->newQuery();
        $query->select('id','name as text');
        $query->where('name', 'LIKE', '%'.$term.'%');
        $query->orderBy('text', 'ASC');        
        $coincidentes = $query->get();

        return ['results' => $coincidentes];
    }

}
