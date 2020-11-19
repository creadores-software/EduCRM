<?php

namespace App\DataTables\Formaciones;

use App\Models\Formaciones\Formacion;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class FormacionDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'formaciones.formaciones.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Formacion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Formacion $model)
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
            'nombre' => new Column(['title' => __('models/formaciones.fields.nombre'), 'data' => 'nombre']),
            'entidad_id' => new Column(['title' => __('models/formaciones.fields.entidad_id'), 'data' => 'entidad_id']),
            'nivel_formacion_id' => new Column(['title' => __('models/formaciones.fields.nivel_formacion_id'), 'data' => 'nivel_formacion_id']),
            'area_conocimiento_id' => new Column(['title' => __('models/formaciones.fields.area_conocimiento_id'), 'data' => 'area_conocimiento_id']),
            'activo' => new Column(['title' => __('models/formaciones.fields.activo'), 'data' => 'activo'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'formaciones_' . time();
    }
}
