<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\MatrizGestionDataTable;
use App\Http\Requests\Campanias\CreateMatrizGestionRequest;
use App\Http\Requests\Campanias\UpdateMatrizGestionRequest;
use App\Repositories\Campanias\MatrizGestionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class MatrizGestionController extends AppBaseController
{
    /** @var  MatrizGestionRepository */
    private $matrizGestionRepository;

    public function __construct(MatrizGestionRepository $matrizGestionRepo)
    {
        $this->matrizGestionRepository = $matrizGestionRepo;
        $this->middleware('permission:campanias.matricesGestion.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.matricesGestion.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:campanias.matricesGestion.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:campanias.matricesGestion.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the MatrizGestion.
     *
     * @param MatrizGestionDataTable $matrizGestionDataTable
     * @return Response
     */
    public function index(MatrizGestionDataTable $matrizGestionDataTable)
    {
        return $matrizGestionDataTable->render('campanias.matrices_gestion.index');
    }

    /**
     * Show the form for creating a new MatrizGestion.
     *
     * @return Response
     */
    public function create()
    {
        return view('campanias.matrices_gestion.create');
    }

    /**
     * Store a newly created MatrizGestion in storage.
     *
     * @param CreateMatrizGestionRequest $request
     *
     * @return Response
     */
    public function store(CreateMatrizGestionRequest $request)
    {
        $input = $request->all();

        $matrizGestion = $this->matrizGestionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/matricesGestion.singular')]));

        return redirect(route('campanias.matricesGestion.index'));
    }

    /**
     * Display the specified MatrizGestion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $matrizGestion = $this->matrizGestionRepository->find($id);

        if (empty($matrizGestion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matricesGestion.singular')]));

            return redirect(route('campanias.matricesGestion.index'));
        }
        $audits = $matrizGestion->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('campanias.matrices_gestion.show')->with(['matrizGestion'=>$matrizGestion,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified MatrizGestion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $matrizGestion = $this->matrizGestionRepository->find($id);

        if (empty($matrizGestion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matricesGestion.singular')]));

            return redirect(route('campanias.matricesGestion.index'));
        }

        return view('campanias.matrices_gestion.edit')->with('matrizGestion', $matrizGestion);
    }

    /**
     * Update the specified MatrizGestion in storage.
     *
     * @param  int              $id
     * @param UpdateMatrizGestionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatrizGestionRequest $request)
    {
        $matrizGestion = $this->matrizGestionRepository->find($id);

        if (empty($matrizGestion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matricesGestion.singular')]));

            return redirect(route('campanias.matricesGestion.index'));
        }

        $matrizGestion = $this->matrizGestionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/matricesGestion.singular')]));

        return redirect(route('campanias.matricesGestion.index'));
    }

    /**
     * Remove the specified MatrizGestion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $matrizGestion = $this->matrizGestionRepository->find($id);

        if (empty($matrizGestion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matricesGestion.singular')]));

            return redirect(route('campanias.matricesGestion.index'));
        }

        $this->matrizGestionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/matricesGestion.singular')]));

        return redirect(route('campanias.matricesGestion.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->matrizGestionRepository->infoSelect2($request->input('q', ''));
    }

}
