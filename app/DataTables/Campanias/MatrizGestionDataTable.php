<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\MatrizGestion;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class MatrizGestionDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'campanias.matrices_gestion.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MatrizGestion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MatrizGestion $model)
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
            'accion' => new Column(['title' => __('models/matricesGestion.fields.accion'), 'data' => 'accion']),            
            'interes_minimo' => new Column(['title' => __('models/matricesGestion.fields.interes_minimo'), 'data' => 'interes_minimo']),
            'interes_maximo' => new Column(['title' => __('models/matricesGestion.fields.interes_maximo'), 'data' => 'interes_maximo']),
            'probabilidad_minima' => new Column(['title' => __('models/matricesGestion.fields.probabilidad_minima'), 'data' => 'probabilidad_minima']),
            'probabilidad_maxima' => new Column(['title' => __('models/matricesGestion.fields.probabilidad_maxima'), 'data' => 'probabilidad_maxima']),
            'color_hexadecimal' => new Column(['title' => __('models/matricesGestion.fields.color_hexadecimal'), 'data' => 'color_hexadecimal']),
            //No visibles            
            'descripcion' => new Column(['title' => __('models/matricesGestion.fields.descripcion'), 'data' => 'descripcion','visible'=>false]),
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
        return 'matrices_gestion_' .date("Ymd_His");
    }
}
