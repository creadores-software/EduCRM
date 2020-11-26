<?php

namespace App\DataTables\Contactos;

use App\Models\Contactos\InformacionRelacional;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class InformacionRelacionalDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'contactos.informaciones_relacionales.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\InformacionRelacional $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(InformacionRelacional $model)
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
                'stateSave' => true,
                'order'     => [[0, 'asc']],
                'buttons'   => [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],                    
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json'),
                 ],
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
            'contacto_id' => new Column(['title' => __('models/informacionesRelacionales.fields.contacto_id'), 'data' => 'contacto_id']),
            'origen_id' => new Column(['title' => __('models/informacionesRelacionales.fields.origen_id'), 'data' => 'origen_id']),
            'referido_por_id' => new Column(['title' => __('models/informacionesRelacionales.fields.referido_por_id'), 'data' => 'referido_por_id']),
            'maximo_nivel_formacion_id' => new Column(['title' => __('models/informacionesRelacionales.fields.maximo_nivel_formacion_id'), 'data' => 'maximo_nivel_formacion_id']),
            'ocupacion_actual_id' => new Column(['title' => __('models/informacionesRelacionales.fields.ocupacion_actual_id'), 'data' => 'ocupacion_actual_id']),
            'estilo_vida_id' => new Column(['title' => __('models/informacionesRelacionales.fields.estilo_vida_id'), 'data' => 'estilo_vida_id']),
            'religion_id' => new Column(['title' => __('models/informacionesRelacionales.fields.religion_id'), 'data' => 'religion_id']),
            'raza_id' => new Column(['title' => __('models/informacionesRelacionales.fields.raza_id'), 'data' => 'raza_id']),
            'generacion_id' => new Column(['title' => __('models/informacionesRelacionales.fields.generacion_id'), 'data' => 'generacion_id']),
            'personalidad_id' => new Column(['title' => __('models/informacionesRelacionales.fields.personalidad_id'), 'data' => 'personalidad_id']),
            'beneficio_id' => new Column(['title' => __('models/informacionesRelacionales.fields.beneficio_id'), 'data' => 'beneficio_id']),
            'frecuencia_uso_id' => new Column(['title' => __('models/informacionesRelacionales.fields.frecuencia_uso_id'), 'data' => 'frecuencia_uso_id']),
            'estatus_usuario_id' => new Column(['title' => __('models/informacionesRelacionales.fields.estatus_usuario_id'), 'data' => 'estatus_usuario_id']),
            'estatus_lealtad_id' => new Column(['title' => __('models/informacionesRelacionales.fields.estatus_lealtad_id'), 'data' => 'estatus_lealtad_id']),
            'estado_disposicion_id' => new Column(['title' => __('models/informacionesRelacionales.fields.estado_disposicion_id'), 'data' => 'estado_disposicion_id']),
            'actitud_servicio_id' => new Column(['title' => __('models/informacionesRelacionales.fields.actitud_servicio_id'), 'data' => 'actitud_servicio_id']),
            'autoriza_comunicacion' => new Column(['title' => __('models/informacionesRelacionales.fields.autoriza_comunicacion'), 'data' => 'autoriza_comunicacion']),
            'actualizacion_autoriza_comunicacion' => new Column(['title' => __('models/informacionesRelacionales.fields.actualizacion_autoriza_comunicacion'), 'data' => 'actualizacion_autoriza_comunicacion'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'informaciones_relacionales_' .  date("Ymd_His");
    }
}
