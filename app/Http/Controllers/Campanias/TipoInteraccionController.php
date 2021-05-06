<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\TipoInteraccionDataTable;
use App\Http\Requests\Campanias\CreateTipoInteraccionRequest;
use App\Http\Requests\Campanias\UpdateTipoInteraccionRequest;
use App\Repositories\Campanias\TipoInteraccionRepository;
use App\Models\Campanias\EstadoInteraccion;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class TipoInteraccionController extends AppBaseController
{
    /** @var  TipoInteraccionRepository */
    private $tipoInteraccionRepository;

    public function __construct(TipoInteraccionRepository $tipoInteraccionRepo)
    {
        $this->tipoInteraccionRepository = $tipoInteraccionRepo;
        $this->middleware('permission:campanias.tiposInteraccion.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.tiposInteraccion.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:campanias.tiposInteraccion.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:campanias.tiposInteraccion.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the TipoInteraccion.
     *
     * @param TipoInteraccionDataTable $tipoInteraccionDataTable
     * @return Response
     */
    public function index(TipoInteraccionDataTable $tipoInteraccionDataTable)
    {
        return $tipoInteraccionDataTable->render('campanias.tipos_interaccion.index');
    }

    /**
     * Show the form for creating a new TipoInteraccion.
     *
     * @return Response
     */
    public function create()
    {
        $colores = EstadoInteraccion::arrayColores();
        return view('campanias.tipos_interaccion.create')
            ->with(['colores'=>$colores]);
    }

    /**
     * Store a newly created TipoInteraccion in storage.
     *
     * @param CreateTipoInteraccionRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoInteraccionRequest $request)
    {
        $input = $request->all();

        $tipoInteraccion = $this->tipoInteraccionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tiposInteraccion.singular')]));

        return redirect(route('campanias.tiposInteraccion.index'));
    }

    /**
     * Display the specified TipoInteraccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoInteraccion = $this->tipoInteraccionRepository->find($id);
        $colores = EstadoInteraccion::arrayColores();

        if (empty($tipoInteraccion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposInteraccion.singular')]));

            return redirect(route('campanias.tiposInteraccion.index'));
        }
        $audits = $tipoInteraccion->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('campanias.tipos_interaccion.show')
        ->with(['tipoInteraccion'=>$tipoInteraccion,'audits'=>$audits,'colores'=>$colores]);
    }

    /**
     * Show the form for editing the specified TipoInteraccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoInteraccion = $this->tipoInteraccionRepository->find($id);
        $colores = EstadoInteraccion::arrayColores();

        if (empty($tipoInteraccion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposInteraccion.singular')]));

            return redirect(route('campanias.tiposInteraccion.index'));
        }

        return view('campanias.tipos_interaccion.edit')
            ->with(['tipoInteraccion'=>$tipoInteraccion,'colores'=>$colores]);
    }

    /**
     * Update the specified TipoInteraccion in storage.
     *
     * @param  int              $id
     * @param UpdateTipoInteraccionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoInteraccionRequest $request)
    {
        $tipoInteraccion = $this->tipoInteraccionRepository->find($id);

        if (empty($tipoInteraccion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposInteraccion.singular')]));

            return redirect(route('campanias.tiposInteraccion.index'));
        }

        $tipoInteraccion = $this->tipoInteraccionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tiposInteraccion.singular')]));

        return redirect(route('campanias.tiposInteraccion.index'));
    }

    /**
     * Remove the specified TipoInteraccion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoInteraccion = $this->tipoInteraccionRepository->find($id);

        if (empty($tipoInteraccion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposInteraccion.singular')]));

            return redirect(route('campanias.tiposInteraccion.index'));
        }

        $this->tipoInteraccionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tiposInteraccion.singular')]));

        return redirect(route('campanias.tiposInteraccion.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->tipoInteraccionRepository->infoSelect2($request->input('q', ''));
    }

}
