<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\GeneroDataTable;
use App\Http\Requests\Parametros\CreateGeneroRequest;
use App\Http\Requests\Parametros\UpdateGeneroRequest;
use App\Repositories\Parametros\GeneroRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class GeneroController extends AppBaseController
{
    /** @var  GeneroRepository */
    private $generoRepository;

    public function __construct(GeneroRepository $generoRepo)
    {
        $this->generoRepository = $generoRepo;
    }

    /**
     * Display a listing of the Genero.
     *
     * @param GeneroDataTable $generoDataTable
     * @return Response
     */
    public function index(GeneroDataTable $generoDataTable)
    {
        return $generoDataTable->render('parametros.generos.index');
    }

    /**
     * Show the form for creating a new Genero.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.generos.create');
    }

    /**
     * Store a newly created Genero in storage.
     *
     * @param CreateGeneroRequest $request
     *
     * @return Response
     */
    public function store(CreateGeneroRequest $request)
    {
        $input = $request->all();

        $genero = $this->generoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/generos.singular')]));

        return redirect(route('parametros.generos.index'));
    }

    /**
     * Display the specified Genero.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $genero = $this->generoRepository->find($id);
        

        if (empty($genero)) {
            Flash::error(__('models/generos.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.generos.index'));
        }
        
        $audits = $genero->audits;

        return view('parametros.generos.show')->with(['genero'=> $genero, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Genero.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $genero = $this->generoRepository->find($id);

        if (empty($genero)) {
            Flash::error(__('messages.not_found', ['model' => __('models/generos.singular')]));

            return redirect(route('parametros.generos.index'));
        }

        return view('parametros.generos.edit')->with('genero', $genero);
    }

    /**
     * Update the specified Genero in storage.
     *
     * @param  int              $id
     * @param UpdateGeneroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGeneroRequest $request)
    {
        $genero = $this->generoRepository->find($id);

        if (empty($genero)) {
            Flash::error(__('messages.not_found', ['model' => __('models/generos.singular')]));

            return redirect(route('parametros.generos.index'));
        }

        $genero = $this->generoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/generos.singular')]));

        return redirect(route('parametros.generos.index'));
    }

    /**
     * Remove the specified Genero from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $genero = $this->generoRepository->find($id);

        if (empty($genero)) {
            Flash::error(__('messages.not_found', ['model' => __('models/generos.singular')]));

            return redirect(route('parametros.generos.index'));
        }

        $this->generoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/generos.singular')]));

        return redirect(route('parametros.generos.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->generoRepository->infoSelect2($request->input('q', ''));
    }
}
