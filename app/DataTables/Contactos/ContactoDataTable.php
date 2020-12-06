<?php

namespace App\DataTables\Contactos;

use App\Models\Contactos\Contacto;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ContactoDataTable extends DataTable
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

        return 
        $dataTable
            ->addColumn('action', 'contactos.contactos.datatables_actions')
            ->filterColumn('activo', function ($query, $keyword) {
                $validacion=null;
                if(strpos(strtolower($keyword), 's')!==false){
                    $validacion=1; 
                    $query->whereRaw("activo = ?", [$validacion]);   
                }else if(strpos(strtolower($keyword), 'n')!==false){
                    $validacion=0;
                    $query->whereRaw("activo = ?", [$validacion]);    
                }                
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Contactos\Contacto $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Contacto $model)
    {
        return $model->newQuery()->select('contacto.*');
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
                    this.api().columns(':lt(8)').every(function () {
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
            'identificacion' => new Column(['title' => __('models/contactos.fields.identificacion'), 'data' => 'identificacion']),
            'nombres' => new Column(['title' => __('models/contactos.fields.nombres'), 'data' => 'nombres']),
            'apellidos' => new Column(['title' => __('models/contactos.fields.apellidos'), 'data' => 'apellidos']),
            'celular' => new Column(['title' => __('models/contactos.fields.celular'), 'data' => 'celular']),
            'telefono' => new Column(['title' => __('models/contactos.fields.telefono'), 'data' => 'telefono']),
            'correo_personal' => new Column(['title' => __('models/contactos.fields.correo_personal'), 'data' => 'correo_personal']),
            'activo' => new Column(['title' => __('models/contactos.fields.activo'), 'data' => 'activo', 'render'=> "function(){ return data? 'Si' : 'No' }"]),
            'id' => new Column(['title' => 'ID', 'data' => 'id']),
            //Campos no visibles
            'tipo_documento_id' => new Column(['title' => __('models/contactos.fields.tipo_documento_id'), 'data' => 'tipo_documento_id','visible'=>false]),            
            'prefijo_id' => new Column(['title' => __('models/contactos.fields.prefijo_id'), 'data' => 'prefijo_id','visible'=>false]),            
            'fecha_nacimiento' => new Column(['title' => __('models/contactos.fields.fecha_nacimiento'), 'data' => 'fecha_nacimiento','visible'=>false]),
            'genero_id' => new Column(['title' => __('models/contactos.fields.genero_id'), 'data' => 'genero_id','visible'=>false]),
            'estado_civil_id' => new Column(['title' => __('models/contactos.fields.estado_civil_id'), 'data' => 'estado_civil_id','visible'=>false]),            
            'correo_institucional' => new Column(['title' => __('models/contactos.fields.correo_institucional'), 'data' => 'correo_institucional','visible'=>false]),
            'lugar_residencia' => new Column(['title' => __('models/contactos.fields.lugar_residencia'), 'data' => 'lugar_residencia','visible'=>false]),
            'direccion_residencia' => new Column(['title' => __('models/contactos.fields.direccion_residencia'), 'data' => 'direccion_residencia','visible'=>false]),
            'estrato' => new Column(['title' => __('models/contactos.fields.estrato'), 'data' => 'estrato','visible'=>false]),            
            'observacion' => new Column(['title' => __('models/contactos.fields.observacion'), 'data' => 'observacion','visible'=>false]),
            'informacion_relacional_id' => new Column(['title' => __('models/contactos.fields.informacion_relacional_id'), 'data' => 'informacion_relacional_id','visible'=>false]),
            'origen_id' => new Column(['title' => __('models/contactos.fields.origen_id'), 'data' => 'origen_id','visible'=>false]),
            'referido_por' => new Column(['title' => __('models/contactos.fields.referido_por'), 'data' => 'referido_por','visible'=>false]),            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'contactos_' .  date("Ymd_His");
    }
}
