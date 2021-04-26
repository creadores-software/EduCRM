<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\TipoCampaniaDataTable;
use App\Http\Requests\Campanias\CreateTipoCampaniaRequest;
use App\Http\Requests\Campanias\UpdateTipoCampaniaRequest;
use App\Repositories\Campanias\TipoCampaniaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class TipoCampaniaController extends AppBaseController
{
    /** @var  TipoCampaniaRepository */
    private $tipoCampaniaRepository;

    public function __construct(TipoCampaniaRepository $tipoCampaniaRepo)
    {
        $this->tipoCampaniaRepository = $tipoCampaniaRepo;
        $this->middleware('permission:campanias.tiposCampania.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.tiposCampania.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:campanias.tiposCampania.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:campanias.tiposCampania.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the TipoCampania.
     *
     * @param TipoCampaniaDataTable $tipoCampaniaDataTable
     * @return Response
     */
    public function index(TipoCampaniaDataTable $tipoCampaniaDataTable)
    {
        return $tipoCampaniaDataTable->render('campanias.tipos_campania.index');
    }

    /**
     * Show the form for creating a new TipoCampania.
     *
     * @return Response
     */
    public function create()
    {
        return view('campanias.tipos_campania.create');
    }

    /**
     * Store a newly created TipoCampania in storage.
     *
     * @param CreateTipoCampaniaRequest $request
     *
     * @return Response
     */
    public function store(CreateTipoCampaniaRequest $request)
    {
        $input = $request->all();

        $tipoCampania = $this->tipoCampaniaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/tiposCampania.singular')]));

        return redirect(route('campanias.tiposCampania.index'));
    }

    /**
     * Display the specified TipoCampania.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipoCampania = $this->tipoCampaniaRepository->find($id);

        if (empty($tipoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposCampania.singular')]));

            return redirect(route('campanias.tiposCampania.index'));
        }
        $audits = $tipoCampania->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('campanias.tipos_campania.show')->with(['tipoCampania'=>$tipoCampania,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified TipoCampania.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipoCampania = $this->tipoCampaniaRepository->find($id);

        if (empty($tipoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposCampania.singular')]));

            return redirect(route('campanias.tiposCampania.index'));
        }

        return view('campanias.tipos_campania.edit')->with('tipoCampania', $tipoCampania);
    }

    /**
     * Update the specified TipoCampania in storage.
     *
     * @param  int              $id
     * @param UpdateTipoCampaniaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipoCampaniaRequest $request)
    {
        $tipoCampania = $this->tipoCampaniaRepository->find($id);

        if (empty($tipoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposCampania.singular')]));

            return redirect(route('campanias.tiposCampania.index'));
        }

        $tipoCampania = $this->tipoCampaniaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/tiposCampania.singular')]));

        return redirect(route('campanias.tiposCampania.index'));
    }

    /**
     * Remove the specified TipoCampania from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipoCampania = $this->tipoCampaniaRepository->find($id);

        if (empty($tipoCampania)) {
            Flash::error(__('messages.not_found', ['model' => __('models/tiposCampania.singular')]));

            return redirect(route('campanias.tiposCampania.index'));
        }

        $this->tipoCampaniaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/tiposCampania.singular')]));

        return redirect(route('campanias.tiposCampania.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->tipoCampaniaRepository->infoSelect2($request->input('q', ''));
    }

}
