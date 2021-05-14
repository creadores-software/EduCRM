<?php

namespace App\Http\Controllers\Campanias;

use App\DataTables\Campanias\InteraccionDataTable;
use App\Models\Campanias\Oportunidad;
use App\Models\Contactos\Contacto;
use App\Models\Campanias\EstadoInteraccion;
use App\Models\Campanias\EstadoCampania;
use App\Http\Requests\Campanias\CreateInteraccionRequest;
use App\Http\Requests\Campanias\UpdateInteraccionRequest;
use App\Repositories\Campanias\InteraccionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Flash;
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
        $contacto=null;
        $oportunidad=null;
        if ($interaccionDataTable->request()->has('idOportunidad')) {            
            $oportunidad = Oportunidad::find($interaccionDataTable->request()->get('idOportunidad'));
        }
        if ($interaccionDataTable->request()->has('idContacto')) {
            $contacto = Contacto::find($interaccionDataTable->request()->get('idContacto'));            
        }
        if(empty($contacto) && empty($oportunidad)) {
            return response()->view('layouts.error', ['message'=>'No es posible visualizar esta información sin una oportunidad o contacto seleccionado'], 500);     
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
            return view('campanias.interacciones.create')->with(['oportunidad'=>$oportunidad,'coloresEstadosCampania'=>$coloresEstadosCampania,'coloresEstadosInteraccion'=>$coloresEstadosInteraccion,'usuario'=>$usuario]); 
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

        return redirect(route('campanias.interacciones.index'));
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

}
