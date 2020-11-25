<?php

namespace App\Http\Controllers\Entidades;

use App\DataTables\Entidades\CategoriaActividadEconomicaDataTable;
use App\Http\Requests\Entidades\CreateCategoriaActividadEconomicaRequest;
use App\Http\Requests\Entidades\UpdateCategoriaActividadEconomicaRequest;
use App\Repositories\Entidades\CategoriaActividadEconomicaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class CategoriaActividadEconomicaController extends AppBaseController
{
    /** @var  CategoriaActividadEconomicaRepository */
    private $categoriaActividadEconomicaRepository;

    public function __construct(CategoriaActividadEconomicaRepository $categoriaActividadEconomicaRepo)
    {
        $this->categoriaActividadEconomicaRepository = $categoriaActividadEconomicaRepo;
    }

    /**
     * Display a listing of the CategoriaActividadEconomica.
     *
     * @param CategoriaActividadEconomicaDataTable $categoriaActividadEconomicaDataTable
     * @return Response
     */
    public function index(CategoriaActividadEconomicaDataTable $categoriaActividadEconomicaDataTable)
    {
        return $categoriaActividadEconomicaDataTable->render('entidades.categorias_actividad_economica.index');
    }

    /**
     * Show the form for creating a new CategoriaActividadEconomica.
     *
     * @return Response
     */
    public function create()
    {
        return view('entidades.categorias_actividad_economica.create');
    }

    /**
     * Store a newly created CategoriaActividadEconomica in storage.
     *
     * @param CreateCategoriaActividadEconomicaRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoriaActividadEconomicaRequest $request)
    {
        $input = $request->all();

        $categoriaActividadEconomica = $this->categoriaActividadEconomicaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/categoriasActividadEconomica.singular')]));

        return redirect(route('entidades.categoriasActividadEconomica.index'));
    }

    /**
     * Display the specified CategoriaActividadEconomica.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoriaActividadEconomica = $this->categoriaActividadEconomicaRepository->find($id);

        if (empty($categoriaActividadEconomica)) {
            Flash::error(__('models/categoriasActividadEconomica.singular').' '.__('messages.not_found'));

            return redirect(route('entidades.categoriasActividadEconomica.index'));
        }

        $audits = $categoriaActividadEconomica->audits;

        return view('entidades.categorias_actividad_economica.show')->with(['categoriaActividadEconomica'=> $categoriaActividadEconomica, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified CategoriaActividadEconomica.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categoriaActividadEconomica = $this->categoriaActividadEconomicaRepository->find($id);

        if (empty($categoriaActividadEconomica)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categoriasActividadEconomica.singular')]));

            return redirect(route('entidades.categoriasActividadEconomica.index'));
        }

        return view('entidades.categorias_actividad_economica.edit')->with('categoriaActividadEconomica', $categoriaActividadEconomica);
    }

    /**
     * Update the specified CategoriaActividadEconomica in storage.
     *
     * @param  int              $id
     * @param UpdateCategoriaActividadEconomicaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoriaActividadEconomicaRequest $request)
    {
        $categoriaActividadEconomica = $this->categoriaActividadEconomicaRepository->find($id);

        if (empty($categoriaActividadEconomica)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categoriasActividadEconomica.singular')]));

            return redirect(route('entidades.categoriasActividadEconomica.index'));
        }

        $categoriaActividadEconomica = $this->categoriaActividadEconomicaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/categoriasActividadEconomica.singular')]));

        return redirect(route('entidades.categoriasActividadEconomica.index'));
    }

    /**
     * Remove the specified CategoriaActividadEconomica from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categoriaActividadEconomica = $this->categoriaActividadEconomicaRepository->find($id);

        if (empty($categoriaActividadEconomica)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categoriasActividadEconomica.singular')]));

            return redirect(route('entidades.categoriasActividadEconomica.index'));
        }

        $this->categoriaActividadEconomicaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/categoriasActividadEconomica.singular')]));

        return redirect(route('entidades.categoriasActividadEconomica.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->categoriaActividadEconomicaRepository->infoSelect2($request->input('q', ''));
    }

}
