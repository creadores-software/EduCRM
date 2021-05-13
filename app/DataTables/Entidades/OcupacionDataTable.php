<?php

namespace App\DataTables\Entidades;

use App\Models\Entidades\Ocupacion;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class OcupacionDataTable extends DataTable
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

        $dataTable->addColumn('action', 'entidades.ocupaciones.datatables_actions');

        if($this->request()->has('action') && $this->request()->get('action')=="excel"){
             $dataTable->removeColumn('action');
        }
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Ocupacion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Ocupacion $model)
    {
        return $model::
            leftjoin('tipo_ocupacion as tipoOcupacion', 'tipoOcupacion.id', '=', 'ocupacion.tipo_ocupacion_id')
            ->select([
                'ocupacion.id',
                'ocupacion.nombre',
                'tipoOcupacion.nombre as tipo_ocupacion',
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
            'nombre' => new Column(['title' => __('models/ocupaciones.fields.nombre'), 'data' => 'nombre']),
            'tipo_ocupacion_id' => new Column(['title' => __('models/ocupaciones.fields.tipo_ocupacion_id'), 'data' => 'tipo_ocupacion','name'=>'tipoOcupacion.nombre']),
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
        return 'ocupaciones_' .  date("Ymd_His");
    }
}
