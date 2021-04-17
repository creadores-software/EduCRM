<?php

namespace App\DataTables\Contactos;

use App\Models\Contactos\ContactoTipoContacto;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ContactoTipoContactoDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'contactos.contactos_tipo_contacto.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Contactos\ContactoTipoContacto $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ContactoTipoContacto $model)
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
            'tipo_contacto_id' => new Column(['title' => __('models/contactosTipoContacto.fields.tipo_contacto_id'), 'data' => 'tipo_contacto_id']),
            'contacto_id' => new Column(['title' => __('models/contactosTipoContacto.fields.contacto_id'), 'data' => 'contacto_id'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'contactos_tipo_contacto_' .  date("Ymd_His");
    }
}
