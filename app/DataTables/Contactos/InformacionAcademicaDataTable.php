<?php

namespace App\DataTables\Contactos;

use App\Models\Contactos\InformacionAcademica;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Illuminate\Http\Request;

class InformacionAcademicaDataTable extends DataTable
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

        $idContacto=false;
        if ($request->has('idContacto')) {
            $idContacto=$request->get('idContacto');
        }

        return $dataTable
        ->addColumn('action', function($row) use ($idContacto){
            $id=$row->id;
            return view('contactos.informaciones_academicas.datatables_actions', 
            compact('id','idContacto'));
        })
        ->editColumn('finalizado', function ($informacion){
            return $informacion->finalizado? 'Si':'No';
        })  
        ->editColumn('fecha_grado_estimada', function ($informacion){
            if(empty($informacion->fecha_grado_estimada)){
                return;
            }
            return date('Y-m-d', strtotime($informacion->fecha_grado_estimada));
        })
        ->editColumn('fecha_grado_real', function ($informacion){
            if(empty($informacion->fecha_grado_real)){
                return;
            }
            return date('Y-m-d', strtotime($informacion->fecha_grado_real));
        })      
        ->filterColumn('finalizado', function ($query, $keyword) {
            $validacion=null;
            if(strpos(strtolower($keyword), 's')!==false){
                $validacion=1; 
                $query->whereRaw("finalizado = ?", [$validacion]);   
            }else if(strpos(strtolower($keyword), 'n')!==false){
                $validacion=0;
                $query->whereRaw("finalizado = ?", [$validacion]);    
            }else{
                $query->whereRaw("finalizado = 3"); //Ninguno    
            }               
        })
        ->filter(function ($query) use ($request) {
            if (!$request->has('idContacto')) {
                return;
            }else{
                $query->whereRaw("contacto_id = ?", [$request->get('idContacto')]);   
            }            
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\InformacionAcademica $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(InformacionAcademica $model)
    {
        return $model->newQuery()
            ->with(['formacion','entidad'])->select('informacion_academica.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $idContacto=null;
        if ($this->request()->has("idContacto")) {
            $idContacto = $this->request()->get("idContacto");
        }

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax(route('contactos.informacionesAcademicas.index', ['idContacto' => $idContacto]))
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => false,
                'order'     => [[0, 'asc']],
                'buttons'   => [                
                    [
                        'extend' => 'reset',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-undo"></i> Restablecer Filtros'
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],                   
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json'),
                 ],
                 'initComplete' => "function () {                                   
                    this.api().columns(':lt(5)').every(function () {
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
            'entidad_id' => new Column(['title' => __('models/informacionesAcademicas.fields.entidad_id'), 'data' => 'entidad.nombre','name' => 'entidad.nombre']),         
            'formacion_id' => new Column(['title' => __('models/informacionesAcademicas.fields.formacion_id'), 'data' => 'formacion.nombre','name' => 'formacion.nombre']),
            'finalizado' => new Column(['title' => __('models/informacionesAcademicas.fields.finalizado'), 'data' => 'finalizado']),
            'fecha_grado_estimada' => new Column(['title' => __('models/informacionesAcademicas.fields.fecha_grado_estimada'), 'data' => 'fecha_grado_estimada']),
            'fecha_grado_real' => new Column(['title' => __('models/informacionesAcademicas.fields.fecha_grado_real'), 'data' => 'fecha_grado_real']),
            'contacto_id' => new Column(['title' => __('models/informacionesAcademicas.fields.contacto_id'), 'data' => 'contacto_id','visible'=>false]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'informaciones_academicas_' .  date("Ymd_His");
    }
}
