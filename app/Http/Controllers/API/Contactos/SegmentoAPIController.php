<?php

namespace App\Http\Controllers\API\Contactos;

use App\Http\Requests\API\Contactos\CreateSegmentoAPIRequest;
use App\Http\Requests\API\Contactos\UpdateSegmentoAPIRequest;
use App\Models\Contactos\Segmento;
use App\Repositories\Contactos\SegmentoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SegmentoController
 * @package App\Http\Controllers\API\Contactos
 */

class SegmentoAPIController extends AppBaseController
{
    /** @var  SegmentoRepository */
    private $segmentoRepository;

    public function __construct(SegmentoRepository $segmentoRepo)
    {
        $this->segmentoRepository = $segmentoRepo;
    }

    /**
     * Display a listing of the Segmento.
     * GET|HEAD /segmentos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $segmentos = $this->segmentoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $segmentos->toArray(),
            __('messages.retrieved', ['model' => __('models/segmentos.plural')])
        );
    }

    /**
     * Store a newly created Segmento in storage.
     * POST /segmentos
     *
     * @param CreateSegmentoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSegmentoAPIRequest $request)
    {
        $input = $request->all();

        $segmento = $this->segmentoRepository->create($input);

        return $this->sendResponse(
            $segmento->toArray(),
            __('messages.saved', ['model' => __('models/segmentos.singular')])
        );
    }

    /**
     * Display the specified Segmento.
     * GET|HEAD /segmentos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Segmento $segmento */
        $segmento = $this->segmentoRepository->find($id);

        if (empty($segmento)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/segmentos.singular')])
            );
        }

        return $this->sendResponse(
            $segmento->toArray(),
            __('messages.retrieved', ['model' => __('models/segmentos.singular')])
        );
    }

    /**
     * Update the specified Segmento in storage.
     * PUT/PATCH /segmentos/{id}
     *
     * @param int $id
     * @param UpdateSegmentoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSegmentoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Segmento $segmento */
        $segmento = $this->segmentoRepository->find($id);

        if (empty($segmento)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/segmentos.singular')])
            );
        }

        $segmento = $this->segmentoRepository->update($input, $id);

        return $this->sendResponse(
            $segmento->toArray(),
            __('messages.updated', ['model' => __('models/segmentos.singular')])
        );
    }

    /**
     * Remove the specified Segmento from storage.
     * DELETE /segmentos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Segmento $segmento */
        $segmento = $this->segmentoRepository->find($id);

        if (empty($segmento)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/segmentos.singular')])
            );
        }

        $segmento->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/segmentos.singular')])
        );
    }
}
