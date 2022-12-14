<?php

namespace App\DataTables\Parametros;

use App\Models\Parametros\Lugar;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class LugarDataTable extends DataTable
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

        $dataTable->addColumn('action', 'parametros.lugares.datatables_actions');

        if($this->request()->has('action') && $this->request()->get('action')=="excel"){
             $dataTable->removeColumn('action');
        }
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Lugar $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Lugar $model)
    {
        return $model::leftjoin('lugar as padre', 'lugar.padre_id', '=', 'padre.id')
        ->select(['lugar.id','lugar.nombre','lugar.tipo','padre.nombre as nombre_padre'])->newQuery();
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
            'nombre' => new Column(['title' => __('models/lugares.fields.nombre'), 'data' => 'nombre','name'=>'lugar.nombre']),
            'tipo' => new Column(['title' => __('models/lugares.fields.tipo'), 'data' => 'tipo','name'=>'lugar.tipo','render'=> "function(){ return data=='P'? 'Pais' : data=='D'? 'Departamento' : 'Ciudad' }"]),
            'padre_id' => new Column(['title' => __('models/lugares.fields.padre_id'), 'data' => 'nombre_padre','name'=>'padre.nombre']),
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
        return 'lugares_' .  date("Ymd_His");
    }
}
