<?php

namespace App\DataTables\Contactos;

use App\Models\Contactos\InformacionEscolar;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class InformacionEscolarDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'contactos.informaciones_escolares.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\InformacionEscolar $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(InformacionEscolar $model)
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
            'contacto_id' => new Column(['title' => __('models/informacionesEscolares.fields.contacto_id'), 'data' => 'contacto_id']),
            'entidad_id' => new Column(['title' => __('models/informacionesEscolares.fields.entidad_id'), 'data' => 'entidad_id']),
            'nivel_educativo_id' => new Column(['title' => __('models/informacionesEscolares.fields.nivel_educativo_id'), 'data' => 'nivel_educativo_id']),
            'finalizado' => new Column(['title' => __('models/informacionesEscolares.fields.finalizado'), 'data' => 'finalizado']),
            'fecha_grado_estimada' => new Column(['title' => __('models/informacionesEscolares.fields.fecha_grado_estimada'), 'data' => 'fecha_grado_estimada']),
            'fecha_grado_real' => new Column(['title' => __('models/informacionesEscolares.fields.fecha_grado_real'), 'data' => 'fecha_grado_real'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'informaciones_escolares_' . time();
    }
}
