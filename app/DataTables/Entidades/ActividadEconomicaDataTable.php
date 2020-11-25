<?php

namespace App\DataTables\Entidades;

use App\Models\Entidades\ActividadEconomica;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ActividadEconomicaDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'entidades.actividades_economicas.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ActividadEconomica $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ActividadEconomica $model)
    {
        $model=\App\Models\Entidades\ActividadEconomica::with('categoriaActividadEconomica');
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
            'nombre' => new Column(['title' => __('models/actividadesEconomicas.fields.nombre'), 'data' => 'nombre']),
            'categoria_actividad_economica_id' => new Column(['title' => 'Categoría', 'data' => 'categoria_actividad_economica.nombre']),
            'es_ies' => new Column(['title' => __('models/actividadesEconomicas.fields.es_ies'), 'data' => 'es_ies', 'render'=> "function(){ return data? 'Sí' : 'No' }"]),
            'es_colegio' => new Column(['title' => __('models/actividadesEconomicas.fields.es_colegio'), 'data' => 'es_colegio', 'render'=> "function(){ return data? 'Sí' : 'No' }"])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'actividades_economicas_' . time();
    }
}
