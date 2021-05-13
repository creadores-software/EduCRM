<?php

namespace App\DataTables\Contactos;

use App\Models\Contactos\InformacionLaboral;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class InformacionLaboralDataTable extends DataTable
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
            return view('contactos.informaciones_laborales.datatables_actions', 
            compact('id','idContacto'));
        }) 
        ->editColumn('vinculado_actualmente', function ($informacion){
            return $informacion->vinculado_actualmente? 'Si':'No';
        })
        ->editColumn('fecha_inicio', function ($informacion){
            if(empty($informacion->fecha_inicio)){
                return;
            }
            return date('Y-m-d', strtotime($informacion->fecha_inicio));
        })
        ->editColumn('fecha_fin', function ($informacion){
            if(empty($informacion->fecha_fin)){
                return;
            }
            return date('Y-m-d', strtotime($informacion->fecha_fin));
        })  
        ->filterColumn('vinculado_actualmente', function ($query, $keyword) {
            $validacion=null;
            if(strpos(strtolower($keyword), 's')!==false){
                $validacion=1; 
                $query->whereRaw("vinculado_actualmente = ?", [$validacion]);   
            }else if(strpos(strtolower($keyword), 'n')!==false){
                $validacion=0;
                $query->whereRaw("vinculado_actualmente = ?", [$validacion]);    
            }else{
                $query->whereRaw("vinculado_actualmente = 3"); //Ninguno    
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
     * @param \App\Models\InformacionLaboral $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(InformacionLaboral $model)
    {
        return $model->newQuery()
            ->with(['entidad','ocupacion'])->select('informacion_laboral.*');
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
            ->minifiedAjax(route('contactos.informacionesLaborales.index', ['idContacto' => $idContacto]))
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
            'entidad_id' => new Column(['title' => __('models/informacionesLaborales.fields.entidad_id'), 'data' => 'entidad.nombre','name'=>'entidad.nombre']),
            'ocupacion_id' => new Column(['title' => __('models/informacionesLaborales.fields.ocupacion_id'), 'data' => 'ocupacion.nombre','name'=>'ocupacion.nombre']),            
            'fecha_inicio' => new Column(['title' => __('models/informacionesLaborales.fields.fecha_inicio'), 'data' => 'fecha_inicio']),
            'fecha_fin' => new Column(['title' => __('models/informacionesLaborales.fields.fecha_fin'), 'data' => 'fecha_fin']),
            'vinculado_actualmente' => new Column(['title' => __('models/informacionesLaborales.fields.vinculado_actualmente'), 'data' => 'vinculado_actualmente']),
            //Campos no visibles que salen en exportación            
            'area' => new Column(['title' => __('models/informacionesLaborales.fields.area'), 'data' => 'area', 'visible'=>false]),
            'funciones' => new Column(['title' => __('models/informacionesLaborales.fields.funciones'), 'data' => 'funciones', 'visible'=>false]),
            'telefono' => new Column(['title' => __('models/informacionesLaborales.fields.telefono'), 'data' => 'telefono', 'visible'=>false]),
            'contacto_id' => new Column(['title' => __('models/informacionesLaborales.fields.contacto_id'), 'data' => 'contacto_id','visible'=>false]),            'contacto_id' => new Column(['title' => __('models/informacionesEscolares.fields.contacto_id'), 'data' => 'contacto_id','visible'=>false]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'informaciones_laborales_' .  date("Ymd_His");
    }
}
