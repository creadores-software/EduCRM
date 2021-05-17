<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\ContactoDataTable;
use App\Models\Contactos\Contacto;
use App\Models\Parametros\Origen;
use App\Imports\Contactos\ContactoImport;
use App\Exports\Contactos\ContactoExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Contactos\CreateContactoRequest;
use App\Http\Requests\Contactos\UpdateContactoRequest;
use App\Repositories\Contactos\ContactoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Flash;
use Cache;
use Illuminate\Support\Facades\Log;
use Validator;

class ContactoController extends AppBaseController
{
    /** @var  ContactoRepository */
    private $contactoRepository;

    public function __construct(ContactoRepository $contactoRepo)
    {
        $this->contactoRepository = $contactoRepo;
        $this->middleware('permission:contactos.contactos.consultar', ['only' => ['index','show','dataAjax']]);
        $this->middleware('permission:contactos.contactos.crear', ['only' => ['create','store']]);        
        $this->middleware('permission:contactos.contactos.editar', ['only' => ['edit','update']]);
        $this->middleware('permission:contactos.contactos.eliminar', ['only' => ['destroy']]);
        $this->middleware('permission:contactos.contactos.importar', ['only' => ['archivoEjemplo','subirImportacion','cargarImportacion']]);
    }

    /**
     * Display a listing of the Contacto.
     *
     * @param ContactoDataTable $contactoDataTable
     * @return Response
     */
    public function index(ContactoDataTable $contactoDataTable)
    {
        return $contactoDataTable->render('contactos.contactos.index');
    }

    /**
     * Show the form for creating a new Contacto.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $esPariente=0;
        $idPariente=0;
        $origenPariente = Origen::where('nombre','Pariente')->first();
        if($request->has('esPariente') && $request->get('esPariente')){
            if(!empty($origenPariente)){
                $esPariente=$request->get('esPariente');           
                $idPariente=$origenPariente->id;
            }         
        }

        return view('contactos.contactos.create',['esPariente'=>$esPariente,'idPariente'=>$idPariente]);
    }

    /**
     * Store a newly created Contacto in storage.
     *
     * @param CreateContactoRequest $request
     *
     * @return Response
     */
    public function store(CreateContactoRequest $request)
    {
        $input = $request->all();

        $contacto = $this->contactoRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/contactos.singular')]));

        return redirect(route('contactos.contactos.index'));
    }

    /**
     * Display the specified Contacto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contacto = $this->contactoRepository->find($id);
        if (empty($contacto)) {
            Flash::error(__('models/contactos.singular').' '.__('messages.not_found'));

            return redirect(route('contactos.contactos.index'));
        }
        $audits = $contacto->ledgers()->with('user')->get()->sortByDesc('created_at');

        return view('contactos.contactos.show')->with(['contacto'=> $contacto, 'audits'=>$audits]);
    }

    /**
     * Show the form for editing the specified Contacto.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id,Request $request)
    {
        //Solo aplica en creación
        $esPariente=0;
        $idPariente=0;
        $contacto = $this->contactoRepository->find($id);

        if (empty($contacto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactos.singular')]));

            return redirect(route('contactos.contactos.index'));
        }

        return view('contactos.contactos.edit',['contacto'=>$contacto,'esPariente'=>$esPariente,'idPariente'=>$idPariente]);
    }

    /**
     * Update the specified Contacto in storage.
     *
     * @param  int              $id
     * @param UpdateContactoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactoRequest $request)
    {
        $contacto = $this->contactoRepository->find($id);

        if (empty($contacto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactos.singular')]));

            return redirect(route('contactos.contactos.index'));
        }

        $contacto = $this->contactoRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/contactos.singular')]));

        return redirect(route('contactos.contactos.show',$contacto->id));
    }

    /**
     * Remove the specified Contacto from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contacto = $this->contactoRepository->find($id);

        if (empty($contacto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactos.singular')]));

            return redirect(route('contactos.contactos.index'));
        }

        $this->contactoRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/contactos.singular')]));

        return redirect(route('contactos.contactos.index'));
    }

    /**
     * Obtiene una lista formateada lista para ser usada en un select2
     */
    public function dataAjax(Request $request)
    {   
        $term=$request->input('q', '');   
        $contacto_excluir=$request->input('contacto_excluir', '');
        $contactos_excluir_campania=$request->input('contactos_excluir_campania', '');    
        $where_text = "identificacion is not null";
        $where_params=[];
        $page=$request->input('page', ''); 
        
        $name="CONCAT(nombres, ' ', apellidos, ' - ', identificacion)";

        if(!empty($contacto_excluir) && ctype_digit($contacto_excluir)){
            $where_text.=" and id <> :id";
            $where_params['id']=intval($contacto_excluir);
        }
        if(!empty($contactos_excluir_campania) && ctype_digit($contactos_excluir_campania)){
            $where_text.=" and id not in (select contacto_id from oportunidad where campania_id= :campania)";
            $where_params['campania']=intval($contactos_excluir_campania);
        }
        if(!empty($where_paramsa)){
            $where_text.=$name." LIKE '%:term%'";
            $where_params['term']=$term;
        }
        
        return $this->contactoRepository->infoSelect2($term,null,null,null,['text','ASC'],$name,$page,[$where_text,$where_params]);
    }

    public function archivoEjemplo(){
        return Excel::download(new ContactoExport, 'plantilla_contactos.xlsx');
    }
    
    public function subirImportacion(){
        return view('contactos.contactos.subir_importacion');
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
                $import = new ContactoImport;
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
                Flash::success("El archivo ha sido importado correctamente con {$importados} registro(s).");
                Cache::forget('cantidadImportados');
                return redirect(route('contactos.contactos.index'));
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
