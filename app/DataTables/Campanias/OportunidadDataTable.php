<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\Oportunidad;
use App\Models\Campanias\EstadoCampania;
use App\Models\Campanias\CategoriaOportunidad;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class OportunidadDataTable extends DataTable
{
    protected $exportColumns = "nombreCategoria";
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

        $coloresEstados = EstadoCampania::arrayColores();
        $coloresCategorias = CategoriaOportunidad::arrayColores();
        $autorizadas=Oportunidad::oportunidadesAutorizadas($request->get('idCampania'));

        $idContacto=false;
        if ($request->has('idContacto')) {
            $idContacto=$request->get('idContacto');
        }
        $idCampania=false;
        if ($request->has('idCampania')) {
            $idCampania=$request->get('idCampania');
        } 

        $dataTable
        ->addColumn('action', function($row) use ($idContacto,$idCampania){
            $id=$row->id;
            $autorizada=Oportunidad::tieneAutorizacion($id);
            return view('campanias.oportunidades.datatables_actions', compact('id','idContacto','idCampania','autorizada'));
        })
        ->editColumn('estado', function ($oportunidad) use($coloresEstados){
            $id=$oportunidad->id_estado;      
            $color = $coloresEstados[$id]['color']; 
            return "<span style='color:$color'><i class='fa fa-circle'></i></span> $oportunidad->estado";
        })
        ->editColumn('categoria', function ($oportunidad) use($coloresCategorias){
            $id=$oportunidad->id_categoria;
            $texto=$oportunidad->categoria;
            if(!empty($id)){
                $color = $coloresCategorias[$id]['color']; 
                $texto="<span style='color:$color'><i class='fa fa-circle'></i></span> $oportunidad->categoria";
            }    
            return $texto;
        })
        ->editColumn('adicion_manual', function ($row){
            return $row->adicion_manual? 'Si':'No';
        }) 
        ->editColumn('ultima_actualizacion', function ($oportunidad){
            if(empty($oportunidad->ultima_actualizacion)){
                return;
            }
            return date('Y-m-d H:i:s', strtotime($oportunidad->ultima_actualizacion));
        })
        ->editColumn('ultima_interaccion', function ($oportunidad){
            if(empty($oportunidad->ultima_interaccion)){
                return;
            }
            return date('Y-m-d H:i:s', strtotime($oportunidad->ultima_interaccion));
        })
        ->filterColumn('contacto', function($query, $keyword) {
            $query->whereRaw('CONCAT(contacto.nombres, " ", contacto.apellidos) like ?', ["%{$keyword}%"]);
        })
        ->filter(function ($query) use ($request,$autorizadas) {
            if ($request->has('idCampania')) {
                $query->where("campania_id",$request->get('idCampania'));
                if(empty($autorizadas)){
                    $query->where("oportunidad.id","ninguno");      
                } else if($autorizadas[0]=='todo'){
                    return;      
                }else{                  
                    $query->whereIn("oportunidad.id",$autorizadas);     
                }                  
            } 
            if ($request->has('idContacto')) {
                $query->whereRaw("contacto_id = ?", [$request->get('idContacto')]);   
            }            
            return;          
        })
        ->rawColumns(['estado','action','categoria']);

        if($request->has('action') && $request->get('action')=="excel"){
            $dataTable->removeColumn('action');
            $dataTable->editColumn('estado', function ($oportunidad){
                return $oportunidad->estado;
            });
            $dataTable->editColumn('categoria', function ($oportunidad){
                return $oportunidad->categoria;
            });
        }   

        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Oportunidad $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Oportunidad $model)
    {
        return $model::
            leftjoin('categoria_oportunidad as categoriaOportunidad', 'oportunidad.categoria_oportunidad_id', '=', 'categoriaOportunidad.id')
            ->leftjoin('campania', 'oportunidad.campania_id', '=', 'campania.id')
            ->leftjoin('contacto', 'oportunidad.contacto_id', '=', 'contacto.id')
            ->leftjoin('estado_campania as estadoCampania', 'oportunidad.estado_campania_id', '=', 'estadoCampania.id')
            ->leftjoin('formacion', 'oportunidad.formacion_id', '=', 'formacion.id')
            ->leftjoin('justificacion_estado_campania as justificacionEstadoCampania', 'oportunidad.justificacion_estado_campania_id', '=', 'justificacionEstadoCampania.id')
            ->leftjoin('users as responsable', 'oportunidad.responsable_id', '=', 'responsable.id')
            ->select(['oportunidad.id',    
                'categoriaOportunidad.id as id_categoria',            
                'categoriaOportunidad.nombre as categoria',
                'campania.nombre as campania',
                'campania.id as id_campania',
                DB::raw('CONCAT(contacto.nombres," ",contacto.apellidos) as contacto'),
                'estadoCampania.id as id_estado',
                'estadoCampania.nombre as estado',
                'formacion.nombre as formacion',
                'justificacionEstadoCampania.nombre as razon',
                'responsable.name as responsable',
                'ultima_actualizacion',
                'ultima_interaccion',
                'interes',
                'capacidad',
                'ingreso_recibido',
                'ingreso_proyectado',
                'adicion_manual',
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
        
        $idCampania=null;
        if ($this->request()->has("idCampania")) {
            $idCampania = $this->request()->get("idCampania");
            $columnDefs[]=['targets' => [0], 'visible' => false, 'searchable' => false];
        }
        $idContacto=null;
        if ($this->request()->has("idContacto")) {
            $idContacto = $this->request()->get("idContacto");
            $columnDefs[]=['targets' => [1], 'visible' => false, 'searchable' => false];
        }

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax(route('campanias.oportunidades.index', ['idCampania' => $idCampania,'idContacto' => $idContacto]))
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'columnDefs' => $columnDefs,
                'dom'       => 'Bfrtip',
                'stateSave' => false,
                'order'     => [[6, 'asc']],
                'buttons'   => [                    
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').'',
                       'exportOptions'=> [
                            'columns'=> 'th:not(:last-child)'
                        ]
                    ],
                ],
                 'language' => [
                   'url' => url('/js/Spanish.json'),
                 ],
                 'initComplete' => "function () {                                   
                    this.api().columns(':lt(8)').every(function () {
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
            'campania' => new Column(['title' => __('models/oportunidades.fields.campania_id'), 'data' => 'campania', 'name' => 'campania.nombre']),
            'contacto' => new Column(['title' => __('models/oportunidades.fields.contacto_id'), 'data' => 'contacto']),
            'categoria' => new Column(['title' => __('models/oportunidades.fields.categoria_oportunidad_id'), 'data' => 'categoria','name' => 'categoriaOportunidad.nombre','width' => '100px']),            
            'formacion' => new Column(['title' => __('models/oportunidades.fields.formacion_id'), 'data' => 'formacion', 'name' => 'formacion.nombre']),
            'responsable' => new Column(['title' => __('models/oportunidades.fields.responsable_id'), 'data' => 'responsable','name' => 'responsable.name','width' => '30px']),
            'estado' => new Column(['title' => __('models/oportunidades.fields.estado_campania_id'), 'data' => 'estado', 'name' => 'estadoCampania.nombre','width' => '100px']),            
            'ultima_actualizacion' => new Column(['title' => __('models/oportunidades.fields.ultima_actualizacion'), 'data' => 'ultima_actualizacion','width' => '60px']),
            'ultima_interaccion' => new Column(['title' => __('models/oportunidades.fields.ultima_interaccion'), 'data' => 'ultima_interaccion','width' => '60px']),
            //Campos no visibles            
            'razon' => new Column(['title' => __('models/oportunidades.fields.justificacion_estado_campania_id'), 'data' => 'razon','name' => 'justificacionEstadoCampania.nombre','visible'=>false]),
            'interes' => new Column(['title' => __('models/oportunidades.fields.interes'), 'data' => 'interes','visible'=>false,'exportable' => false]),
            'capacidad' => new Column(['title' => __('models/oportunidades.fields.capacidad'), 'data' => 'capacidad','visible'=>false]),            
            'ingreso_recibido' => new Column(['title' => __('models/oportunidades.fields.ingreso_recibido'), 'data' => 'ingreso_recibido','visible'=>false]),
            'ingreso_proyectado' => new Column(['title' => __('models/oportunidades.fields.ingreso_proyectado'), 'data' => 'ingreso_proyectado','visible'=>false]),
            'adicion_manual' => new Column(['title' => __('models/oportunidades.fields.adicion_manual'), 'data' => 'adicion_manual','visible'=>false,]),
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
        return 'oportunidades_' .date("Ymd_His");
    }
}
