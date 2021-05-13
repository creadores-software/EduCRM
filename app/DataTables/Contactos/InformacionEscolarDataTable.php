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
        $request=$this->request();     

        $idContacto=false;
        if ($request->has('idContacto')) {
            $idContacto=$request->get('idContacto');
        }

        $dataTable
        ->addColumn('action', function($row) use ($idContacto){
            $id=$row->id;
            return view('contactos.informaciones_escolares.datatables_actions', 
            compact('id','idContacto'));
        }) 
        ->editColumn('finalizado', function ($informacion){
            return $informacion->finalizado? 'Si':'No';
        }) 
        ->editColumn('fecha_inicio', function ($informacion){
            if(empty($informacion->fecha_inicio)){
                return;
            }
            return date('Y-m-d', strtotime($informacion->fecha_inicio));
        })
        ->editColumn('fecha_icfes', function ($informacion){
            if(empty($informacion->fecha_icfes)){
                return;
            }
            return date('Y-m-d', strtotime($informacion->fecha_icfes));
        })
        ->editColumn('fecha_grado', function ($informacion){
            if(empty($informacion->fecha_grado)){
                return;
            }
            return date('Y-m-d', strtotime($informacion->fecha_grado));
        })      
        ->filterColumn('finalizado', function ($query, $keyword) {
            $validacion=null;
            if(strpos(strtolower($keyword), 's')!==false){
                $validacion=1; 
                $query->whereRaw("finalizado = ?", [$validacion]);   
            }else if(strpos(strtolower($keyword), 'n')!==false){
                $validacion=0;
                $query->whereRaw("finalizado = ?", [$validacion]);    
            }else{
                $query->whereRaw("finalizado = 3"); //Ninguno    
            }                
        })
        ->filter(function ($query) use ($request) {
            if (!$request->has('idContacto')) {
                return;
            }else{
                $query->whereRaw("contacto_id = ?", [$request->get('idContacto')]);   
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
     * @param \App\Models\InformacionEscolar $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(InformacionEscolar $model)
    {
        return $model::
            leftjoin('entidad', 'entidad.id', '=', 'informacion_escolar.entidad_id')
            ->leftjoin('nivel_formacion as nivelFormacion', 'nivelFormacion.id', '=', 'informacion_escolar.nivel_formacion_id')
            ->select([
                'informacion_escolar.id',
                'entidad.nombre as entidad',
                'nivelFormacion.nombre as nivel_formacion',
                'informacion_escolar.finalizado',
                'informacion_escolar.grado',
                'informacion_escolar.puntaje_icfes',
                'informacion_escolar.fecha_inicio',
                'informacion_escolar.fecha_grado',
                'informacion_escolar.fecha_icfes',
                'informacion_escolar.contacto_id',

            ])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $idContacto=null;
        if ($this->request()->has("idContacto")) {
            $idContacto = $this->request()->get("idContacto");
        }

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax(route('contactos.informacionesEscolares.index', ['idContacto' => $idContacto]))
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
            'entidad_id' => new Column(['title' => __('models/informacionesEscolares.fields.entidad_id'), 'data' => 'entidad','name' => 'entidad.nombre']),
            'nivel_formacion_id' => new Column(['title' => __('models/informacionesEscolares.fields.nivel_formacion_id'), 'data' => 'nivel_formacion', 'name' => 'nivelFormacion.nombre']),
            'finalizado' => new Column(['title' => __('models/informacionesEscolares.fields.finalizado'), 'data' => 'finalizado']),
            'grado' => new Column(['title' => __('models/informacionesEscolares.fields.grado'), 'data' => 'grado']),
            'puntaje_icfes' => new Column(['title' => __('models/informacionesEscolares.fields.puntaje_icfes'), 'data' => 'puntaje_icfes']),
            //Campos no visibles que salen en exportación                  
            'fecha_inicio' => new Column(['title' => __('models/informacionesEscolares.fields.fecha_inicio'), 'data' => 'fecha_inicio','visible'=>false]),
            'fecha_grado' => new Column(['title' => __('models/informacionesEscolares.fields.fecha_grado'), 'data' => 'fecha_grado','visible'=>false]),
            'fecha_icfes' => new Column(['title' => __('models/informacionesEscolares.fields.fecha_icfes'), 'data' => 'fecha_icfes','visible'=>false]),
            'contacto_id' => new Column(['title' => __('models/informacionesEscolares.fields.contacto_id'), 'data' => 'contacto_id','visible'=>false]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'informaciones_escolares_' .  date("Ymd_His");
    }
}
