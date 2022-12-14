<?php

namespace App\Http\Controllers\Entidades;

use App\DataTables\Entidades\OcupacionDataTable;
use App\Http\Requests\Entidades\CreateOcupacionRequest;
use App\Http\Requests\Entidades\UpdateOcupacionRequest;
use App\Repositories\Entidades\OcupacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class OcupacionController extends AppBaseController
{
    /** @var  OcupacionRepository */
    private $ocupacionRepository;

    public function __construct(OcupacionRepository $ocupacionRepo)
    {
        $this->ocupacionRepository = $ocupacionRepo;
        $this->middleware('permission:entidades.ocupaciones.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:entidades.ocupaciones.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:entidades.ocupaciones.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:entidades.ocupaciones.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Ocupacion.
     *
     * @param OcupacionDataTable $ocupacionDataTable
     * @return Response
     */
    public function index(OcupacionDataTable $ocupacionDataTable)
    {
        return $ocupacionDataTable->render('entidades.ocupaciones.index');
    }

    /**
     * Show the form for creating a new Ocupacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('entidades.ocupaciones.create');
    }

    /**
     * Store a newly created Ocupacion in storage.
     *
     * @param CreateOcupacionRequest $request
     *
     * @return Response
     */
    public function store(CreateOcupacionRequest $request)
    {
        $input = $request->all();

        $ocupacion = $this->ocupacionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ocupaciones.singular')]));

        return redirect(route('entidades.ocupaciones.index'));
    }

    /**
     * Display the specified Ocupacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ocupacion = $this->ocupacionRepository->find($id);

        if (empty($ocupacion)) {
            Flash::error(__('models/ocupaciones.singular').' '.__('messages.not_found'));

            return redirect(route('entidades.ocupaciones.index'));
        }

        $audits = $ocupacion->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('entidades.ocupaciones.show')->with(['ocupacion'=> $ocupacion, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Ocupacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ocupacion = $this->ocupacionRepository->find($id);

        if (empty($ocupacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ocupaciones.singular')]));

            return redirect(route('entidades.ocupaciones.index'));
        }

        return view('entidades.ocupaciones.edit')->with('ocupacion', $ocupacion);
    }

    /**
     * Update the specified Ocupacion in storage.
     *
     * @param  int              $id
     * @param UpdateOcupacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOcupacionRequest $request)
    {
        $ocupacion = $this->ocupacionRepository->find($id);

        if (empty($ocupacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ocupaciones.singular')]));

            return redirect(route('entidades.ocupaciones.index'));
        }

        $ocupacion = $this->ocupacionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ocupaciones.singular')]));

        return redirect(route('entidades.ocupaciones.index'));
    }

    /**
     * Remove the specified Ocupacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ocupacion = $this->ocupacionRepository->find($id);

        if (empty($ocupacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ocupaciones.singular')]));

            return redirect(route('entidades.ocupaciones.index'));
        }

        $this->ocupacionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ocupaciones.singular')]));

        return redirect(route('entidades.ocupaciones.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        $search=null;
        $categoria=$request->input('categoria', '');
        $term=$request->input('q', '');
        if(!empty($categoria)){            
            $search=['tipo_ocupacion_id'=>$categoria];     
        }
        return $this->ocupacionRepository->infoSelect2($term,$search);
    }

}
