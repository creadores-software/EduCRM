<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\CategoriaOportunidadDataTable;
use App\Models\Campanias\CategoriaOportunidad;
use App\Http\Requests\Campanias\CreateCategoriaOportunidadRequest;
use App\Http\Requests\Campanias\UpdateCategoriaOportunidadRequest;
use App\Repositories\Campanias\CategoriaOportunidadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class CategoriaOportunidadController extends AppBaseController
{
    /** @var  CategoriaOportunidadRepository */
    private $categoriaOportunidadRepository;

    public function __construct(CategoriaOportunidadRepository $categoriaOportunidadRepo)
    {
        $this->categoriaOportunidadRepository = $categoriaOportunidadRepo;
        $this->middleware('permission:campanias.categoriasOportunidad.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.categoriasOportunidad.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:campanias.categoriasOportunidad.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:campanias.categoriasOportunidad.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the CategoriaOportunidad.
     *
     * @param CategoriaOportunidadDataTable $categoriaOportunidadDataTable
     * @return Response
     */
    public function index(CategoriaOportunidadDataTable $categoriaOportunidadDataTable)
    {
        return $categoriaOportunidadDataTable->render('campanias.categorias_oportunidad.index');
    }

    /**
     * Show the form for creating a new CategoriaOportunidad.
     *
     * @return Response
     */
    public function create()
    {
        return view('campanias.categorias_oportunidad.create');
    }

    /**
     * Store a newly created CategoriaOportunidad in storage.
     *
     * @param CreateCategoriaOportunidadRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoriaOportunidadRequest $request)
    {
        $input = $request->all();

        $categoriaOportunidad = $this->categoriaOportunidadRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/categoriasOportunidad.singular')]));

        return redirect(route('campanias.categoriasOportunidad.index'));
    }

    /**
     * Display the specified CategoriaOportunidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoriaOportunidad = $this->categoriaOportunidadRepository->find($id);

        if (empty($categoriaOportunidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categoriasOportunidad.singular')]));

            return redirect(route('campanias.categoriasOportunidad.index'));
        }
        $audits = $categoriaOportunidad->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('campanias.categorias_oportunidad.show')->with(['categoriaOportunidad'=>$categoriaOportunidad,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified CategoriaOportunidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categoriaOportunidad = $this->categoriaOportunidadRepository->find($id);

        if (empty($categoriaOportunidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categoriasOportunidad.singular')]));

            return redirect(route('campanias.categoriasOportunidad.index'));
        }

        return view('campanias.categorias_oportunidad.edit')->with('categoriaOportunidad', $categoriaOportunidad);
    }

    /**
     * Update the specified CategoriaOportunidad in storage.
     *
     * @param  int              $id
     * @param UpdateCategoriaOportunidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoriaOportunidadRequest $request)
    {
        $categoriaOportunidad = $this->categoriaOportunidadRepository->find($id);

        if (empty($categoriaOportunidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categoriasOportunidad.singular')]));

            return redirect(route('campanias.categoriasOportunidad.index'));
        }

        $categoriaOportunidad = $this->categoriaOportunidadRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/categoriasOportunidad.singular')]));

        return redirect(route('campanias.categoriasOportunidad.index'));
    }

    /**
     * Remove the specified CategoriaOportunidad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categoriaOportunidad = $this->categoriaOportunidadRepository->find($id);

        if (empty($categoriaOportunidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categoriasOportunidad.singular')]));

            return redirect(route('campanias.categoriasOportunidad.index'));
        }

        $this->categoriaOportunidadRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/categoriasOportunidad.singular')]));

        return redirect(route('campanias.categoriasOportunidad.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->categoriaOportunidadRepository->infoSelect2($request->input('q', ''));
    }

    /**
     * Obtiene la lista de filtros
     */
    public function categoriaPorDatos(Request $request)
    {
        $capacidad=$request->input('capacidad', '');
        $interes=$request->input('interes', '');
        $resultado=[];
        if(!empty($capacidad) && !empty($interes)){
            $categoria = CategoriaOportunidad::
                 where('interes_minimo','<=',intval($interes))
                ->where('interes_maximo','>=',intval($interes))
                ->where('capacidad_minima','<=',intval($capacidad))
                ->where('capacidad_maxima','>=',intval($capacidad))
                ->first();
            if(!empty($categoria)){
                $resultado=['id'=>$categoria->id,'nombre'=>$categoria->nombre];
            }
        }
        return $resultado;
    }

}
