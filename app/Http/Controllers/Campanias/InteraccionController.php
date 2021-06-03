<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\InteraccionDataTable;
use App\Models\Campanias\Oportunidad;
use App\Models\Contactos\Contacto;
use App\Models\Campanias\EstadoInteraccion;
use App\Models\Campanias\EstadoCampania;
use App\Imports\Campanias\InteraccionImport;
use App\Exports\Campanias\InteraccionExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Campanias\CreateInteraccionRequest;
use App\Http\Requests\Campanias\UpdateInteraccionRequest;
use App\Repositories\Campanias\InteraccionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Validator;
use Response;
use Flash;
use Cache;
use Illuminate\Support\Facades\Auth;

class InteraccionController extends AppBaseController
{
    /** @var  InteraccionRepository */
    private $interaccionRepository;

    public function __construct(InteraccionRepository $interaccionRepo)
    {
        $this->interaccionRepository = $interaccionRepo;
        $this->middleware('permission:campanias.interacciones.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:campanias.interacciones.crear', ['only' => ['create','store']]);
        $this->middleware('permission:campanias.interacciones.importar', ['only' => ['archivoEjemplo','subirImportacion','cargarImportacion']]);
        $this->middleware('permission:campanias.interacciones.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:campanias.interacciones.eliminar', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Interaccion.
     *
     * @param InteraccionDataTable $interaccionDataTable
     * @return Response
     */
    public function index(InteraccionDataTable $interaccionDataTable)
    {
        $estado=null;
        $oportunidad=null;
        $contacto=null;
        if ($interaccionDataTable->request()->has('idOportunidad')) {            
            $oportunidad = Oportunidad::find($interaccionDataTable->request()->get('idOportunidad'));
        }
        if ($interaccionDataTable->request()->has('idContacto')) {
            $contacto = Contacto::find($interaccionDataTable->request()->get('idContacto'));            
        }
        if ($interaccionDataTable->request()->has('idEstado')) {
            $estado = $interaccionDataTable->request()->get('idEstado');            
        }

        if(empty($contacto) && empty($oportunidad) && empty($estado)) {
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin una oportunidad, contacto o estado seleccionado'], 500);     
        } 
        return $interaccionDataTable->render('campanias.interacciones.index',
                ['oportunidad'=>$oportunidad,'contacto'=>$contacto]); 
    }

    /**
     * Show the form for creating a new Interaccion.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $coloresEstadosCampania = EstadoCampania::arrayColores();
        $coloresEstadosInteraccion = EstadoInteraccion::arrayColores();
        $usuario = Auth::user()->id;
        if ($request->has('idOportunidad')) {
            $oportunidad=Oportunidad::where('id',$request->get('idOportunidad'))->first();
            return view('campanias.interacciones.create')->with(['interaccion'=>null,'oportunidad'=>$oportunidad,'coloresEstadosCampania'=>$coloresEstadosCampania,'coloresEstadosInteraccion'=>$coloresEstadosInteraccion,'usuario'=>$usuario]); 
        }else {
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin una campaña o contacto seleccionado'], 500);     
        }
        return view('campanias.interacciones.create');
    }

    /**
     * Store a newly created Interaccion in storage.
     *
     * @param CreateInteraccionRequest $request
     *
     * @return Response
     */
    public function store(CreateInteraccionRequest $request)
    {
        $input = $request->all();

        $interaccion = $this->interaccionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/interacciones.singular')]));

        return redirect(route('campanias.interacciones.index',['idOportunidad'=>$request->get('idOportunidad')]));
    }

    /**
     * Display the specified Interaccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $interaccion = $this->interaccionRepository->find($id);

        if (empty($interaccion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/interacciones.singular')]));

            return redirect(route('campanias.interacciones.index'));
        }
        $audits = $interaccion->ledgers()->with('user')->get()->sortByDesc('created_at');
        return view('campanias.interacciones.show')->with(['interaccion'=>$interaccion,'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Interaccion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $interaccion = $this->interaccionRepository->find($id);
        $coloresEstadosCampania = EstadoCampania::arrayColores();
        $coloresEstadosInteraccion = EstadoInteraccion::arrayColores();

        if (empty($interaccion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/interacciones.singular')]));
            return redirect(route('campanias.interacciones.index'));
        }else if($interaccion->estadoInteraccion->tipoEstadoColor->nombre!='Neutro'){
            Flash::error("Esta interacción no se puede editar");
            return redirect(route('campanias.interacciones.index',['idOportunidad'=>$interaccion->oportunidad->id]));   
        }
        return view('campanias.interacciones.edit')->with(['interaccion'=>$interaccion,'oportunidad'=>$interaccion->oportunidad,'coloresEstadosCampania'=>$coloresEstadosCampania,'coloresEstadosInteraccion'=>$coloresEstadosInteraccion,'usuario'=>$interaccion->users_id]);
    }

    /**
     * Update the specified Interaccion in storage.
     *
     * @param  int              $id
     * @param UpdateInteraccionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInteraccionRequest $request)
    {
        $interaccion = $this->interaccionRepository->find($id);

        if (empty($interaccion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/interacciones.singular')]));

            return redirect(route('campanias.interacciones.index'));
        }

        $interaccion = $this->interaccionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/interacciones.singular')]));

        return redirect(route('campanias.interacciones.index',['idOportunidad'=>$interaccion->oportunidad->id]));
    }

    /**
     * Remove the specified Interaccion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $interaccion = $this->interaccionRepository->find($id);

        if (empty($interaccion)) {
            Flash::error(__('messages.not_found', ['model' => __('models/interacciones.singular')]));

            return redirect(route('campanias.interacciones.index'));
        }

        $this->interaccionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/interacciones.singular')]));

        return redirect(route('campanias.interacciones.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {
        return $this->interaccionRepository->infoSelect2($request->input('q', ''));
    }

    public function archivoEjemplo(){
        return Excel::download(new InteraccionExport, 'plantilla_interacciones.xlsx');
    }
    
    public function subirImportacion(){
        return view('campanias.interacciones.subir_importacion');
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
                $import = new InteraccionImport;
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

}
