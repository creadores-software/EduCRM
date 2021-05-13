<?php

namespace App\DataTables\Formaciones;

use App\Models\Formaciones\NivelFormacion;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class NivelFormacionDataTable extends DataTable
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

        $dataTable
            ->addColumn('action', 'formaciones.niveles_formacion.datatables_actions');

        if($this->request()->has('action') && $this->request()->get('action')=="excel"){
             $dataTable->removeColumn('action');
        }
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\NivelFormacion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(NivelFormacion $model)
    {
        return $model::
            leftjoin('nivel_academico as nivelAcademico', 'nivelAcademico.id', '=', 'nivel_formacion.nivel_academico_id')
            ->select([
                'nivel_formacion.id',
                'nivel_formacion.nombre',
                'nivelAcademico.nombre as nivel_academico',
            ])->newQuery();
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
                 'initComplete' => "function () {                                   
                    this.api().columns(':lt(3)').every(function () {
                        var column = this;
                        var input = document.createElement(\"input\");
                        $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();                            
                        });
                    });
                }",
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
            'nivel_academico_id' => new Column(['title' => __('models/nivelesFormacion.fields.nivel_academico_id'), 'data' => 'nivel_academico', 'name'=>'nivelAcademico.nombre']), 
            'nombre' => new Column(['title' => __('models/nivelesFormacion.fields.nombre'), 'data' => 'nombre']),            
            'id' => new Column(['title' => 'ID', 'data' => 'id']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'niveles_formacion_' .  date("Ymd_His");
    }
}
