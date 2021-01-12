<?php

namespace App\DataTables\Contactos;

use App\Models\Contactos\Contacto;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
                if($request->has('segmento') && $request->get('segmento')){
                    //Ubicar sql del segmento
                    $query->whereRaw("identificacion = '1053815524'");          
                }else{
                    if($request->has('nombres') && $request->get('nombres')){
                        $texto='%'.strtoupper($request->get('nombres')).'%';
                        $query->where(DB::raw('upper(contacto.nombres)'), 'LIKE', $texto);                        
                    }
                    if($request->has('apellidos') && $request->get('apellidos')){
                        $texto='%'.strtoupper($request->get('apellidos')).'%';
                        $query->where(DB::raw('upper(contacto.apellidos)'), 'LIKE', $texto);                        
                    }
                    if($request->has('correo_personal') && $request->get('correo_personal')){
                        $texto='%'.strtoupper($request->get('correo_personal')).'%';
                        $query->where(DB::raw('upper(contacto.correo_personal)'), 'LIKE', $texto);                        
                    }
                    if($request->has('correo_institucional') && $request->get('correo_institucional')){
                        $texto='%'.strtoupper($request->get('correo_institucional')).'%';
                        $query->where(DB::raw('upper(contacto.correo_institucional)'), 'LIKE', $texto);                        
                    }
                    if($request->has('celular') && $request->get('celular')){
                        $texto='%'.strtoupper($request->get('celular')).'%';
                        $query->where(DB::raw('upper(contacto.celular)'), 'LIKE', $texto);                        
                    }
                    if($request->has('telefono') && $request->get('telefono')){
                        $texto='%'.strtoupper($request->get('telefono')).'%';
                        $query->where(DB::raw('upper(contacto.telefono)'), 'LIKE', $texto);                        
                    }
                    if($request->has('otro_origen') && $request->get('otro_origen')){
                        $texto='%'.strtoupper($request->get('otro_origen')).'%';
                        $query->where(DB::raw('upper(contacto.otro_origen)'), 'LIKE', $texto);                        
                    }
                    if($request->has('direccion_residencia') && $request->get('direccion_residencia')){
                        $texto='%'.strtoupper($request->get('direccion_residencia')).'%';
                        $query->where(DB::raw('upper(contacto.direccion_residencia)'), 'LIKE', $texto);                        
                    }
                    if($request->has('observacion') && $request->get('observacion')){
                        $texto='%'.strtoupper($request->get('observacion')).'%';
                        $query->where(DB::raw('upper(contacto.observacion)'), 'LIKE', $texto);                        
                    }


                    if($request->has('origenes') && $request->get('origenes')){
                        $query->whereIn("origen.id",$request->get('origenes'));
                    }
                    if($request->has('referidos') && $request->get('referidos')){
                        $query->whereIn("contacto.referido_por",$request->get('referidos'));
                    }
                    if($request->has('estratos') && $request->get('estratos')){
                        $query->whereIn("contacto.estrato",$request->get('estratos'));
                    }
                    if($request->has('tipos_documento') && $request->get('tipos_documento')){
                        $query->whereIn("tipoDocumento.id",$request->get('tipo_documento_id'));
                    }
                    if($request->has('generos') && $request->get('generos')){
                        $query->whereIn("genero.id",$request->get('generos'));
                    }
                    if($request->has('prefijos') && $request->get('prefijos')){
                        $query->whereIn("prefijo.id",$request->get('prefijos'));
                    }
                    if($request->has('estados_civiles') && $request->get('estados_civiles')){
                        $query->whereIn("estadoCivil.id",$request->get('estados_civiles'));
                    }
                    if($request->has('tiposContacto') && $request->get('tiposContacto')){
                        $query->whereIn("tipoContacto.id",$request->get('tiposContacto'));
                    }
                    if($request->has('lugares_residencia') && $request->get('lugares_residencia')){
                        $query->whereIn("lugarResidencia.id",$request->get('lugares_residencia'));
                    }
                    if($request->has('activo') && $request->get('activo')!=''){
                        $query->whereRaw("activo = ?", $request->get('activo'));
                    }

                    if($request->has('fecha_nacimiento') && $request->get('fecha_nacimiento')){
                        $query->where("fecha_nacimiento",  $request->get('fecha_nacimiento'));
                    }
                    if($request->has('cumple') && $request->get('cumple')!=0){
                        /** 
                        0=>'Cualquier Fecha',
                        1=>'Ayer',
                        2=>'Hoy',
                        3=>'Mañana',
                        4=>'Esta semana',
                        5=>'Este mes',
                        */
                        $query->whereRaw(
                            //Retorna al tiempo 29 de febrero y 1 de marzo
                            "DATE_FORMAT(FROM_UNIXTIME(fecha_nacimiento),'%m-%d') = DATE_FORMAT(NOW(),'%m-%d')
                            OR (
                                   (
                                       DATE_FORMAT(NOW(),'%Y') % 4 <> 0
                                       OR (
                                               DATE_FORMAT(NOW(),'%Y') % 100 = 0
                                               AND DATE_FORMAT(NOW(),'%Y') % 400 <> 0
                                           )
                                   )
                                   AND DATE_FORMAT(NOW(),'%m-%d') = '03-01'
                                   AND DATE_FORMAT(FROM_UNIXTIME(fecha_nacimiento),'%m-%d') = '02-29'
                            )"
                        );
                        switch ($request->get('cumple')) {
                            case 1:                                
                                break;
                            case 2:
                                break;
                            case 3:
                                break;
                            case 4:
                                break;
                            case 5:
                                break;
                        }
                    }
                    if($request->has('edad_minima') && $request->get('edad_minima')){
                        $query->whereRaw("fecha_nacimiento is not null and  TIMESTAMPDIFF( YEAR, fecha_nacimiento, now()) >= ?",[$request->get('edad_minima')]);
                    }
                    if($request->has('edad_maxima') && $request->get('edad_maxima')){
                        $query->whereRaw("fecha_nacimiento is not null and  TIMESTAMPDIFF( YEAR, fecha_nacimiento, now()) <= ?",[$request->get('edad_maxima')]);
                    }
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
        return $model
            ::leftjoin('lugar as lugarResidencia', 'contacto.lugar_residencia', '=', 'lugarResidencia.id')
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
            'actitudServicio.nombre as nombre_actitud_servicio','informacionRelacional.autoriza_comunicacion'])

            ->newQuery();
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
                    data.segmento  = $('#segmento_seleccionado').val();

                    data.nombres  = $('#nombres').val();
                    data.apellidos  = $('#apellidos').val();                    
                    data.correo_personal  = $('#correo_personal').val();
                    data.correo_institucional  = $('#correo_institucional').val();
                    data.celular  = $('#celular').val();
                    data.telefono  = $('#telefono').val();
                    data.otro_origen  = $('#otro_origen').val();
                    data.direccion_residencia  = $('#direccion_residencia').val();
                    data.observacion  = $('#observacion').val();

                    data.origenes  = $('#origenes').val();
                    data.referidos  = $('#referidos').val();
                    data.estratos  = $('#estratos').val();
                    data.tipos_documento  = $('#tipos_documento').val();
                    data.generos  = $('#generos').val();
                    data.prefijos  = $('#prefijos').val();
                    data.estados_civiles  = $('#estados_civiles').val();
                    data.tiposContacto  = $('#tiposContacto').val();
                    data.lugares_residencia  = $('#lugares_residencia').val();
                    data.activo  = $('#activo').val();

                    data.fecha_nacimiento  = $('#fecha_nacimiento').val();
                    data.cumple  = $('#cumple').val();                    
                    data.edad_minima  = $('#edad_minima').val();
                    data.edad_maxima  = $('#edad_maxima').val();
                    
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
