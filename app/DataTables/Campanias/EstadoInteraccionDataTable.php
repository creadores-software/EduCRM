<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\EstadoInteraccion;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class EstadoInteraccionDataTable extends DataTable
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
        $colores = EstadoInteraccion::arrayColores();

        $dataTable
        ->addColumn('action', 'campanias.estados_interaccion.datatables_actions')
        ->editColumn('nombre', function ($estado) use($colores){
            $id=$estado->id;      
            $color = $colores[$id]['color'];      
            return "<span style='color:$color'><i class='fa fa-circle'></i></span> $estado->nombre";
        })
        ->rawColumns(['nombre','action']);

        if($this->request()->has('action') && $this->request()->get('action')=="excel"){
            $dataTable->removeColumn('action');
            $dataTable->editColumn('nombre', function ($estado){
                return $estado->nombre;
            });
        }
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\EstadoInteraccion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EstadoInteraccion $model)
    {
        return $model::
            leftjoin('tipo_estado_color as tipoEstadoColor', 'tipoEstadoColor.id', '=', 'estado_interaccion.tipo_estado_color_id')
            ->select([
                'estado_interaccion.id',
                'estado_interaccion.nombre',
                'estado_interaccion.descripcion',
                'tipoEstadoColor.nombre as tipo_estado',
            ])->newQuery();
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
                'order'     => [[0, 'desc'],[1, 'asc']],
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
            'tipo_estado_color_id' => new Column(['title' => __('models/estadosInteraccion.fields.tipo_estado_color_id'), 'data' => 'tipo_estado','name' => 'tipoEstadoColor.nombre']),
            'nombre' => new Column(['title' => __('models/estadosInteraccion.fields.nombre'), 'data' => 'nombre']),
            'descripcion' => new Column(['title' => __('models/estadosInteraccion.fields.descripcion'), 'data' => 'descripcion']),            
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
        return 'estados_interaccion_' .date("Ymd_His");
    }
}
