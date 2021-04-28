<?php

namespace App\DataTables\Formaciones;

use App\Models\Formaciones\Formacion;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class FormacionDataTable extends DataTable
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

        return $dataTable
            ->addColumn('action', 'formaciones.formaciones.datatables_actions')
            ->editColumn('activo', function ($formacion){
                return $formacion->activo? 'Si':'No';
            })
            ->filterColumn('activo', function ($query, $keyword) {
                $validacion=null;
                if(strpos(strtolower($keyword), 's')!==false){
                    $validacion=1; 
                    $query->whereRaw("activo = ?", [$validacion]);   
                }else if(strpos(strtolower($keyword), 'n')!==false){
                    $validacion=0;
                    $query->whereRaw("activo = ?", [$validacion]);    
                }else{
                    $query->whereRaw("activo = 3"); //Ninguno    
                }             
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Formacion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Formacion $model)
    {
        return $model->newQuery()->with(['entidad','nivelFormacion','campoEducacion','modalidad','periodicidad','reconocimiento','facultad','jornada'])
            ->select('formacion.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => false,
                'order'     => [[0, 'asc']],
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
                    this.api().columns(':lt(6)').every(function () {
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
            'nombre' => new Column(['title' => __('models/formaciones.fields.nombre'), 'data' => 'nombre']),
            'entidad_id' => new Column(['title' => __('models/formaciones.fields.entidad_id'), 'data' => 'entidad.nombre', 'name' => 'entidad.nombre']),
            'nivel_formacion_id' => new Column(['title' => __('models/formaciones.fields.nivel_formacion_id'), 'data' => 'nivel_formacion.nombre','name' => 'nivelFormacion.nombre']),                        
            'modalidad_id' => new Column(['title' => __('models/formaciones.fields.modalidad_id'), 'data' => 'modalidad.nombre','name' => 'modalidad.nombre']),
            'jornada_id' => new Column(['title' => __('models/formaciones.fields.jornada_id'), 'data' => 'jornada.nombre', 'name' => 'jornada.nombre']),
            'activo' => new Column(['title' => __('models/formaciones.fields.activo'), 'data' => 'activo']),            
            'id' => new Column(['title' => 'ID', 'data' => 'id']),
            //Campos no visibles que salen en exportación
            'campo_educacion_id' => new Column(['title' => __('models/formaciones.fields.campo_educacion_id'), 'data' => 'campo_educacion.nombre','name' => 'campoEducacion.nombre','visible'=>false]),
            'codigo_snies' => new Column(['title' => __('models/formaciones.fields.codigo_snies'), 'data' => 'codigo_snies','visible'=>false]),
            'titulo_otorgado' => new Column(['title' => __('models/formaciones.fields.titulo_otorgado'), 'data' => 'titulo_otorgado','visible'=>false]),
            'periodicidad_id' => new Column(['title' => __('models/formaciones.fields.periodicidad_id'), 'data' => 'periodicidad.nombre','name' => 'periodicidad.nombre','visible'=>false]),
            'periodos_duracion' => new Column(['title' => __('models/formaciones.fields.periodos_duracion'), 'data' => 'periodos_duracion','visible'=>false]),
            'reconocimiento_id' => new Column(['title' => __('models/formaciones.fields.reconocimiento_id'), 'data' => 'reconocimiento.nombre','data' => 'reconocimiento.nombre','visible'=>false]),
            'costo_matricula' => new Column(['title' => __('models/formaciones.fields.costo_matricula'), 'data' => 'costo_matricula','visible'=>false]),
            'facultad_id' => new Column(['title' => __('models/formaciones.fields.facultad_id'), 'data' => 'facultad.nombre','name' => 'facultad.nombre','visible'=>false]),            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'formaciones_' .date("Ymd_His");
    }
}
