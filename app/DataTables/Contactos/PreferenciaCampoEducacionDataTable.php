<?php

namespace App\DataTables\Contactos;

use App\Models\Contactos\PreferenciaCampoEducacion;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PreferenciaCampoEducacionDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'contactos.preferencias_campos_educacion.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PreferenciaCampoEducacion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PreferenciaCampoEducacion $model)
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
            'campo_educacion_id' => new Column(['title' => __('models/preferenciasCamposEducacion.fields.campo_educacion_id'), 'data' => 'campo_educacion_id']),
            'informacion_relacional_id' => new Column(['title' => __('models/preferenciasCamposEducacion.fields.informacion_relacional_id'), 'data' => 'informacion_relacional_id'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'preferencias_campos_educacion_' .  date("Ymd_His");
    }
}
