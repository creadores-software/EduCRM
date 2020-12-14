<?php

namespace App\Http\Controllers\Parametros;

use App\DataTables\Parametros\PrefijoDataTable;
use App\Http\Requests\Parametros;
use App\Http\Requests\Parametros\CreatePrefijoRequest;
use App\Http\Requests\Parametros\UpdatePrefijoRequest;
use App\Repositories\Parametros\PrefijoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class PrefijoController extends AppBaseController
{
    /** @var  PrefijoRepository */
    private $prefijoRepository;

    public function __construct(PrefijoRepository $prefijoRepo)
    {
        $this->prefijoRepository = $prefijoRepo;
    }

    /**
     * Display a listing of the Prefijo.
     *
     * @param PrefijoDataTable $prefijoDataTable
     * @return Response
     */
    public function index(PrefijoDataTable $prefijoDataTable)
    {
        return $prefijoDataTable->render('parametros.prefijos.index');
    }

    /**
     * Show the form for creating a new Prefijo.
     *
     * @return Response
     */
    public function create()
    {
       return view('parametros.prefijos.create');
    }

    /**
     * Store a newly created Prefijo in storage.
     *
     * @param CreatePrefijoRequest $request
     *
     * @return Response
     */
    public function store(CreatePrefijoRequest $request)
    {
        $input = $request->all();

        $prefijo = $this->prefijoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/prefijos.singular')]));

        return redirect(route('parametros.prefijos.index'));
    }

    /**
     * Display the specified Prefijo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prefijo = $this->prefijoRepository->find($id);

        if (empty($prefijo)) {
            Flash::error(__('models/prefijos.singular').' '.__('messages.not_found'));

            return redirect(route('parametros.prefijos.index'));
        }

        $audits = $prefijo->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('parametros.prefijos.show')->with(['prefijo'=> $prefijo, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Prefijo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prefijo = $this->prefijoRepository->find($id);              

        if (empty($prefijo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/prefijos.singular')]));

            return redirect(route('parametros.prefijos.index'));
        }

        return view('parametros.prefijos.edit')->with(['prefijo'=> $prefijo]);
    }

    /**
     * Update the specified Prefijo in storage.
     *
     * @param  int              $id
     * @param UpdatePrefijoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrefijoRequest $request)
    {
        $prefijo = $this->prefijoRepository->find($id);

        if (empty($prefijo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/prefijos.singular')]));

            return redirect(route('parametros.prefijos.index'));
        }

        $prefijo = $this->prefijoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/prefijos.singular')]));

        return redirect(route('parametros.prefijos.index'));
    }

    /**
     * Remove the specified Prefijo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prefijo = $this->prefijoRepository->find($id);

        if (empty($prefijo)) {
            Flash::error(__('messages.not_found', ['model' => __('models/prefijos.singular')]));

            return redirect(route('parametros.prefijos.index'));
        }

        $this->prefijoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/prefijos.singular')]));

        return redirect(route('parametros.prefijos.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        $search=null;
        $genero=$request->input('genero', '');
        $term=$request->input('q', '');
        if(!empty($genero)){
            $search=['genero_id'=>$genero];      
        }
        return $this->prefijoRepository->infoSelect2($term,$search);
    }

}
