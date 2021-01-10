<?php

namespace App\Http\Controllers\Contactos;

use App\DataTables\Contactos\ContactoDataTable;
use App\Models\Contactos\Contacto;
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
use Validator;

class ContactoController extends AppBaseController
{
    /** @var  ContactoRepository */
    private $contactoRepository;

    public function __construct(ContactoRepository $contactoRepo)
    {
        $this->contactoRepository = $contactoRepo;
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
        if($request->has('esPariente') && $request->get('esPariente')){
            $esPariente=$request->get('esPariente');
        }

        return view('contactos.contactos.create',['esPariente'=>$esPariente]);
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
        $esPariente=0;
        if($request->has('esPariente') && $request->get('esPariente')){
            $esPariente=$request->get('esPariente');
        }

        $contacto = $this->contactoRepository->find($id);

        if (empty($contacto)) {
            Flash::error(__('messages.not_found', ['model' => __('models/contactos.singular')]));

            return redirect(route('contactos.contactos.index'));
        }

        return view('contactos.contactos.edit',['contacto'=>$contacto,'esPariente'=>$esPariente]);
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

        $model = new Contacto();        
        $query = $model->newQuery();

        $concat_alias= DB::raw("CONCAT(nombres, ' ', apellidos, ' - ', identificacion) as text");
        $concat= DB::raw("CONCAT(nombres, ' ', apellidos, ' - ', identificacion)");

        $query->select('id',$concat_alias);
        $query->where($concat, 'LIKE', '%'.$term.'%');
        //Solo se muestran contactos con identificación 
        $query->whereNotNull('identificacion');

        if(!empty($contacto_excluir)){
            $query->where('id', '<>', $contacto_excluir);    
        }
        $query->orderBy('text', 'ASC');        
        $coincidentes = $query->get();

        return ['results' => $coincidentes];
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
    
            $nombreArchivo=$request->archivo->getClientOriginalExtension();
            try {
                Cache::put('cantidadImportados',0, 10);
                $import = new ContactoImport;
                $import->import($request->file('archivo'));
                $failures=$import->failures();
                if(!empty($failures)){
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

                Flash::success("El archivo ha sido importado correctamente {$nombreArchivo}.");
                return back(); 
            } catch (Exception $e) {
                Flash::error($e->getMessage());
                return back();
            }     
        }       
    }
}
