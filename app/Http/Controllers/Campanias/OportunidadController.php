<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\OportunidadDataTable;
use App\Models\Campanias\Campania;
use App\Models\Contactos\Contacto;
use App\Models\Campanias\EstadoCampania;
use App\Models\Campanias\CategoriaOportunidad;
use App\Http\Requests\Campanias\CreateOportunidadRequest;
use App\Http\Requests\Campanias\UpdateOportunidadRequest;
use App\Repositories\Campanias\OportunidadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;

class OportunidadController extends AppBaseController
{
    /** @var  OportunidadRepository */
    private $oportunidadRepository;

    public function __construct(OportunidadRepository $oportunidadRepo)
    {
        $this->oportunidadRepository = $oportunidadRepo;
        $this->middleware('permission:campanias.oportunidades.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.oportunidades.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:campanias.oportunidades.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:campanias.oportunidades.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Oportunidad.
     *
     * @param OportunidadDataTable $oportunidadDataTable
     * @return Response
     */
    public function index(OportunidadDataTable $oportunidadDataTable)
    {
        $contacto=null;
        $campania=null;
        $autorizacionGeneral=false;
        if ($oportunidadDataTable->request()->has('idCampania')) {            
            $campania = Campania::find($oportunidadDataTable->request()->get('idCampania'));
            $autorizacionGeneral=Campania::tieneAutorizacionGeneral($campania->id);            
        }
        if ($oportunidadDataTable->request()->has('idContacto')) {
            $contacto = Contacto::find($oportunidadDataTable->request()->get('idContacto'));            
        }
        if(empty($contacto) && empty($campania)) {
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin una campaña o contacto seleccionado'], 500);     
        } 
        return $oportunidadDataTable->render('campanias.oportunidades.index',
                ['campania'=>$campania,'contacto'=>$contacto,'autorizacionGeneral'=>$autorizacionGeneral]); 
    }

    /**
     * Show the form for creating a new Oportunidad.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $coloresEstados = EstadoCampania::arrayColores();
        $coloresCategorias = CategoriaOportunidad::arrayColores();
        if ($request->has('idCampania')) {
            $campania = Campania::find($request->get('idCampania'));
            $autorizacionGeneral=Campania::tieneAutorizacionGeneral($campania->id);
            return view('campanias.oportunidades.create')->with(['campania'=>$campania,'coloresEstados'=>$coloresEstados,'coloresCategorias'=>$coloresCategorias,'autorizacionGeneral'=>$autorizacionGeneral]); 
        }else {
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin una campaña o contacto seleccionado'], 500);     
        }
    }

    /**
     * Store a newly created Oportunidad in storage.
     *
     * @param CreateOportunidadRequest $request
     *
     * @return Response
     */
    public function store(CreateOportunidadRequest $request)
    {
        $input = $request->all();
        $input['adicion_manual']=1;
        $oportunidad = $this->oportunidadRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/oportunidades.singular')]));

        if ($request->has('idCampania')) {
            return redirect(route('campanias.oportunidades.index',['idCampania'=>$request->get('idCampania')])); 
        }else if ($request->has('idContacto')) {
            return redirect(route('campanias.oportunidades.index',['idContacto'=>$request->get('idContacto')])); 
        }
    }

    /**
     * Display the specified Oportunidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $oportunidad = $this->oportunidadRepository->find($id);

        if (empty($oportunidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/oportunidades.singular')]));

            return redirect(route('campanias.oportunidades.index'));
        }
        $audits = $oportunidad->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('campanias.oportunidades.show')->with(['oportunidad'=>$oportunidad,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Oportunidad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $coloresEstados = EstadoCampania::arrayColores();
        $coloresCategorias = CategoriaOportunidad::arrayColores();
        $oportunidad = $this->oportunidadRepository->find($id);       

        if (empty($oportunidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/oportunidades.singular')]));

            return redirect(route('campanias.oportunidades.index'));
        }
        $campania=null;
        $autorizacionGeneral=false;
        if ($request->has('idCampania')) {
            $idCampania=$request->get('idCampania'); 
            $campania = Campania::where('id',$idCampania)->first();
            $autorizacionGeneral=Campania::tieneAutorizacionGeneral($idCampania);       
            return view('campanias.oportunidades.edit')->with(['campania'=>$campania,'oportunidad'=>$oportunidad,'coloresEstados'=>$coloresEstados,'coloresCategorias'=>$coloresCategorias,'autorizacionGeneral'=>$autorizacionGeneral]); 
        }else{
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin una campaña o contacto seleccionado'], 500);     
        }
    }

    /**
     * Update the specified Oportunidad in storage.
     *
     * @param  int              $id
     * @param UpdateOportunidadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOportunidadRequest $request)
    {
        $oportunidad = $this->oportunidadRepository->find($id);

        if (empty($oportunidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/oportunidades.singular')]));

            return redirect(route('campanias.oportunidades.index'));
        }

        $oportunidad = $this->oportunidadRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/oportunidades.singular')]));

        if ($request->has('idCampania')) {
            return redirect(route('campanias.oportunidades.index',['idCampania'=>$request->get('idCampania')])); 
        }else if ($request->has('idContacto')) {
            return redirect(route('campanias.oportunidades.index',['idContacto'=>$request->get('idContacto')])); 
        }
    }

    /**
     * Remove the specified Oportunidad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $oportunidad = $this->oportunidadRepository->find($id);

        if (empty($oportunidad)) {
            Flash::error(__('messages.not_found', ['model' => __('models/oportunidades.singular')]));

            return redirect(route('campanias.oportunidades.index'));
        }
        //Solo se permite la eliminación desde la campaña
        $idCampania = $oportunidad->campania_id;
        $this->oportunidadRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/oportunidades.singular')]));

        return redirect(route('campanias.oportunidades.index',['idCampania'=>$idCampania]));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->oportunidadRepository->infoSelect2($request->input('q', ''));
    }

}
