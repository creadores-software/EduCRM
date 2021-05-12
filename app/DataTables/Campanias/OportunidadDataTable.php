<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\Oportunidad;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;

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
        $idContacto=false;
        if ($request->has('idContacto')) {
            $idContacto=$request->get('idContacto');
        }
        $idCampania=false;
        if ($request->has('idCampania')) {
            $idCampania=$request->get('idCampania');
        } 

        return $dataTable
        ->addColumn('action', function($row) use ($idContacto,$idCampania){
            $id=$row->id;
            if($this->request()->has('action') && $this->request()->get('action')=="excel"){return;}
            return view('campanias.oportunidades.datatables_actions', 
            compact('id','idContacto','idCampania'));
        })
        ->editColumn('adicion_manual', function ($row){
            return $row->adicion_manual? 'Si':'No';
        }) 
        ->filterColumn('nombreContacto', function($query, $keyword) {
            $query->whereRaw('CONCAT(contacto.nombres, " ", contacto.apellidos) like ?', ["%{$keyword}%"]);
        })
        ->filter(function ($query) use ($request) {
            if ($request->has('idCampania')) {
                $query->whereRaw("campania_id = ?", [$request->get('idCampania')]);   
            } 
            if ($request->has('idContacto')) {
                $query->whereRaw("contacto_id = ?", [$request->get('idContacto')]);   
            }  
            return;          
        });
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
                'categoriaOportunidad.nombre as nombreCategoria',
                'campania.nombre as nombreCampania',
                DB::raw('CONCAT(contacto.nombres," ",contacto.apellidos) as nombreContacto'),
                'estadoCampania.nombre as nombreEstado',
                'formacion.nombre as nombreFormacion',
                'justificacionEstadoCampania.nombre as nombreRazon',
                'responsable.name as nombreResponsable',
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
        $idCampania=null;
        if ($this->request()->has("idCampania")) {
            $idCampania = $this->request()->get("idCampania");
        }
        $idContacto=null;
        if ($this->request()->has("idContacto")) {
            $idContacto = $this->request()->get("idContacto");
        }

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax(route('campanias.oportunidades.index', ['idCampania' => $idCampania,'idContacto' => $idContacto]))
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => false,
                'order'     => [[0, 'asc']],
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
            'campania_id' => new Column(['title' => __('models/oportunidades.fields.campania_id'), 'data' => 'nombreCampania', 'name' => 'campania.nombre']),
            'nombreContacto' => new Column(['title' => __('models/oportunidades.fields.contacto_id'), 'data' => 'nombreContacto']),
            'formacion_id' => new Column(['title' => __('models/oportunidades.fields.formacion_id'), 'data' => 'nombreFormacion', 'name' => 'formacion.nombre']),
            'responsable_id' => new Column(['title' => __('models/oportunidades.fields.responsable_id'), 'data' => 'nombreResponsable','name' => 'responsable.name']),
            'estado_campania_id' => new Column(['title' => __('models/oportunidades.fields.estado_campania_id'), 'data' => 'nombreEstado', 'name' => 'estadoCampania.nombre']),            
            'ultima_actualizacion' => new Column(['title' => __('models/oportunidades.fields.ultima_actualizacion'), 'data' => 'ultima_actualizacion']),
            'ultima_interaccion' => new Column(['title' => __('models/oportunidades.fields.ultima_interaccion'), 'data' => 'ultima_interaccion']),
            //Campos no visibles
            'categoria_oportunidad_id' => new Column(['title' => __('models/oportunidades.fields.categoria_oportunidad_id'), 'data' => 'nombreCategoria','name' => 'categoriaOportunidad.nombre','visible'=>false]),            
            'justificacion_estado_campania_id' => new Column(['title' => __('models/oportunidades.fields.justificacion_estado_campania_id'), 'data' => 'nombreRazon','name' => 'justificacionEstadoCampania.nombre','visible'=>false]),
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
