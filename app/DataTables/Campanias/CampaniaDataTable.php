<?php

namespace App\DataTables\Campanias;

use App\Models\Campanias\Campania;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class CampaniaDataTable extends DataTable
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
        ->addColumn('action', 'campanias.campanias.datatables_actions')
        ->editColumn('activa', function ($campania){
            return $campania->activa? 'Si':'No';
        })
        ->filterColumn('activa', function ($query, $keyword) {
            $validacion=null;
            if(strpos(strtolower($keyword), 's')!==false){
                $validacion=1; 
                $query->whereRaw("activa = ?", [$validacion]);   
            }else if(strpos(strtolower($keyword), 'n')!==false){
                $validacion=0;
                $query->whereRaw("activa = ?", [$validacion]);    
            }else{
                $query->whereRaw("activa = 3"); //Ninguno    
            }               
        })
        ->rawColumns(['descripcion','action']);

        if($this->request()->has('action') && $this->request()->get('action')=="excel"){
                $dataTable->removeColumn('action');
                $dataTable->editColumn('descripcion', function ($campania){
                    return html_entity_decode(strip_tags($campania->descripcion));
                });
        }
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Campania $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Campania $model)
    {
        return $model::
            leftjoin('equipo_mercadeo as equipoMercadeo', 'equipoMercadeo.id', '=', 'campania.equipo_mercadeo_id')
            ->leftjoin('facultad', 'facultad.id', '=', 'campania.facultad_id')
            ->leftjoin('nivel_academico as nivelAcademico', 'nivelAcademico.id', '=', 'campania.nivel_academico_id')
            ->leftjoin('nivel_formacion as nivelFormacion', 'nivelFormacion.id', '=', 'campania.nivel_formacion_id')
            ->leftjoin('periodo_academico as periodoAcademico', 'periodoAcademico.id', '=', 'campania.periodo_academico_id')
            ->leftjoin('segmento', 'segmento.id', '=', 'campania.segmento_id')
            ->leftjoin('tipo_campania as tipoCampania', 'tipoCampania.id', '=', 'campania.tipo_campania_id')
            ->select([
                'campania.id',
                'campania.nombre as nombre',                
                'campania.fecha_inicio as fecha_inicio',
                'campania.fecha_final as fecha_final',
                'campania.descripcion as descripcion',
                'campania.inversion as inversion',
                'tipoCampania.nombre as tipo_campania',
                'equipoMercadeo.nombre as equipo', 
                'facultad.nombre as facultad',
                'nivelAcademico.nombre as nivel_academico',
                'nivelFormacion.nombre as nivel_formacion',
                'periodoAcademico.nombre as periodo_academico',
                'segmento.nombre as segmento',
                'campania.activa as activa',
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
                'order'     => [[1, 'asc']],
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
            'tipo_campania_id' => new Column(['title' => __('models/campanias.fields.tipo_campania_id'), 'data' => 'tipo_campania','name' => 'tipoCampania.nombre']),
            'nombre' => new Column(['title' => __('models/campanias.fields.nombre'), 'data' => 'nombre']),
            'periodo_academico_id' => new Column(['title' => __('models/campanias.fields.periodo_academico_id'), 'data' => 'periodo_academico','name' => 'periodoAcademico.nombre']),
            'equipo_mercadeo_id' => new Column(['title' => __('models/campanias.fields.equipo_mercadeo_id'), 'data' => 'equipo','name' => 'equipoMercadeo.nombre']),
            'activa' => new Column(['title' => __('models/campanias.fields.activa'), 'data' => 'activa']),
            'id' => new Column(['title' => 'ID', 'data' => 'id']),
            //Campos no visibles
            'fecha_inicio' => new Column(['title' => __('models/campanias.fields.fecha_inicio'), 'data' => 'fecha_inicio','visible'=>false]),
            'fecha_final' => new Column(['title' => __('models/campanias.fields.fecha_final'), 'data' => 'fecha_final','visible'=>false]),
            'descripcion' => new Column(['title' => __('models/campanias.fields.descripcion'), 'data' => 'descripcion','visible'=>false]),
            'inversion' => new Column(['title' => __('models/campanias.fields.inversion'), 'data' => 'inversion','visible'=>false]),
            'nivel_formacion_id' => new Column(['title' => __('models/campanias.fields.nivel_formacion_id'), 'data' => 'nivel_formacion','name' => 'nivelFormacion.nombre','visible'=>false]),
            'nivel_academico_id' => new Column(['title' => __('models/campanias.fields.nivel_academico_id'), 'data' => 'nivel_academico','name' => 'nivelAcademico.nombre','visible'=>false]),
            'facultad_id' => new Column(['title' => __('models/campanias.fields.facultad_id'), 'data' => 'facultad','name' => 'facultad.nombre','visible'=>false]),
            'segmento_id' => new Column(['title' => __('models/campanias.fields.segmento_id'), 'data' => 'segmento','name' => 'segmento.nombre','visible'=>false]),            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'campanias_' .date("Ymd_His");
    }
}
