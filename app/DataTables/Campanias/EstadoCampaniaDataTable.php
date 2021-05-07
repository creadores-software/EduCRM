<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\EstadoCampania;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class EstadoCampaniaDataTable extends DataTable
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
        $colores = EstadoCampania::arrayColores();

        return $dataTable
        ->addColumn('action', 'campanias.estados_campania.datatables_actions')
        ->editColumn('nombre', function ($estado) use($colores){
            $id=$estado->id;      
            $color = $colores[$id]['color'];      
            return "<span style='color:$color'><i class='fa fa-circle'></i></span> $estado->nombre";
        })
        ->rawColumns(['nombre','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\EstadoCampania $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EstadoCampania $model)
    {
        return $model->newQuery()->with(['tipoEstadoColor'])
            ->select('estado_campania.*');
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
            'tipo_estado_color_id' => new Column(['title' => __('models/estadosInteraccion.fields.tipo_estado_color_id'), 'data' => 'tipo_estado_color.nombre','name' => 'tipoEstadoColor.nombre']),
            'nombre' => new Column(['title' => __('models/estadosCampania.fields.nombre'), 'data' => 'nombre']),
            'descripcion' => new Column(['title' => __('models/estadosCampania.fields.descripcion'), 'data' => 'descripcion']),            
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
        return 'estados_campania_' .date("Ymd_His");
    }
}
