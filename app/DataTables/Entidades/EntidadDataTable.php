<?php

namespace App\DataTables\Entidades;

use App\Models\Entidades\Entidad;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class EntidadDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'entidades.entidades.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Entidad $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Entidad $model)
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
                'order'     => [[0, 'desc']],
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
            'nombre' => new Column(['title' => __('models/entidades.fields.nombre'), 'data' => 'nombre']),
            'lugar_id' => new Column(['title' => __('models/entidades.fields.lugar_id'), 'data' => 'lugar_id']),
            'direccion' => new Column(['title' => __('models/entidades.fields.direccion'), 'data' => 'direccion']),
            'telefono' => new Column(['title' => __('models/entidades.fields.telefono'), 'data' => 'telefono']),
            'sector_id' => new Column(['title' => __('models/entidades.fields.sector_id'), 'data' => 'sector_id']),
            'actividad_economica_id' => new Column(['title' => __('models/entidades.fields.actividad_economica_id'), 'data' => 'actividad_economica_id']),
            'mi_universidad' => new Column(['title' => __('models/entidades.fields.mi_universidad'), 'data' => 'mi_universidad'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'entidades_' . time();
    }
}