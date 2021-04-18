<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\MedioComunicacionDataTable;
use App\Http\Requests\Parametros\CreateMedioComunicacionRequest;
use App\Http\Requests\Parametros\UpdateMedioComunicacionRequest;
use App\Repositories\Parametros\MedioComunicacionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class MedioComunicacionController extends AppBaseController
{
    /** @var  MedioComunicacionRepository */
    private $medioComunicacionRepository;

    public function __construct(MedioComunicacionRepository $medioComunicacionRepo)
    {
        $this->medioComunicacionRepository = $medioComunicacionRepo;
        $this->middleware('permission:parametros.mediosComunicacion.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:parametros.mediosComunicacion.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:parametros.mediosComunicacion.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:parametros.mediosComunicacion.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the MedioComunicacion.
     *
     * @param MedioComunicacionDataTable $medioComunicacionDataTable
     * @return Response
     */
    public function index(MedioComunicacionDataTable $medioComunicacionDataTable)
    {
        return $medioComunicacionDataTable->render('parametros.medios_comunicacion.index');
    }

    /**
     * Show the form for creating a new MedioComunicacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.medios_comunicacion.create');
    }

    /**
     * Store a newly created MedioComunicacion in storage.
     *
     * @param CreateMedioComunicacionRequest $request
     *
     * @return Response
     */
    public function store(CreateMedioComunicacionRequest $request)
    {
        $input = $request->all();

        $medioComunicacion = $this->medioComunicacionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/mediosComunicacion.singular')]));

        return redirect(route('parametros.mediosComunicacion.index'));
    }

    /**
     * Display the specified MedioComunicacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $medioComunicacion = $this->medioComunicacionRepository->find($id);

        if (empty($medioComunicacion)) {
            Flash::error(__('models/mediosComunicacion.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.mediosComunicacion.index'));
        }

        $audits = $medioComunicacion->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('parametros.medios_comunicacion.show')->with(['medioComunicacion'=> $medioComunicacion, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified MedioComunicacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $medioComunicacion = $this->medioComunicacionRepository->find($id);

        if (empty($medioComunicacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/mediosComunicacion.singular')]));

            return redirect(route('parametros.mediosComunicacion.index'));
        }

        return view('parametros.medios_comunicacion.edit')->with('medioComunicacion', $medioComunicacion);
    }

    /**
     * Update the specified MedioComunicacion in storage.
     *
     * @param  int              $id
     * @param UpdateMedioComunicacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMedioComunicacionRequest $request)
    {
        $medioComunicacion = $this->medioComunicacionRepository->find($id);

        if (empty($medioComunicacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/mediosComunicacion.singular')]));

            return redirect(route('parametros.mediosComunicacion.index'));
        }

        $medioComunicacion = $this->medioComunicacionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/mediosComunicacion.singular')]));

        return redirect(route('parametros.mediosComunicacion.index'));
    }

    /**
     * Remove the specified MedioComunicacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $medioComunicacion = $this->medioComunicacionRepository->find($id);

        if (empty($medioComunicacion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/mediosComunicacion.singular')]));

            return redirect(route('parametros.mediosComunicacion.index'));
        }

        $this->medioComunicacionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/mediosComunicacion.singular')]));

        return redirect(route('parametros.mediosComunicacion.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->medioComunicacionRepository->infoSelect2($request->input('q', ''));
    }
}
