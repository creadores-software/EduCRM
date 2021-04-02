<?php

namespace App\DataTables\Contactos;

use App\Models\Contactos\Segmento;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class SegmentoDataTable extends DataTable
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
        ->addColumn('action', 'contactos.segmentos.datatables_actions')
        ->editColumn('global', function ($actividad){
            return $actividad->global? 'Si':'No';
        })
        ->filterColumn('global', function ($query, $keyword) {
            $validacion=null;
            if(strpos(strtolower($keyword), 's')!==false){
                $validacion=1; 
                $query->whereRaw("global = ?", [$validacion]);   
            }else if(strpos(strtolower($keyword), 'n')!==false){
                $validacion=0;
                $query->whereRaw("global = ?", [$validacion]);    
            }else{
                $query->whereRaw("global = 3"); //Ninguno    
            }               
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Segmento $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Segmento $model)
    {
        return $model->newQuery()->with(['usuario'])->select('segmento.*');;
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
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                        'extend' => 'export',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ]
                ],
                 'language' => [
                    'url' => url('/js/Spanish.json'),
                 ],
                 'initComplete' => "function () {                                   
                    this.api().columns(':lt(4)').every(function () {
                        var column = this;
                        var input = document.createElement(\"input\");
                        $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();                            
                        });
                    });
                }"
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
            'nombre' => new Column(['title' => __('models/segmentos.fields.nombre'), 'data' => 'nombre']),
            'descripcion' => new Column(['title' => __('models/segmentos.fields.descripcion'), 'data' => 'descripcion']),            
            'global' => new Column(['title' => __('models/segmentos.fields.global'), 'data' => 'global']),
            'usuario_id' => new Column(['title' => __('models/segmentos.fields.usuario_id'), 'data' => 'usuario.name','name'=>'usuario.name']),
            //Campos no visibles que salen en exportación
            'filtros' => new Column(['title' => __('models/segmentos.fields.filtros'), 'data' => 'filtros','visible'=>false]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'segmentos_' . time();
    }
}
