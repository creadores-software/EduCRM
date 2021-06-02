<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\OportunidadDataTable;
use App\Models\Campanias\Campania;
use App\Imports\Campanias\OportunidadImport;
use App\Exports\Campanias\OportunidadExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Contactos\Contacto;
use App\Models\Campanias\Oportunidad;
use App\Models\Campanias\EstadoCampania;
use App\Models\Campanias\CategoriaOportunidad;
use App\Http\Requests\Campanias\CreateOportunidadRequest;
use App\Http\Requests\Campanias\UpdateOportunidadRequest;
use App\Repositories\Campanias\OportunidadRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Campanias\TipoCampaniaEstados;
use Illuminate\Http\Request;
use Response;
use Flash;
use Validator;
use Cache;
use Carbon\Carbon;

class OportunidadController extends AppBaseController
{
    /** @var  OportunidadRepository */
    private $oportunidadRepository;

    public function __construct(OportunidadRepository $oportunidadRepo)
    {
        $this->oportunidadRepository = $oportunidadRepo;
        $this->middleware('permission:campanias.oportunidades.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.oportunidades.crear', ['only' => ['create','store','archivoEjemplo','subirImportacion','cargarImportacion','sincronizar']]);        
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

    public function archivoEjemplo(){
        return Excel::download(new OportunidadExport, 'plantilla_oportunidades.xlsx');
    }
    
    public function subirImportacion(){
        return view('campanias.oportunidades.subir_importacion');
    }

    public function cargarImportacion(Request $request){
        if($request->archivo){
            $validator = Validator::make(
                [
                    'file'      => $request->archivo,
                    'extension' => strtolower($request->archivo->getClientOriginalExtension()),
                ],
                [
                    'file'          => 'required',
                    'extension'      => 'required|in:xlsx,xls',
                ]
            );
    
            if ($validator->fails()) {
                Flash::error($validator);
                return back();
            }
    
            try {
                Cache::put('cantidadImportados',0, 10);
                $import = new OportunidadImport;
                $import->import($request->file('archivo'));
                $failures=$import->failures();
                if(!$failures->isEmpty()){
                    $mensaje="";      
                    foreach ($failures as $failure) {
                        $mensaje.="Error en la linea ".$failure->row().": ";
                        foreach($failure->errors() as $error){
                            $mensaje.=$error." ";    
                        }
                        $mensaje.=" <br/>";
                    }
                    $importados=Cache::get('cantidadImportados');
                    $mensaje.="<br/>Se importaron sin error {$importados} registro(s).";
                    Cache::forget('cantidadImportados');
                    Flash::error($mensaje);
                    return back();
                }
                $importados=Cache::get('cantidadImportados');
                Cache::forget('cantidadImportados');
                if($importados==0){
                    Flash::error('No se encontró ningún registro en la plantilla');
                    return back();
                }                
                Flash::success("El archivo ha sido importado correctamente con {$importados} registro(s).");
                return redirect(route('campanias.campanias.index'));
            } catch (Exception $e) {
                Flash::error($e->getMessage());
                return back();
            }     
        }else{
            Flash::error('Debe seleccionar un archivo para realizar la importación');
            return back();    
        }       
    }

    public function sincronizar(Request $request){
        $contactos=null;
        $cantidad=0;
        if ($request->has('idCampania')) {
            $campania_id=$request->get('idCampania');
            $campania = Campania::find($campania_id);
            if(!empty($campania) && !empty($campania->segmento_id)){ 
                $primerEstado = TipoCampaniaEstados::
                    where('tipo_campania_id',$campania->tipo_campania_id)
                    ->where('orden',1)->first();
                if(!empty($primerEstado) && $primerEstado->estadoCampania->justificacionEstadoCampania->count()>0){
                    //Estado "No aplica" en su defecto    
                    $justificacion=$primerEstado->estadoCampania->justificacionEstadoCampania[0];
                    $contactos = Contacto::oportunidadesNoIncluidas($campania);
                    foreach($contactos as $contacto){
                        $oportunidad = new Oportunidad();
                        $oportunidad->campania_id=$campania->id;
                        $oportunidad->contacto_id=$contacto->id;
                        $oportunidad->estado_campania_id=$primerEstado->estadoCampania->id;
                        $oportunidad->justificacion_estado_campania_id=$justificacion->id;
                        $oportunidad->adicion_manual=0;
                        $oportunidad->ultima_actualizacion= new Carbon();
                        $oportunidad->save();
                        $cantidad++;
                    } 
                    Flash::success("Se han sincronizado {$cantidad} contactos. Debe asignar un responsable y contactarlos para completar la información");
                }else{
                    Flash::error("El tipo de campaña no tiene un primer estado con una justificación");     
                }
            }else{
                Flash::error("La campaña no tiene un segmento asociado");     
            }
        }else {            
            Flash::error('No es posible sincronizar un segmento sin una campaña definida');     
        }
        return back();
    }

}
