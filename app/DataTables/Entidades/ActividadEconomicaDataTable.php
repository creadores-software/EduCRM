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

        $dataTable
            ->addColumn('action', 'entidades.actividades_economicas.datatables_actions')
            ->editColumn('es_ies', function ($actividad){
                return $actividad->es_ies? 'Si':'No';
            })
            ->editColumn('es_colegio', function ($actividad){
                return $actividad->es_colegio? 'Si':'No';
            })
            ->filterColumn('es_ies', function ($query, $keyword) {
                $validacion=null;
                if(strpos(strtolower($keyword), 's')!==false){
                    $validacion=1; 
                    $query->whereRaw("es_ies = ?", [$validacion]);   
                }else if(strpos(strtolower($keyword), 'n')!==false){
                    $validacion=0;
                    $query->whereRaw("es_ies = ?", [$validacion]);    
                }else{
                    $query->whereRaw("es_ies = 3"); //Ninguno    
                }               
            })
            ->filterColumn('es_colegio', function ($query, $keyword) {
                $validacion=null;
                if(strpos(strtolower($keyword), 's')!==false){
                    $validacion=1; 
                    $query->whereRaw("es_colegio = ?", [$validacion]);   
                }else if(strpos(strtolower($keyword), 'n')!==false){
                    $validacion=0;
                    $query->whereRaw("es_colegio = ?", [$validacion]);    
                }else{
                    $query->whereRaw("es_colegio = 3"); //Ninguno    
                }                
            });
           
            if($this->request()->has('action') && $this->request()->get('action')=="excel"){
                $dataTable->removeColumn('action');
            }
            return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ActividadEconomica $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ActividadEconomica $model)
    {
        return $model::
        leftjoin('categoria_actividad_economica as categoriaActividadEconomica', 'categoriaActividadEconomica.id', '=', 'actividad_economica.categoria_actividad_economica_id')
        ->select([
            'actividad_economica.id',
            'actividad_economica.nombre',
            'categoriaActividadEconomica.nombre as categoria',
            'actividad_economica.es_ies',
            'actividad_economica.es_colegio',
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
                    this.api().columns(':lt(5)').every(function () {
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
            'nombre' => new Column(['title' => __('models/actividadesEconomicas.fields.nombre'), 'data' => 'nombre']),
            'categoria_actividad_economica_id' => new Column(['title' => 'Categoría', 'data' => 'categoria','name' => 'categoriaActividadEconomica.nombre']),
            'es_ies' => new Column(['title' => __('models/actividadesEconomicas.fields.es_ies'), 'data' => 'es_ies', ]),
            'es_colegio' => new Column(['title' => __('models/actividadesEconomicas.fields.es_colegio'), 'data' => 'es_colegio', ]),
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
        return 'actividades_economicas_' .  date("Ymd_His");
    }
}
