<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\CampaniaDataTable;
use App\Http\Requests\Campanias\CreateCampaniaRequest;
use App\Http\Requests\Campanias\UpdateCampaniaRequest;
use App\Repositories\Campanias\CampaniaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class CampaniaController extends AppBaseController
{
    /** @var  CampaniaRepository */
    private $campaniaRepository;

    public function __construct(CampaniaRepository $campaniaRepo)
    {
        $this->campaniaRepository = $campaniaRepo;
        $this->middleware('permission:campanias.campanias.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.campanias.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:campanias.campanias.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:campanias.campanias.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Campania.
     *
     * @param CampaniaDataTable $campaniaDataTable
     * @return Response
     */
    public function index(CampaniaDataTable $campaniaDataTable)
    {
        return $campaniaDataTable->render('campanias.campanias.index');
    }

    /**
     * Show the form for creating a new Campania.
     *
     * @return Response
     */
    public function create()
    {
        return view('campanias.campanias.create');
    }

    /**
     * Store a newly created Campania in storage.
     *
     * @param CreateCampaniaRequest $request
     *
     * @return Response
     */
    public function store(CreateCampaniaRequest $request)
    {
        $input = $request->all();

        $campania = $this->campaniaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/campanias.singular')]));

        return redirect(route('campanias.campanias.index'));
    }

    /**
     * Display the specified Campania.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $campania = $this->campaniaRepository->find($id);

        if (empty($campania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/campanias.singular')]));

            return redirect(route('campanias.campanias.index'));
        }
        $audits = $campania->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('campanias.campanias.show')->with(['campania'=>$campania,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Campania.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $campania = $this->campaniaRepository->find($id);

        if (empty($campania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/campanias.singular')]));

            return redirect(route('campanias.campanias.index'));
        }

        return view('campanias.campanias.edit')->with('campania', $campania);
    }

    /**
     * Update the specified Campania in storage.
     *
     * @param  int              $id
     * @param UpdateCampaniaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCampaniaRequest $request)
    {
        $campania = $this->campaniaRepository->find($id);

        if (empty($campania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/campanias.singular')]));

            return redirect(route('campanias.campanias.index'));
        }

        $campania = $this->campaniaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/campanias.singular')]));

        return redirect(route('campanias.campanias.index'));
    }

    /**
     * Remove the specified Campania from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $campania = $this->campaniaRepository->find($id);

        if (empty($campania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/campanias.singular')]));

            return redirect(route('campanias.campanias.index'));
        }

        $this->campaniaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/campanias.singular')]));

        return redirect(route('campanias.campanias.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->campaniaRepository->infoSelect2($request->input('q', ''));
    }

}
