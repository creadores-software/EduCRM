<?php

namespace App\DataTables\Parametros;

use App\Models\Parametros\Parentesco;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ParentescoDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'parametros.parentescos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Parentesco $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Parentesco $model)
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
            'contacto_origen' => new Column(['title' => __('models/parentescos.fields.contacto_origen'), 'data' => 'contacto_origen']),
            'contacto_destino' => new Column(['title' => __('models/parentescos.fields.contacto_destino'), 'data' => 'contacto_destino']),
            'tipo_parentesco_id' => new Column(['title' => __('models/parentescos.fields.tipo_parentesco_id'), 'data' => 'tipo_parentesco_id']),
            'acudiente' => new Column(['title' => __('models/parentescos.fields.acudiente'), 'data' => 'acudiente'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'parentescos_' . time();
    }
}
