<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\Interaccion;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class InteraccionDataTable extends DataTable
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

        $dataTable->addColumn('action', 'campanias.interacciones.datatables_actions');

        if($this->request()->has('action') && $this->request()->get('action')=="excel"){
             $dataTable->removeColumn('action');
        }
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Interaccion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Interaccion $model)
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
                    this.api().columns(':lt(5)').every(function () {
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
            'tipo_interaccion_id' => new Column(['title' => __('models/interacciones.fields.tipo_interaccion_id'), 'data' => 'tipo_interaccion_id']),
            'fecha_inicio' => new Column(['title' => __('models/interacciones.fields.fecha_inicio'), 'data' => 'fecha_inicio']),            
            'estado_interaccion_id' => new Column(['title' => __('models/interacciones.fields.estado_interaccion_id'), 'data' => 'estado_interaccion_id']),            
            'observacion' => new Column(['title' => __('models/interacciones.fields.observacion'), 'data' => 'observacion']),
            'oportunidad_id' => new Column(['title' => __('models/interacciones.fields.oportunidad_id'), 'data' => 'oportunidad_id']),
            //Campos no visibles
            'fecha_fin' => new Column(['title' => __('models/interacciones.fields.fecha_fin'), 'data' => 'fecha_fin','visible'=>false]),            
            'contacto_id' => new Column(['title' => __('models/interacciones.fields.contacto_id'), 'data' => 'contacto_id','visible'=>false]),
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
        return 'interacciones_' .date("Ymd_His");
    }
}
