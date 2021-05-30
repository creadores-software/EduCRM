<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\Interaccion;
use App\Models\Campanias\EstadoInteraccion;
use App\Models\Campanias\TipoEstadoColor;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Log;

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
            return "<span style='color:$color'><i class='fa fa-circle'></i></span> {$interaccion->estado}";
        })
        ->editColumn('fecha_inicio', function ($interaccion){
            if(empty($interaccion->fecha_inicio)){
                return;
            }
            $tiempoActual=date("Y-m-d H:i:s");
            $tiempoInicio=date("Y-m-d H:i:s",strtotime($interaccion->fecha_inicio));   
            $atraso="";           
            if($interaccion->id_estado==2 && $tiempoInicio<$tiempoActual){
                $colorNegativo=TipoEstadoColor::where('id',3)->first()->color_hexadecimal;
                $atraso="<span style='color:{$colorNegativo}'><i class='fa fa-circle'></i></span> ";  
            }
            return $atraso.date('Y-m-d h:i:s A', strtotime($interaccion->fecha_inicio));
        })
        ->editColumn('fecha_fin', function ($interaccion){
            if(empty($interaccion->fecha_fin)){
                return;
            }
            return date('Y-m-d h:i:s A', strtotime($interaccion->fecha_fin));
        })
        ->filter(function ($query) use ($request) {
            if ($request->has('idOportunidad') && !empty($request->get('idOportunidad'))) {
                $idOportunidad=$request->get('idOportunidad');
                $query->where("oportunidad_id",$idOportunidad);
            } 
            if ($request->has('idContacto') && !empty($request->get('idContacto'))) {                
                $idContacto=$request->get('idContacto');
                $query->where("oportunidad.contacto_id",$idContacto);
            } 
             
            $idCampania=false;
            $idResponsable=false;
            $idEstado=false;

            if ($request->has('idCampania')) {
                $idCampania=$request->get('idCampania');
            }            
            if ($request->has('idResponsable')) {
                $idResponsable=$request->get('idResponsable');
            }            
            if ($request->has('idEstado') && !empty($request->get('idEstado'))) {
                $idEstado=$request->get('idEstado');
                Interaccion::filtroInteracciones($query,$idCampania,$idResponsable,$idEstado);
            }         
            return;          
        })
        ->rawColumns(['estado','action','fecha_inicio']);

        if($this->request()->has('action') && $this->request()->get('action')=="excel"){
             $dataTable->removeColumn('action');
             $dataTable->editColumn('estado', function ($interaccion){
                return $interaccion->estado;
            });
            $dataTable->editColumn('fecha_inicio', function ($interaccion){
                return $interaccion->fecha_inicio;
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
                'oportunidad.contacto_id', 
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
        $idCampania=false;
        if ($this->request()->has('idCampania')) {
            $idCampania=$this->request()->get('idCampania');
        }
        $idResponsable=false;
        if ($this->request()->has('idResponsable')) {
            $idResponsable=$this->request()->get('idResponsable');
        }
        $idEstado=false;
        if ($this->request()->has('idEstado')) {
            $idEstado=$this->request()->get('idEstado');
        }
        $idOportunidad=false;
        if ($this->request()->has('idOportunidad')) {
            $idOportunidad=$this->request()->get('idOportunidad');
        } 
        $idContacto=false;
        if ($this->request()->has('idContacto')) {
            $idContacto=$this->request()->get('idContacto');
        } 

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax(route('campanias.interacciones.index', [
                'idOportunidad' => $idOportunidad,
                'idCampania' => $idCampania,
                'idResponsable' => $idResponsable,
                'idEstado' => $idEstado,
                'idContacto' => $idContacto,
            ]))
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
