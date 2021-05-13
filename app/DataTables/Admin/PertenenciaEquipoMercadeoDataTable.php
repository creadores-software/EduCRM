<?php

namespace App\DataTables\Admin;

use App\Models\Admin\PertenenciaEquipoMercadeo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class PertenenciaEquipoMercadeoDataTable extends DataTable
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
        ->addColumn('action', 'admin.pertenencias_equipo_mercadeo.datatables_actions')
        ->editColumn('es_lider', function ($pertenencia){
            return $pertenencia->es_lider? 'Si':'No';
        })
        ->filterColumn('es_lider', function ($query, $keyword) {
            $validacion=null;
            if(strpos(strtolower($keyword), 's')!==false){
                $validacion=1; 
                $query->whereRaw("es_lider = ?", [$validacion]);   
            }else if(strpos(strtolower($keyword), 'n')!==false){
                $validacion=0;
                $query->whereRaw("es_lider = ?", [$validacion]);    
            }else{
                $query->whereRaw("es_lider = 3"); //Ninguno    
            }               
        })
        ->filter(function ($query) use ($request) {
            if (!$request->has('idEquipo')) {
                return;
            }else{
                $query->whereRaw("equipo_mercadeo_id = ?", [$request->get('idEquipo')]);   
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
     * @param \App\Models\PertenenciaEquipoMercadeo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PertenenciaEquipoMercadeo $model)
    {
        return $model->newQuery()->with(['user'])->select('pertenencia_equipo_mercadeo.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $idEquipo=null;
        if ($this->request()->has("idEquipo")) {
            $idEquipo = $this->request()->get("idEquipo");
        }

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax(route('admin.pertenenciasEquipoMercadeo.index', ['idEquipo' => $idEquipo]))
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
            'users_id' => new Column(['title' => __('models/pertenenciasEquipoMercadeo.fields.users_id'), 'data' => 'user.name','name' => 'user.name']),
            'es_lider' => new Column(['title' => __('models/pertenenciasEquipoMercadeo.fields.es_lider'), 'data' => 'es_lider']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'pertenencias_equipo_mercadeo_' .date("Ymd_His");
    }
}
