<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\TipoEstadoColor;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class TipoEstadoColorDataTable extends DataTable
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

        $dataTable
        ->addColumn('action', 'campanias.tipos_estado_color.datatables_actions')
        ->editColumn('color_hexadecimal', function ($tipo){
            $color=$tipo->color_hexadecimal;            
            return "$color <span style='color:$color'><i class='fa fa-circle'></i></span>";
        })
        ->rawColumns(['color_hexadecimal','action']);

        if($this->request()->has('action') && $this->request()->get('action')=="excel"){
            $dataTable->removeColumn('action');
            $dataTable->editColumn('color_hexadecimal', function ($tipo){
                return $tipo->color_hexadecimal;
            });
        }
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TipoEstadoColor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TipoEstadoColor $model)
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
                    this.api().columns(':lt(3)').every(function () {
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
            'nombre' => new Column(['title' => __('models/tiposEstadoColor.fields.nombre'), 'data' => 'nombre']),
            'color_hexadecimal' => new Column(['title' => __('models/tiposEstadoColor.fields.color_hexadecimal'), 'data' => 'color_hexadecimal']),
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
        return 'tipos_estado_color_' .date("Ymd_His");
    }
}
