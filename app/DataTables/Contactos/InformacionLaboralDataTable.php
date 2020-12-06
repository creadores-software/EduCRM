<?php

namespace App\DataTables\Contactos;

use App\Models\Contactos\InformacionLaboral;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class InformacionLaboralDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'contactos.informaciones_laborales.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\InformacionLaboral $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(InformacionLaboral $model)
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
            'contacto_id' => new Column(['title' => __('models/informacionesLaborales.fields.contacto_id'), 'data' => 'contacto_id']),
            'entidad_id' => new Column(['title' => __('models/informacionesLaborales.fields.entidad_id'), 'data' => 'entidad_id']),
            'ocupacion_id' => new Column(['title' => __('models/informacionesLaborales.fields.ocupacion_id'), 'data' => 'ocupacion_id']),
            'area' => new Column(['title' => __('models/informacionesLaborales.fields.area'), 'data' => 'area']),
            'funciones' => new Column(['title' => __('models/informacionesLaborales.fields.funciones'), 'data' => 'funciones']),
            'telefono' => new Column(['title' => __('models/informacionesLaborales.fields.telefono'), 'data' => 'telefono']),
            'fecha_inicio' => new Column(['title' => __('models/informacionesLaborales.fields.fecha_inicio'), 'data' => 'fecha_inicio']),
            'fecha_fin' => new Column(['title' => __('models/informacionesLaborales.fields.fecha_fin'), 'data' => 'fecha_fin'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'informaciones_laborales_' .  date("Ymd_His");
    }
}
