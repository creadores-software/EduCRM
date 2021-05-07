<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\JustificacionEstadoCampania;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class JustificacionEstadoCampaniaDataTable extends DataTable
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
        $request=$this->request();  

        return $dataTable
        ->addColumn('action', 'campanias.justificaciones_estado_campania.datatables_actions')
        ->filter(function ($query) use ($request) {
            if (!$request->has('idEstado')) {
                return;
            }else{
                $query->whereRaw("estado_campania_id = ?", [$request->get('idEstado')]);   
            }            
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\JustificacionEstadoCampania $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(JustificacionEstadoCampania $model)
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
        $idEstado=null;
        if ($this->request()->has("idEstado")) {
            $idEstado = $this->request()->get("idEstado");
        }
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax(route('campanias.justificacionesEstadoCampania.index', ['idEstado' => $idEstado]))
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
                    this.api().columns(':lt(2)').every(function () {
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
            'nombre' => new Column(['title' => __('models/justificacionesEstadoCampania.fields.nombre'), 'data' => 'nombre']),
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
        return 'justificaciones_estado_campania_' .date("Ymd_His");
    }
}
