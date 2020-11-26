<?php

namespace App\DataTables\Contactos;

use App\Models\Contactos\Contacto;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ContactoDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'contactos.contactos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Contactos\Contacto $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Contacto $model)
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
            'tipo_documento_id' => new Column(['title' => __('models/contactos.fields.tipo_documento_id'), 'data' => 'tipo_documento_id']),
            'identificacion' => new Column(['title' => __('models/contactos.fields.identificacion'), 'data' => 'identificacion']),
            'prefijo_id' => new Column(['title' => __('models/contactos.fields.prefijo_id'), 'data' => 'prefijo_id']),
            'nombres' => new Column(['title' => __('models/contactos.fields.nombres'), 'data' => 'nombres']),
            'apellidos' => new Column(['title' => __('models/contactos.fields.apellidos'), 'data' => 'apellidos']),
            'fecha_nacimiento' => new Column(['title' => __('models/contactos.fields.fecha_nacimiento'), 'data' => 'fecha_nacimiento']),
            'genero_id' => new Column(['title' => __('models/contactos.fields.genero_id'), 'data' => 'genero_id']),
            'estado_civil_id' => new Column(['title' => __('models/contactos.fields.estado_civil_id'), 'data' => 'estado_civil_id']),
            'celular' => new Column(['title' => __('models/contactos.fields.celular'), 'data' => 'celular']),
            'telefono' => new Column(['title' => __('models/contactos.fields.telefono'), 'data' => 'telefono']),
            'correo_personal' => new Column(['title' => __('models/contactos.fields.correo_personal'), 'data' => 'correo_personal']),
            'correo_institucional' => new Column(['title' => __('models/contactos.fields.correo_institucional'), 'data' => 'correo_institucional']),
            'lugar_residencia' => new Column(['title' => __('models/contactos.fields.lugar_residencia'), 'data' => 'lugar_residencia']),
            'direccion_residencia' => new Column(['title' => __('models/contactos.fields.direccion_residencia'), 'data' => 'direccion_residencia']),
            'estrato' => new Column(['title' => __('models/contactos.fields.estrato'), 'data' => 'estrato']),
            'activo' => new Column(['title' => __('models/contactos.fields.activo'), 'data' => 'activo']),
            'observacion' => new Column(['title' => __('models/contactos.fields.observacion'), 'data' => 'observacion'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'contactos_' .  date("Ymd_His");
    }
}
