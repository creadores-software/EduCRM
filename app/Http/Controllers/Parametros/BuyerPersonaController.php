<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\BuyerPersonaDataTable;
use App\Http\Requests\Parametros;
use App\Http\Requests\Parametros\CreateBuyerPersonaRequest;
use App\Http\Requests\Parametros\UpdateBuyerPersonaRequest;
use App\Repositories\Parametros\BuyerPersonaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BuyerPersonaController extends AppBaseController
{
    /** @var  BuyerPersonaRepository */
    private $buyerPersonaRepository;

    public function __construct(BuyerPersonaRepository $buyerPersonaRepo)
    {
        $this->buyerPersonaRepository = $buyerPersonaRepo;
    }

    /**
     * Display a listing of the BuyerPersona.
     *
     * @param BuyerPersonaDataTable $buyerPersonaDataTable
     * @return Response
     */
    public function index(BuyerPersonaDataTable $buyerPersonaDataTable)
    {
        return $buyerPersonaDataTable->render('parametros.buyer_personas.index');
    }

    /**
     * Show the form for creating a new BuyerPersona.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.buyer_personas.create');
    }

    /**
     * Store a newly created BuyerPersona in storage.
     *
     * @param CreateBuyerPersonaRequest $request
     *
     * @return Response
     */
    public function store(CreateBuyerPersonaRequest $request)
    {
        $input = $request->all();

        $buyerPersona = $this->buyerPersonaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/buyerPersonas.singular')]));

        return redirect(route('parametros.buyerPersonas.index'));
    }

    /**
     * Display the specified BuyerPersona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $buyerPersona = $this->buyerPersonaRepository->find($id);

        if (empty($buyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/buyerPersonas.singular')]));

            return redirect(route('parametros.buyerPersonas.index'));
        }

        return view('parametros.buyer_personas.show')->with('buyerPersona', $buyerPersona);
    }

    /**
     * Show the form for editing the specified BuyerPersona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $buyerPersona = $this->buyerPersonaRepository->find($id);

        if (empty($buyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/buyerPersonas.singular')]));

            return redirect(route('parametros.buyerPersonas.index'));
        }

        return view('parametros.buyer_personas.edit')->with('buyerPersona', $buyerPersona);
    }

    /**
     * Update the specified BuyerPersona in storage.
     *
     * @param  int              $id
     * @param UpdateBuyerPersonaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBuyerPersonaRequest $request)
    {
        $buyerPersona = $this->buyerPersonaRepository->find($id);

        if (empty($buyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/buyerPersonas.singular')]));

            return redirect(route('parametros.buyerPersonas.index'));
        }

        $buyerPersona = $this->buyerPersonaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/buyerPersonas.singular')]));

        return redirect(route('parametros.buyerPersonas.index'));
    }

    /**
     * Remove the specified BuyerPersona from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $buyerPersona = $this->buyerPersonaRepository->find($id);

        if (empty($buyerPersona)) {
            Flash::error(__('messages.not_found', ['model' => __('models/buyerPersonas.singular')]));

            return redirect(route('parametros.buyerPersonas.index'));
        }

        $this->buyerPersonaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/buyerPersonas.singular')]));

        return redirect(route('parametros.buyerPersonas.index'));
    }
}
