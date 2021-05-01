<?php

namespace App\DataTables\Formaciones;

use App\Models\Formaciones\PeriodoAcademico;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PeriodoAcademicoDataTable extends DataTable
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
        ->addColumn('action', 'formaciones.periodos_academico.datatables_actions')
        ->editColumn('fecha_inicio', function ($periodo){
            if(empty($periodo->fecha_inicio)){
                return;
            }
            return date('Y-m-d', strtotime($periodo->fecha_inicio));
        })
        ->editColumn('fecha_fin', function ($periodo){
            if(empty($periodo->fecha_fin)){
                return;
            }
            return date('Y-m-d', strtotime($periodo->fecha_fin));
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PeriodoAcademico $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PeriodoAcademico $model)
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
                    this.api().columns(':lt(4)').every(function () {
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
            'nombre' => new Column(['title' => __('models/periodosAcademico.fields.nombre'), 'data' => 'nombre']),
            'fecha_inicio' => new Column(['title' => __('models/periodosAcademico.fields.fecha_inicio'), 'data' => 'fecha_inicio']),
            'fecha_fin' => new Column(['title' => __('models/periodosAcademico.fields.fecha_fin'), 'data' => 'fecha_fin']),
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
        return 'periodos_academico_' .date("Ymd_His");
    }
}
