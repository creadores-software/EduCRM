<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\CategoriaOportunidad;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class CategoriaOportunidadDataTable extends DataTable
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
        ->addColumn('action', 'campanias.categorias_oportunidad.datatables_actions')
        ->editColumn('color_hexadecimal', function ($categoria){
            $color=$categoria->color_hexadecimal;            
            return "$color <span style='color:$color'><i class='fa fa-circle'></i><span>";
        })
        ->rawColumns(['color_hexadecimal','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CategoriaOportunidad $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CategoriaOportunidad $model)
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
                'order'     => [[2, 'desc'],[4, 'desc']],
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
            'nombre' => new Column(['title' => __('models/categoriasOportunidad.fields.nombre'), 'data' => 'nombre']),            
            'color_hexadecimal' => new Column(['title' => __('models/categoriasOportunidad.fields.color_hexadecimal'), 'data' => 'color_hexadecimal']),
            'capacidad_minima' => new Column(['title' => __('models/categoriasOportunidad.fields.capacidad_minima'), 'data' => 'capacidad_minima']),
            'capacidad_maxima' => new Column(['title' => __('models/categoriasOportunidad.fields.capacidad_maxima'), 'data' => 'capacidad_maxima']),            
            'interes_minimo' => new Column(['title' => __('models/categoriasOportunidad.fields.interes_minimo'), 'data' => 'interes_minimo']),
            'interes_maximo' => new Column(['title' => __('models/categoriasOportunidad.fields.interes_maximo'), 'data' => 'interes_maximo']),            
            //Campos no visibles
            'descripcion' => new Column(['title' => __('models/categoriasOportunidad.fields.descripcion'), 'data' => 'descripcion', 'visible'=>false]),
            'id' => new Column(['title' => 'ID', 'data' => 'id', 'visible'=>false]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'categorias_oportunidad_' .date("Ymd_His");
    }
}