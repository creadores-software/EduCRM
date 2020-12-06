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
            ->filterColumn('activo', function ($query, $keyword) {
                $validacion=null;
                if(strpos(strtolower($keyword), 's')!==false){
                    $validacion=1; 
                    $query->whereRaw("activo = ?", [$validacion]);   
                }else if(strpos(strtolower($keyword), 'n')!==false){
                    $validacion=0;
                    $query->whereRaw("activo = ?", [$validacion]);    
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
        return $model->newQuery()->with(['entidad','nivelFormacion','campoEducacion'])->select('formacion.*');
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
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
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
            'entidad_id' => new Column(['title' => __('models/formaciones.fields.entidad_id'), 'data' => 'entidad.nombre', 'name'=>'entidad.nombre']),
            'nivel_formacion_id' => new Column(['title' => __('models/formaciones.fields.nivel_formacion_id'), 'data' => 'nivel_formacion.nombre', 'name'=>'nivelFormacion.nombre']),
            'campo_educacion_id' => new Column(['title' => __('models/formaciones.fields.campo_educacion_id'), 'data' => 'campo_educacion.nombre', 'name'=>'campoEducacion.nombre']),
            'activo' => new Column(['title' => __('models/formaciones.fields.activo'), 'data' => 'activo','render'=> "function(){ return data? 'Si' : 'No' }"]),
            'id' => new Column(['title' => 'ID', 'data' => 'id']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'formaciones_' .  date("Ymd_His");
    }
}
