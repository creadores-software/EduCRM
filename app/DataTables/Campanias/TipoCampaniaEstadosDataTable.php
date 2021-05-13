<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\TipoCampaniaEstados;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class TipoCampaniaEstadosDataTable extends DataTable
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

        $dataTable
        ->addColumn('action', 'campanias.tipos_campania_estados.datatables_actions')
        ->filter(function ($query) use ($request) {
            if (!$request->has('idTipo')) {
                return;
            }else{
                $query->whereRaw("tipo_campania_id = ?", [$request->get('idTipo')]);   
            }            
        });

        if($request->has('action') && $request->get('action')=="excel"){
            $dataTable->removeColumn('action');
        }
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TipoCampaniaEstados $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TipoCampaniaEstados $model)
    {
        return $model->newQuery()->with(['estadoCampania'])
            ->select('tipo_campania_estados.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $idTipo=null;
        if ($this->request()->has("idTipo")) {
            $idTipo = $this->request()->get("idTipo");
        }
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax(route('campanias.tiposCampaniaEstados.index', ['idTipo' => $idTipo]))
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
            'orden' => new Column(['title' => __('models/tiposCampaniaEstados.fields.orden'), 'data' => 'orden']),
            'estado_campania_id' => new Column(['title' => __('models/tiposCampaniaEstados.fields.estado_campania_id'), 'data' => 'estado_campania.nombre','name' => 'estadoCampania.nombre']),
            'dias_cambio' => new Column(['title' => __('models/tiposCampaniaEstados.fields.dias_cambio'), 'data' => 'dias_cambio']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tipos_campania_estados_' .date("Ymd_His");
    }
}
