<?php

namespace App\DataTables\Contactos;

use App\Models\Contactos\Contacto;
use App\Models\Contactos\InformacionRelacional;
use App\Models\Contactos\InformacionUniversitaria;
use App\Models\Contactos\InformacionEscolar;
use App\Models\Contactos\InformacionLaboral;
use App\Models\Contactos\Parentesco;
use App\Models\Campanias\Oportunidad;
use App\Models\Campanias\Interaccion;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
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
        ->filter(function ($query) use($request) 
        {
            $valores=$request->all();    
            Contacto::filtroDataTable($valores, $query);
            InformacionRelacional::filtroDataTable($valores, $query);
            InformacionUniversitaria::filtroDataTable($valores, $query);
            InformacionEscolar::filtroDataTable($valores, $query);
            InformacionLaboral::filtroDataTable($valores, $query);
            Parentesco::filtroDataTable($valores, $query);
            Oportunidad::filtroDataTable($valores, $query);
            Interaccion::filtroDataTable($valores, $query);

            $command=$query->toSql();
            $posicion_where=strpos($command,'where');
            $where="";
            if( $posicion_where !== false){
                $where = substr($command,$posicion_where+6);  
            }  
            $parametros=$query->getBindings();           
            Log::debug('El query where es '. $where . ' con parametros ' .print_r($parametros,true));
        }); 
        
        if($request->has('action') && $request->get('action')=="excel"){
            $dataTable->removeColumn('action');
        }
        return $dataTable;
    }    

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Contactos\Contacto $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Contacto $model)
    {
        $model=Contacto::joinDataTable($model);
        $model=InformacionRelacional::joinDataTable($model);
        $model=InformacionUniversitaria::joinDataTable($model);
        $model=InformacionEscolar::joinDataTable($model);
        $model=InformacionLaboral::joinDataTable($model);
        $model=Parentesco::joinDataTable($model);
        $model=Oportunidad::joinDataTable($model);
        $model=Interaccion::joinDataTable($model);
        
        return $model->distinct()->select(
            array_merge(
                Contacto::selectDataTable(),
                InformacionRelacional::selectDataTable(),
                InformacionUniversitaria::selectDataTable(),
                InformacionEscolar::selectDataTable(),
                InformacionLaboral::selectDataTable(),
                Parentesco::selectDataTable(),
                Oportunidad::selectDataTable(),
                Interaccion::selectDataTable()
            )
        )->newQuery();
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
            ->postAjax([
                'url'  => '',
                'data' => "function(data){
                    data.segmento  = $('#segmento_seleccionado').val();".
                    Contacto::inputsDataTable().
                    InformacionRelacional::inputsDataTable().
                    InformacionUniversitaria::inputsDataTable().
                    InformacionEscolar::inputsDataTable().
                    InformacionLaboral::inputsDataTable().
                    Parentesco::inputsDataTable().
                    Oportunidad::inputsDataTable().
                    Interaccion::inputsDataTable().
                "}"
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
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text'=>'<i class="fa fa-upload"></i> Importar contactos',
                        'action'=> "function (e, node, config){
                                        window.location = window.location.href + '/subirImportacion';
                                    }"
                    ],                
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],                   
                    [
                        'extend' => 'reset',
                        'className' => 'btn btn-default btn-sm no-corner',
                        'text' => '<i class="fa fa-undo"></i> Restablecer Filtros'
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
                   'url' => url('/js/Spanish.json'),
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
            'correo_personal' => new Column(['title' => __('models/contactos.fields.correo_personal'), 'data' => 'correo_personal']),
            'origen_id' => new Column(['title' => __('models/contactos.fields.origen_id'), 'data' => 'nombre_origen','name'=>'origen.nombre']),
            'activo' => new Column(['title' => __('models/contactos.fields.activo'), 'data' => 'activo']),
            'id' => new Column(['title' => 'ID', 'data' => 'id']),
            //Campos no visibles que salen en exportación
            'telefono' => new Column(['title' => __('models/contactos.fields.telefono'), 'data' => 'telefono','visible'=>false]),
            'tipo_documento_id' => new Column(['title' => __('models/contactos.fields.tipo_documento_id'), 'data' => 'nombre_tipo_documento', 'name'=> 'tipoDocumento.nombre','visible'=>false]),            
            'prefijo_id' => new Column(['title' => __('models/contactos.fields.prefijo_id'), 'data' => 'nombre_prefijo','name'=>'prefijo.nombre','visible'=>false]),            
            'fecha_nacimiento' => new Column(['title' => __('models/contactos.fields.fecha_nacimiento'), 'data' => 'fecha_nacimiento','visible'=>false]),
            'genero_id' => new Column(['title' => __('models/contactos.fields.genero_id'), 'data' => 'nombre_genero', 'name'=>'genero.nombre','visible'=>false]),
            'estado_civil_id' => new Column(['title' => __('models/contactos.fields.estado_civil_id'), 'data' => 'nombre_estado_civil','name'=>'estadoCivil.nombre','visible'=>false]),            
            'correo_institucional' => new Column(['title' => __('models/contactos.fields.correo_institucional'), 'data' => 'correo_institucional','visible'=>false]),
            'lugar_residencia' => new Column(['title' => __('models/contactos.fields.lugar_residencia'),  'data' => 'nombre_lugar', 'name'=>'lugarResidencia.nombre', 'visible'=>false]),
            'direccion_residencia' => new Column(['title' => __('models/contactos.fields.direccion_residencia'), 'data' => 'direccion_residencia','visible'=>false]),
            'barrio' => new Column(['title' => __('models/contactos.fields.barrio'), 'data' => 'barrio','visible'=>false]),
            'estrato' => new Column(['title' => __('models/contactos.fields.estrato'), 'data' => 'estrato','visible'=>false]),            
            'sisben_id' => new Column(['title' => __('models/contactos.fields.sisben_id'), 'data'=>'nombre_sisben', 'name'=> 'sisben.nombre','visible'=>false]),
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
