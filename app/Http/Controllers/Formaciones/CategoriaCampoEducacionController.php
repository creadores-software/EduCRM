<?php

namespace App\Http\Controllers\Formaciones;

use App\DataTables\Formaciones\CategoriaCampoEducacionDataTable;
use App\Http\Requests\Formaciones\CreateCategoriaCampoEducacionRequest;
use App\Http\Requests\Formaciones\UpdateCategoriaCampoEducacionRequest;
use App\Repositories\Formaciones\CategoriaCampoEducacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class CategoriaCampoEducacionController extends AppBaseController
{
    /** @var  CategoriaCampoEducacionRepository */
    private $categoriaCampoEducacionRepository;

    public function __construct(CategoriaCampoEducacionRepository $categoriaCampoEducacionRepo)
    {
        $this->categoriaCampoEducacionRepository = $categoriaCampoEducacionRepo;
    }

    /**
     * Display a listing of the CategoriaCampoEducacion.
     *
     * @param CategoriaCampoEducacionDataTable $categoriaCampoEducacionDataTable
     * @return Response
     */
    public function index(CategoriaCampoEducacionDataTable $categoriaCampoEducacionDataTable)
    {
        return $categoriaCampoEducacionDataTable->render('formaciones.categorias_campo_educacion.index');
    }

    /**
     * Show the form for creating a new CategoriaCampoEducacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('formaciones.categorias_campo_educacion.create');
    }

    /**
     * Store a newly created CategoriaCampoEducacion in storage.
     *
     * @param CreateCategoriaCampoEducacionRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoriaCampoEducacionRequest $request)
    {
        $input = $request->all();

        $categoriaCampoEducacion = $this->categoriaCampoEducacionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/categoriasCampoEducacion.singular')]));

        return redirect(route('formaciones.categoriasCampoEducacion.index'));
    }

    /**
     * Display the specified CategoriaCampoEducacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categoriaCampoEducacion = $this->categoriaCampoEducacionRepository->find($id);

        if (empty($categoriaCampoEducacion)) {
            Flash::error(__('models/categoriasCampoEducacion.singular').' '.__('messages.not_found'));

            return redirect(route('formaciones.categoriasCampoEducacion.index'));
        }

        $audits = $categoriaCampoEducacion->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('formaciones.categorias_campo_educacion.show')->with(['categoriaCampoEducacion'=> $categoriaCampoEducacion, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified CategoriaCampoEducacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categoriaCampoEducacion = $this->categoriaCampoEducacionRepository->find($id);

        if (empty($categoriaCampoEducacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categoriasCampoEducacion.singular')]));

            return redirect(route('formaciones.categoriasCampoEducacion.index'));
        }

        return view('formaciones.categorias_campo_educacion.edit')->with('categoriaCampoEducacion', $categoriaCampoEducacion);
    }

    /**
     * Update the specified CategoriaCampoEducacion in storage.
     *
     * @param  int              $id
     * @param UpdateCategoriaCampoEducacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoriaCampoEducacionRequest $request)
    {
        $categoriaCampoEducacion = $this->categoriaCampoEducacionRepository->find($id);

        if (empty($categoriaCampoEducacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categoriasCampoEducacion.singular')]));

            return redirect(route('formaciones.categoriasCampoEducacion.index'));
        }

        $categoriaCampoEducacion = $this->categoriaCampoEducacionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/categoriasCampoEducacion.singular')]));

        return redirect(route('formaciones.categoriasCampoEducacion.index'));
    }

    /**
     * Remove the specified CategoriaCampoEducacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categoriaCampoEducacion = $this->categoriaCampoEducacionRepository->find($id);

        if (empty($categoriaCampoEducacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/categoriasCampoEducacion.singular')]));

            return redirect(route('formaciones.categoriasCampoEducacion.index'));
        }

        $this->categoriaCampoEducacionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/categoriasCampoEducacion.singular')]));

        return redirect(route('formaciones.categoriasCampoEducacion.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->categoriaCampoEducacionRepository->infoSelect2($request->input('q', ''));
    }
}
