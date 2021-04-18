<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\EstiloVidaDataTable;
use App\Http\Requests\Parametros\CreateEstiloVidaRequest;
use App\Http\Requests\Parametros\UpdateEstiloVidaRequest;
use App\Repositories\Parametros\EstiloVidaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class EstiloVidaController extends AppBaseController
{
    /** @var  EstiloVidaRepository */
    private $estiloVidaRepository;

    public function __construct(EstiloVidaRepository $estiloVidaRepo)
    {
        $this->estiloVidaRepository = $estiloVidaRepo;
        $this->middleware('permission:parametros.estilosVida.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:parametros.estilosVida.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:parametros.estilosVida.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:parametros.estilosVida.eliminar', ['only' => ['destroy']]);
        
    }

    /**
     * Display a listing of the EstiloVida.
     *
     * @param EstiloVidaDataTable $estiloVidaDataTable
     * @return Response
     */
    public function index(EstiloVidaDataTable $estiloVidaDataTable)
    {
        return $estiloVidaDataTable->render('parametros.estilos_vida.index');
    }

    /**
     * Show the form for creating a new EstiloVida.
     *
     * @return Response
     */
    public function create()
    {
        return view('parametros.estilos_vida.create');
    }

    /**
     * Store a newly created EstiloVida in storage.
     *
     * @param CreateEstiloVidaRequest $request
     *
     * @return Response
     */
    public function store(CreateEstiloVidaRequest $request)
    {
        $input = $request->all();

        $estiloVida = $this->estiloVidaRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/estilosVida.singular')]));

        return redirect(route('parametros.estilosVida.index'));
    }

    /**
     * Display the specified EstiloVida.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estiloVida = $this->estiloVidaRepository->find($id);

        if (empty($estiloVida)) {
            Flash::error(__('models/estilosVida.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.estilosVida.index'));
        }

        $audits = $estiloVida->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('parametros.estilos_vida.show')->with(['estiloVida'=> $estiloVida, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified EstiloVida.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estiloVida = $this->estiloVidaRepository->find($id);

        if (empty($estiloVida)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estilosVida.singular')]));

            return redirect(route('parametros.estilosVida.index'));
        }

        return view('parametros.estilos_vida.edit')->with('estiloVida', $estiloVida);
    }

    /**
     * Update the specified EstiloVida in storage.
     *
     * @param  int              $id
     * @param UpdateEstiloVidaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEstiloVidaRequest $request)
    {
        $estiloVida = $this->estiloVidaRepository->find($id);

        if (empty($estiloVida)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estilosVida.singular')]));

            return redirect(route('parametros.estilosVida.index'));
        }

        $estiloVida = $this->estiloVidaRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/estilosVida.singular')]));

        return redirect(route('parametros.estilosVida.index'));
    }

    /**
     * Remove the specified EstiloVida from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estiloVida = $this->estiloVidaRepository->find($id);

        if (empty($estiloVida)) {
            Flash::error(__('messages.not_found', ['model' => __('models/estilosVida.singular')]));

            return redirect(route('parametros.estilosVida.index'));
        }

        $this->estiloVidaRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/estilosVida.singular')]));

        return redirect(route('parametros.estilosVida.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->estiloVidaRepository->infoSelect2($request->input('q', ''));
    }

}
