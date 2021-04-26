<?php

namespace App\Http\Controllers\Formaciones;

use App\DataTables\Formaciones\JornadaDataTable;
use App\Http\Requests\Formaciones\CreateJornadaRequest;
use App\Http\Requests\Formaciones\UpdateJornadaRequest;
use App\Repositories\Formaciones\JornadaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class JornadaController extends AppBaseController
{
    /** @var  JornadaRepository */
    private $jornadaRepository;

    public function __construct(JornadaRepository $jornadaRepo)
    {
        $this->jornadaRepository = $jornadaRepo;
        $this->middleware('permission:formaciones.jornadas.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:formaciones.jornadas.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:formaciones.jornadas.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:formaciones.jornadas.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Jornada.
     *
     * @param JornadaDataTable $jornadaDataTable
     * @return Response
     */
    public function index(JornadaDataTable $jornadaDataTable)
    {
        return $jornadaDataTable->render('formaciones.jornadas.index');
    }

    /**
     * Show the form for creating a new Jornada.
     *
     * @return Response
     */
    public function create()
    {
        return view('formaciones.jornadas.create');
    }

    /**
     * Store a newly created Jornada in storage.
     *
     * @param CreateJornadaRequest $request
     *
     * @return Response
     */
    public function store(CreateJornadaRequest $request)
    {
        $input = $request->all();

        $jornada = $this->jornadaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/jornadas.singular')]));

        return redirect(route('formaciones.jornadas.index'));
    }

    /**
     * Display the specified Jornada.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jornada = $this->jornadaRepository->find($id);

        if (empty($jornada)) {
            Flash::error(__('messages.not_found', ['model' => __('models/jornadas.singular')]));

            return redirect(route('formaciones.jornadas.index'));
        }
        $audits = $jornada->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('formaciones.jornadas.show')->with(['jornada'=>$jornada,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Jornada.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jornada = $this->jornadaRepository->find($id);

        if (empty($jornada)) {
            Flash::error(__('messages.not_found', ['model' => __('models/jornadas.singular')]));

            return redirect(route('formaciones.jornadas.index'));
        }

        return view('formaciones.jornadas.edit')->with('jornada', $jornada);
    }

    /**
     * Update the specified Jornada in storage.
     *
     * @param  int              $id
     * @param UpdateJornadaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJornadaRequest $request)
    {
        $jornada = $this->jornadaRepository->find($id);

        if (empty($jornada)) {
            Flash::error(__('messages.not_found', ['model' => __('models/jornadas.singular')]));

            return redirect(route('formaciones.jornadas.index'));
        }

        $jornada = $this->jornadaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/jornadas.singular')]));

        return redirect(route('formaciones.jornadas.index'));
    }

    /**
     * Remove the specified Jornada from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jornada = $this->jornadaRepository->find($id);

        if (empty($jornada)) {
            Flash::error(__('messages.not_found', ['model' => __('models/jornadas.singular')]));

            return redirect(route('formaciones.jornadas.index'));
        }

        $this->jornadaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/jornadas.singular')]));

        return redirect(route('formaciones.jornadas.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->jornadaRepository->infoSelect2($request->input('q', ''));
    }

}
