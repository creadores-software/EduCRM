<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\Oportunidad;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class OportunidadDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'campanias.oportunidades.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Oportunidad $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Oportunidad $model)
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
                    this.api().columns(':lt(7)').every(function () {
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
            'contacto_id' => new Column(['title' => __('models/oportunidades.fields.contacto_id'), 'data' => 'contacto_id']),
            'formacion_id' => new Column(['title' => __('models/oportunidades.fields.formacion_id'), 'data' => 'formacion_id']),
            'responsable_id' => new Column(['title' => __('models/oportunidades.fields.responsable_id'), 'data' => 'responsable_id']),
            'estado_campania_id' => new Column(['title' => __('models/oportunidades.fields.estado_campania_id'), 'data' => 'estado_campania_id']),            
            'categoria_oportunidad_id' => new Column(['title' => __('models/oportunidades.fields.categoria_oportunidad_id'), 'data' => 'categoria_oportunidad_id']),
            'actualizacion_estado' => new Column(['title' => 'Actualización estado', 'data' => 'id']),
            'actualizacion_interaccion' => new Column(['title' => 'Actualización interacción', 'data' => 'id']),
            //Campos no visibles
            'justificacion_estado_campania_id' => new Column(['title' => __('models/oportunidades.fields.justificacion_estado_campania_id'), 'data' => 'justificacion_estado_campania_id','visible'=>false]),
            'interes' => new Column(['title' => __('models/oportunidades.fields.interes'), 'data' => 'interes','visible'=>false]),
            'probabilidad' => new Column(['title' => __('models/oportunidades.fields.probabilidad'), 'data' => 'probabilidad','visible'=>false]),            
            'ingreso_recibido' => new Column(['title' => __('models/oportunidades.fields.ingreso_recibido'), 'data' => 'ingreso_recibido','visible'=>false]),
            'ingreso_proyectado' => new Column(['title' => __('models/oportunidades.fields.ingreso_proyectado'), 'data' => 'ingreso_proyectado','visible'=>false]),
            'adicion_manual' => new Column(['title' => __('models/oportunidades.fields.adicion_manual'), 'data' => 'adicion_manual','visible'=>false]),
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
        return 'oportunidades_' .date("Ymd_His");
    }
}
