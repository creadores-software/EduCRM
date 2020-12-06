<?php

namespace App\DataTables\Entidades;

use App\Models\Entidades\Entidad;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class EntidadDataTable extends DataTable
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

        return $dataTable
            ->addColumn('action', 'entidades.entidades.datatables_actions')
            ->filterColumn('mi_universidad', function ($query, $keyword) {
                $validacion=null;
                if(strpos(strtolower($keyword), 's')!==false){
                    $validacion=1; 
                    $query->whereRaw("mi_universidad = ?", [$validacion]);   
                }else if(strpos(strtolower($keyword), 'n')!==false){
                    $validacion=0;
                    $query->whereRaw("mi_universidad = ?", [$validacion]);    
                }                
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Entidad $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Entidad $model)
    {
        return $model->newQuery()->with(['lugar','sector','actividadEconomica'])
            ->select('entidad.*');
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
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                        'extend' => 'reset',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-undo"></i> Restablecer Filtros'
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
                 'initComplete' => "function () {                                   
                        this.api().columns(':lt(6)').every(function () {
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
            'nombre' => new Column(['title' => __('models/entidades.fields.nombre'), 'data' => 'nombre']),
            'lugar_id' => new Column(['title' => __('models/entidades.fields.lugar_id'), 'data' => 'lugar.nombre', 'name'=>'lugar.nombre']),
            'sector_id' => new Column(['title' => __('models/entidades.fields.sector_id'), 'data' => 'sector.nombre', 'name'=>'sector.nombre']),
            'actividad_economica_id' => new Column(['title' => __('models/entidades.fields.actividad_economica_id'), 'data' => 'actividad_economica.nombre', 'name'=>'actividadEconomica.nombre']),
            'mi_universidad' => new Column(['title' => __('models/entidades.fields.mi_universidad'), 'data' => 'mi_universidad','render'=> "function(){ return data? 'Si' : 'No' }"]),
            'id' => new Column(['title' => 'ID', 'data' => 'id']),
            'direccion' => new Column(['title' => __('models/entidades.fields.direccion'), 'data' => 'direccion','visible'=>false,'searchable'=>false]),
            'telefono' => new Column(['title' => __('models/entidades.fields.telefono'), 'data' => 'telefono','visible'=>false,'searchable'=>false]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'entidades_' .  date("Ymd_His");
    }
}
