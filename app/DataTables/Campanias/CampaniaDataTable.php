<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\Campania;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class CampaniaDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'campanias.campanias.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Campania $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Campania $model)
    {
        return $model->newQuery();
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
            'tipo_campania_id' => new Column(['title' => __('models/campanias.fields.tipo_campania_id'), 'data' => 'tipo_campania_id']),
            'nombre' => new Column(['title' => __('models/campanias.fields.nombre'), 'data' => 'nombre']),
            'periodo_academico_id' => new Column(['title' => __('models/campanias.fields.periodo_academico_id'), 'data' => 'periodo_academico_id']),
            'equipo_mercadeo_id' => new Column(['title' => __('models/campanias.fields.equipo_mercadeo_id'), 'data' => 'equipo_mercadeo_id']),
            'activa' => new Column(['title' => __('models/campanias.fields.activa'), 'data' => 'activa']),
            'id' => new Column(['title' => 'ID', 'data' => 'id']),
            //Campos no visibles
            'fecha_inicio' => new Column(['title' => __('models/campanias.fields.fecha_inicio'), 'data' => 'fecha_inicio','visible'=>false]),
            'fecha_final' => new Column(['title' => __('models/campanias.fields.fecha_final'), 'data' => 'fecha_final','visible'=>false]),
            'descripcion' => new Column(['title' => __('models/campanias.fields.descripcion'), 'data' => 'descripcion','visible'=>false]),
            'inversion' => new Column(['title' => __('models/campanias.fields.inversion'), 'data' => 'inversion','visible'=>false]),
            'nivel_formacion_id' => new Column(['title' => __('models/campanias.fields.nivel_formacion_id'), 'data' => 'nivel_formacion_id','visible'=>false]),
            'nivel_academico_id' => new Column(['title' => __('models/campanias.fields.nivel_academico_id'), 'data' => 'nivel_academico_id','visible'=>false]),
            'facultad_id' => new Column(['title' => __('models/campanias.fields.facultad_id'), 'data' => 'facultad_id','visible'=>false]),
            'segmento_id' => new Column(['title' => __('models/campanias.fields.segmento_id'), 'data' => 'segmento_id','visible'=>false]),            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'campanias_' .date("Ymd_His");
    }
}
