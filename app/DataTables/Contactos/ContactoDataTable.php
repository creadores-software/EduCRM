<?php

namespace App\DataTables\Contactos;

use App\Models\Contactos\Contacto;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Illuminate\Http\Request;

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
        $request=$this->request();          

        return 
        $dataTable
            ->addColumn('action', 'contactos.contactos.datatables_actions')
            ->editColumn('fecha_nacimiento', function ($contacto){
                if(empty($contacto->fecha_nacimiento)){
                    return;
                }
                return date('Y-m-d', strtotime($contacto->fecha_nacimiento));
            })
            ->editColumn('activo', function ($contacto){
                return $contacto->activo? 'Si':'No';
            })
            ->editColumn('autoriza_comunicacion', function ($contacto){
                return $contacto->autoriza_comunicacion? 'Si':'No';
            })
            ->filterColumn('activo', function ($query, $keyword) {
                $validacion=null;
                if(strpos(strtolower($keyword), 's')!==false){
                    $validacion=1; 
                    $query->whereRaw("activo = ?", [$validacion]);   
                }else if(strpos(strtolower($keyword), 'n')!==false){
                    $validacion=0;
                    $query->whereRaw("activo = ?", [$validacion]);    
                }else{
                    $query->whereRaw("activo = 3"); //Ninguno    
                }               
            })
            ->filter(function ($query) use($request) {
                if($request->has('origenes') && $request->get('origenes')){
                    $query->whereIn("origen_id",$request->get('origenes'));
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
        return $model::leftjoin('lugar as lugarResidencia', 'contacto.lugar_residencia', '=', 'lugarResidencia.id')
            ->leftjoin('estado_civil as estadoCivil', 'contacto.estado_civil_id', '=', 'estadoCivil.id')
            ->leftjoin('genero', 'contacto.genero_id', '=', 'genero.id')
            ->leftjoin('origen', 'contacto.origen_id', '=', 'origen.id')
            ->leftjoin('prefijo', 'contacto.prefijo_id', '=', 'prefijo.id')
            ->leftjoin('tipo_documento as tipoDocumento', 'contacto.tipo_documento_id', '=', 'tipoDocumento.id')
            ->leftjoin('informacion_relacional as informacionRelacional', 'contacto.informacion_relacional_id', '=', 'informacionRelacional.id')
            ->leftjoin('nivel_formacion as nivelFormacion', 'informacionRelacional.maximo_nivel_formacion_id', '=', 'nivelFormacion.id')
            ->leftjoin('ocupacion', 'informacionRelacional.ocupacion_actual_id', '=', 'ocupacion.id')
            ->leftjoin('estilo_vida as estiloVida', 'informacionRelacional.estilo_vida_id', '=', 'estiloVida.id')
            ->leftjoin('religion', 'informacionRelacional.religion_id', '=', 'religion.id')
            ->leftjoin('raza', 'informacionRelacional.raza_id', '=', 'raza.id')
            ->leftjoin('generacion', 'informacionRelacional.generacion_id', '=', 'generacion.id')
            ->leftjoin('personalidad', 'informacionRelacional.personalidad_id', '=', 'personalidad.id')
            ->leftjoin('beneficio', 'informacionRelacional.beneficio_id', '=', 'beneficio.id')
            ->leftjoin('frecuencia_uso as frecuenciaUso', 'informacionRelacional.frecuencia_uso_id', '=', 'frecuenciaUso.id')
            ->leftjoin('estatus_usuario as estatusUsuario', 'informacionRelacional.estatus_usuario_id', '=', 'estatusUsuario.id')
            ->leftjoin('estatus_lealtad as estatusLealtad', 'informacionRelacional.estatus_lealtad_id', '=', 'estatusLealtad.id')
            ->leftjoin('estado_disposicion as estadoDisposicion', 'informacionRelacional.estado_disposicion_id', '=', 'estadoDisposicion.id')
            ->leftjoin('actitud_servicio as actitudServicio', 'informacionRelacional.actitud_servicio_id', '=', 'actitudServicio.id')         
            ->select(['contacto.id','tipoDocumento.nombre as nombre_tipo_documento','contacto.identificacion',
            'prefijo.nombre as nombre_prefijo','contacto.nombres','contacto.apellidos','contacto.fecha_nacimiento',
            'genero.nombre as nombre_genero','estadoCivil.nombre as nombre_estado_civil','contacto.celular','contacto.telefono',
            'contacto.correo_personal','contacto.correo_institucional','lugarResidencia.nombre as nombre_lugar',
            'contacto.direccion_residencia','contacto.estrato','contacto.activo','contacto.observacion',
            'origen.nombre as nombre_origen','contacto.referido_por','contacto.otro_origen',
            'nivelFormacion.nombre as nombre_nivel_formacion','ocupacion.nombre as nombre_ocupacion','estiloVida.nombre as nombre_estilo_vida',
            'religion.nombre as nombre_religion','raza.nombre as nombre_raza','generacion.nombre as nombre_generacion',
            'personalidad.nombre as nombre_personalidad','beneficio.nombre as nombre_beneficio','frecuenciaUso.nombre as nombre_frecuencia_uso',
            'estatusUsuario.nombre as nombre_estatus_usuario','estatusLealtad.nombre as nombre_estatus_lealtad','estadoDisposicion.nombre as nombre_estado_disposicion',
            'actitudServicio.nombre as nombre_actitud_servicio','informacionRelacional.autoriza_comunicacion'
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
            //Ver https://github.com/yajra/laravel-datatables/issues/1129
            ->ajax([
                'url'  => '',
                'data' => "function(data){                   
                    data.origenes  = $('#s2_origenes').val();
                    data.segmento  = $('#segmento_seleccionado').val();
                }"
            ])
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'processing' => true,
                'serverSide' => true,
                'responsive' => true,
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
                    [
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text'=>'<i class="fa fa-upload"></i> Importar contactos',
                        'action'=> "function (e, node, config){
                                        window.location = window.location.href + '/subirImportacion';
                                    }"
                    ],
                    [
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text'=>'<i class="fa fa-search-plus" data-toggle="modal" data-target="#applicantModal"></i> Búsqueda avanzada',
                        'action'=> "function (e, node, config){
                                        $('#advanced_filter').modal('show');
                                    }"
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
            'origen_id' => new Column(['title' => __('models/contactos.fields.origen_id'), 'data' => 'nombre_origen','name'=>'origen.nombre']),
            'activo' => new Column(['title' => __('models/contactos.fields.activo'), 'data' => 'activo']),
            'id' => new Column(['title' => 'ID', 'data' => 'id']),
            //Campos no visibles
            'tipo_documento_id' => new Column(['title' => __('models/contactos.fields.tipo_documento_id'), 'data' => 'nombre_tipo_documento', 'name'=> 'tipoDocumento.nombre','visible'=>false]),            
            'prefijo_id' => new Column(['title' => __('models/contactos.fields.prefijo_id'), 'data' => 'nombre_prefijo','name'=>'prefijo.nombre','visible'=>false]),            
            'fecha_nacimiento' => new Column(['title' => __('models/contactos.fields.fecha_nacimiento'), 'data' => 'fecha_nacimiento','visible'=>false]),
            'genero_id' => new Column(['title' => __('models/contactos.fields.genero_id'), 'data' => 'nombre_genero', 'name'=>'genero.nombre','visible'=>false]),
            'estado_civil_id' => new Column(['title' => __('models/contactos.fields.estado_civil_id'), 'data' => 'nombre_estado_civil','name'=>'estadoCivil.nombre','visible'=>false]),            
            'correo_institucional' => new Column(['title' => __('models/contactos.fields.correo_institucional'), 'data' => 'correo_institucional','visible'=>false]),
            'lugar_residencia' => new Column(['title' => __('models/contactos.fields.lugar_residencia'),  'data' => 'nombre_lugar', 'name'=>'lugarResidencia.nombre', 'visible'=>false]),
            'direccion_residencia' => new Column(['title' => __('models/contactos.fields.direccion_residencia'), 'data' => 'direccion_residencia','visible'=>false]),
            'estrato' => new Column(['title' => __('models/contactos.fields.estrato'), 'data' => 'estrato','visible'=>false]),            
            'observacion' => new Column(['title' => __('models/contactos.fields.observacion'), 'data' => 'observacion','visible'=>false]),            
            'referido_por' => new Column(['title' => __('models/contactos.fields.referido_por'), 'data' => 'referido_por','visible'=>false]),            
            'otro_origen' => new Column(['title' => __('models/contactos.fields.otro_origen'), 'data' => 'otro_origen','visible'=>false]),            
            'maximo_nivel_formacion_id' => new Column(['title' => __('models/informacionesRelacionales.fields.maximo_nivel_formacion_id'), 'data' => 'nombre_nivel_formacion', 'name'=>'nivelFormacion.nombre','visible'=>false]),
            'ocupacion_actual_id' => new Column(['title' => __('models/informacionesRelacionales.fields.ocupacion_actual_id'), 'data' => 'nombre_ocupacion','name'=>'ocupacion.nombre','visible'=>false]),
            'estilo_vida_id' => new Column(['title' => __('models/informacionesRelacionales.fields.estilo_vida_id'), 'data' => 'nombre_estilo_vida','name'=>'estiloVida.nombre','visible'=>false]),
            'religion_id' => new Column(['title' => __('models/informacionesRelacionales.fields.religion_id'), 'data' => 'nombre_religion','name'=>'religion.nombre','visible'=>false]),
            'raza_id' => new Column(['title' => __('models/informacionesRelacionales.fields.raza_id'), 'data' => 'nombre_raza','name'=>'raza.nombre','visible'=>false]),
            'generacion_id' => new Column(['title' => __('models/informacionesRelacionales.fields.generacion_id'), 'data' => 'nombre_generacion','name'=>'generacion.nombre','visible'=>false]),
            'personalidad_id' => new Column(['title' => __('models/informacionesRelacionales.fields.personalidad_id'), 'data' => 'nombre_personalidad','name'=>'personalidad.nombre','visible'=>false]),
            'beneficio_id' => new Column(['title' => __('models/informacionesRelacionales.fields.beneficio_id'), 'data' => 'nombre_beneficio','name'=>'beneficio.nombre','visible'=>false]),
            'frecuencia_uso_id' => new Column(['title' => __('models/informacionesRelacionales.fields.frecuencia_uso_id'), 'data' => 'nombre_frecuencia_uso','name'=>'frecuenciaUso.nombre','visible'=>false]),
            'estatus_usuario_id' => new Column(['title' => __('models/informacionesRelacionales.fields.estatus_usuario_id'), 'data' => 'nombre_estatus_usuario','name'=>'estatusUsuario.nombre','visible'=>false]),
            'estatus_lealtad_id' => new Column(['title' => __('models/informacionesRelacionales.fields.estatus_lealtad_id'), 'data' => 'nombre_estatus_lealtad','name'=>'estatusLealtad.nombre','visible'=>false]),
            'estado_disposicion_id' => new Column(['title' => __('models/informacionesRelacionales.fields.estado_disposicion_id'), 'data' => 'nombre_estado_disposicion','name'=>'estadoDisposicion.nombre','visible'=>false]),
            'actitud_servicio_id' => new Column(['title' => __('models/informacionesRelacionales.fields.actitud_servicio_id'), 'data' => 'nombre_actitud_servicio','name'=>'actitudServicio.nombre','visible'=>false]),
            'autoriza_comunicacion' => new Column(['title' => __('models/informacionesRelacionales.fields.autoriza_comunicacion'), 'data' => 'autoriza_comunicacion','visible'=>false]),
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
