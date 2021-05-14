<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\Interaccion;
use App\Models\Campanias\EstadoInteraccion;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class InteraccionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        $request=$this->request();
        $colores = EstadoInteraccion::arrayColores();

        $idContacto=false;
        if ($request->has('idContacto')) {
            $idContacto=$request->get('idContacto');
        }
        $idOportunidad=false;
        if ($request->has('idOportunidad')) {
            $idOportunidad=$request->get('idOportunidad');
        } 

        $dataTable
        ->addColumn('action', function($row) use ($idOportunidad){
            $id=$row->id;
            $editable=false;
            $estadoInteraccion=EstadoInteraccion::where('id',$row->id_estado)->first();
            if($estadoInteraccion->tipoEstadoColor->nombre=='Neutro'){
                //Solo agenda
                $editable=true;
            }
            return view('campanias.interacciones.datatables_actions', compact('id','idOportunidad','editable'));
        })
        ->editColumn('estado', function ($interaccion) use($colores){
            $id=$interaccion->id_estado;      
            $color = $colores[$id]['color']; 
            return "<span style='color:$color'><i class='fa fa-circle'></i></span> $interaccion->estado";
        })
        ->editColumn('fecha_inicio', function ($interaccion){
            if(empty($interaccion->fecha_inicio)){
                return;
            }
            return date('Y-m-d H:i:s', strtotime($interaccion->fecha_inicio));
        })
        ->editColumn('fecha_fin', function ($interaccion){
            if(empty($interaccion->fecha_fin)){
                return;
            }
            return date('Y-m-d H:i:s', strtotime($interaccion->fecha_fin));
        })
        ->filter(function ($query) use ($request) {
            if ($request->has('idOportunidad')) {
                $query->where("oportunidad_id",$request->get('idOportunidad'));
            } 
            if ($request->has('idContacto')) {
                $query->where("oportunidad.contacto_id",$request->get('idContacto'));   
            }            
            return;          
        })
        ->rawColumns(['estado','action']);

        if($this->request()->has('action') && $this->request()->get('action')=="excel"){
             $dataTable->removeColumn('action');
             $dataTable->editColumn('estado', function ($oportunidad){
                return $oportunidad->estado;
            });
        }
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Interaccion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Interaccion $model)
    {
        return $model::
            leftjoin('tipo_interaccion as tipoInteraccion', 'tipoInteraccion.id', '=', 'interaccion.tipo_interaccion_id')
            ->leftjoin('estado_interaccion as estado', 'estado.id', '=', 'interaccion.estado_interaccion_id')
            ->leftjoin('users', 'users.id', '=', 'interaccion.users_id')
            ->leftjoin('oportunidad', 'oportunidad.id', '=', 'interaccion.oportunidad_id')
            ->leftjoin('campania', 'campania.id', '=', 'oportunidad.campania_id')
            ->select(['interaccion.id',  
                'campania.nombre as campania',
                'interaccion.oportunidad_id',
                'interaccion.contacto_id', 
                'tipoInteraccion.nombre as tipo_interaccion',
                'estado.id as id_estado',            
                'estado.nombre as estado',
                'interaccion.fecha_inicio',    
                'interaccion.fecha_fin',   
                'interaccion.observacion',               
                'users.name as users'
            ])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $columnDefs=[];
        $idOportunidad=null;
        if ($this->request()->has("idOportunidad")) {
            $idOportunidad = $this->request()->get("idOportunidad");
        }
        $idContacto=null;
        if ($this->request()->has("idContacto")) {
            $idContacto = $this->request()->get("idContacto");
        }

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax(route('campanias.interacciones.index', ['idOportunidad' => $idOportunidad,'idContacto' => $idContacto]))
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'columnDefs' => $columnDefs,
                'dom'       => 'Bfrtip',
                'stateSave' => false,
                'order'     => [[3, 'desc']],
                'buttons'   => [                    
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                ],
                 'language' => [
                   'url' => url('/js/Spanish.json'),
                 ],
                 'initComplete' => "function () {                                   
                    this.api().columns(':lt(7)').every(function () {
                        var column = this;
                        var input = document.createElement(\"input\");
                        $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();                            
                        });
                    });
                }",
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'campania_id' => new Column(['title' => 'Campaña', 'data' => 'campania', 'name' => 'campania.nombre']),
            'tipo_interaccion_id' => new Column(['title' => __('models/interacciones.fields.tipo_interaccion_id'), 'data' => 'tipo_interaccion','name'=>'tipoInteraccion.nombre']),
            'estado_interaccion_id' => new Column(['title' => 'Estado', 'data' => 'estado', 'name'=>'estado.nombre','width'=>'100px']),
            'fecha_inicio' => new Column(['title' => __('models/interacciones.fields.fecha_inicio'), 'data' => 'fecha_inicio']),
            'fecha_fin' => new Column(['title' => __('models/interacciones.fields.fecha_fin'), 'data' => 'fecha_fin']),                        
            'observacion' => new Column(['title' => __('models/interacciones.fields.observacion'), 'data' => 'observacion']),
            'users_id' => new Column(['title' => __('models/interacciones.fields.users_id'), 'data' => 'users', 'name'=>'users.name']),            
            'contacto_id' => new Column(['title' => __('models/interacciones.fields.contacto_id'), 'data' => 'contacto_id','visible'=>false]),            
            'id' => new Column(['title' => 'ID', 'data' => 'id','visible'=>false]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'interacciones_' .date("Ymd_His");
    }
}
