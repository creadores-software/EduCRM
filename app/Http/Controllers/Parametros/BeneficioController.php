<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\BeneficioDataTable;
use App\Http\Requests\Parametros\CreateBeneficioRequest;
use App\Http\Requests\Parametros\UpdateBeneficioRequest;
use App\Repositories\Parametros\BeneficioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class BeneficioController extends AppBaseController
{
    /** @var  BeneficioRepository */
    private $beneficioRepository;

    public function __construct(BeneficioRepository $beneficioRepo)
    {
        $this->beneficioRepository = $beneficioRepo;
    }

    /**
     * Display a listing of the Beneficio.
     *
     * @param BeneficioDataTable $beneficioDataTable
     * @return Response
     */
    public function index(BeneficioDataTable $beneficioDataTable)
    {
        return $beneficioDataTable->render('parametros.beneficios.index');
    }

    /**
     * Show the form for creating a new Beneficio.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.beneficios.create');
    }

    /**
     * Store a newly created Beneficio in storage.
     *
     * @param CreateBeneficioRequest $request
     *
     * @return Response
     */
    public function store(CreateBeneficioRequest $request)
    {
        $input = $request->all();

        $beneficio = $this->beneficioRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/beneficios.singular')]));

        return redirect(route('parametros.beneficios.index'));
    }

    /**
     * Display the specified Beneficio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $beneficio = $this->beneficioRepository->find($id);

        if (empty($beneficio)) {
            Flash::error(__('models/beneficios.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.beneficios.index'));
        }

        $audits = $beneficio->audits;

        return view('parametros.beneficios.show')->with(['beneficio'=> $beneficio, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Beneficio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $beneficio = $this->beneficioRepository->find($id);

        if (empty($beneficio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/beneficios.singular')]));

            return redirect(route('parametros.beneficios.index'));
        }

        return view('parametros.beneficios.edit')->with('beneficio', $beneficio);
    }

    /**
     * Update the specified Beneficio in storage.
     *
     * @param  int              $id
     * @param UpdateBeneficioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBeneficioRequest $request)
    {
        $beneficio = $this->beneficioRepository->find($id);

        if (empty($beneficio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/beneficios.singular')]));

            return redirect(route('parametros.beneficios.index'));
        }

        $beneficio = $this->beneficioRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/beneficios.singular')]));

        return redirect(route('parametros.beneficios.index'));
    }

    /**
     * Remove the specified Beneficio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $beneficio = $this->beneficioRepository->find($id);

        if (empty($beneficio)) {
            Flash::error(__('messages.not_found', ['model' => __('models/beneficios.singular')]));

            return redirect(route('parametros.beneficios.index'));
        }

        $this->beneficioRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/beneficios.singular')]));

        return redirect(route('parametros.beneficios.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->beneficioRepository->infoSelect2($request->input('term', ''));
    }
}
