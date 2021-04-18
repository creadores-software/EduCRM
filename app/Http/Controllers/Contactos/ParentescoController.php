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
use Illuminate\Http\Request;
use App\Models\Contactos\Contacto;

class ParentescoController extends AppBaseController
{
    /** @var  ParentescoRepository */
    private $parentescoRepository;

    public function __construct(ParentescoRepository $parentescoRepo)
    {
        $this->parentescoRepository = $parentescoRepo;
        $this->middleware('permission:contactos.parentescos.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:contactos.parentescos.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:contactos.parentescos.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:contactos.parentescos.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Parentesco.
     *
     * @param ParentescoDataTable $parentescoDataTable
     * @return Response
     */
    public function index(ParentescoDataTable $parentescoDataTable)
    {
        if ($parentescoDataTable->request()->has('idContacto')) {
            $contacto = Contacto::find($parentescoDataTable->request()->get('idContacto'));
            return $parentescoDataTable->render('contactos.parentescos.index',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto]); 
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un contacto asociado'], 500);     
        }
    }

    /**
     * Show the form for creating a new Parentesco.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            return view('contactos.parentescos.create',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible crear este registro sin un contacto asociado'], 500);     
        } 
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

        return redirect(route('contactos.parentescos.index',['idContacto'=>$request->get('idContacto')]));
    }

    /**
     * Display the specified Parentesco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            $parentesco = $this->parentescoRepository->find($id);

            if (empty($parentesco)) {
                Flash::error(__('models/parentescos.singular').' '.__('messages.not_found'));
    
                return redirect(route('contactos.parentescos.index',['idContacto'=>$request->get('idContacto')]));
            }
    
            $audits = $parentesco->ledgers()->with('user')->get()->sortByDesc('created_at');
    
            return view('contactos.parentescos.show',
                ['idContacto'=>$contacto->id,'contacto'=>$contacto,'audits'=>$audits,'parentesco'=>$parentesco]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin un contacto asociado'], 500);     
        }
    }

    /**
     * Show the form for editing the specified Parentesco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id,Request $request)
    {
        if ($request->has('idContacto')) {
            $contacto = Contacto::find($request->get('idContacto'));
            $parentesco = $this->parentescoRepository->find($id);
            if (empty($parentesco)) {
                Flash::error(__('messages.not_found', ['model' => __('models/parentescos.singular')]));

                return redirect(route('contactos.parentescos.index',['idContacto'=>$contacto->id]));
            }

            return view('contactos.parentescos.edit', 
            ['idContacto'=>$contacto->id,'contacto'=>$contacto,'parentesco'=>$parentesco]);
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible editar este registro sin un contacto asociado'], 500);     
        } 
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

            return redirect(route('contactos.parentescos.index',['idContacto'=>$request->get('idContacto')]));
        }

        $parentesco = $this->parentescoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/parentescos.singular')]));

        return redirect(route('contactos.parentescos.index',['idContacto'=>$request->get('idContacto')]));
    }

    /**
     * Remove the specified Parentesco from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $parentesco = $this->parentescoRepository->find($id);

        if (empty($parentesco)) {
            Flash::error(__('messages.not_found', ['model' => __('models/parentescos.singular')]));

            return redirect(route('contactos.parentescos.index',['idContacto'=>$request->get('idContacto')]));
        }

        $this->parentescoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/parentescos.singular')]));

        return redirect(route('contactos.parentescos.index',['idContacto'=>$request->get('idContacto')]));
    }
}
