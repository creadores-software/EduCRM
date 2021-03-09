<h3 class="page-header" style="padding-left: 20px">Información Relacional</h3>

<!-- Maximo Nivel Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivelesFormacion', __('models/informacionesRelacionales.fields.maximo_nivel_formacion_id').':') !!}
    <select name="nivelesFormacion[]" id="nivelesFormacion" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Ocupacion Actual Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ocupaciones', __('models/informacionesRelacionales.fields.ocupacion_actual_id').':') !!}
    <select name="ocupaciones[]" id="ocupaciones" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Estilo Vida Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estilosVida', __('models/informacionesRelacionales.fields.estilo_vida_id').':') !!}
    <select name="estilosVida[]" id="estilosVida" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Religion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('religiones', __('models/informacionesRelacionales.fields.religion_id').':') !!}
    <select name="religiones[]" id="religiones" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Raza Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('razas', __('models/informacionesRelacionales.fields.raza_id').':') !!}
    <select name="razas[]" id="razas" class="form-control" multiple="multiple" >
    </select> 
</div>

<!-- Generacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('generaciones', __('models/informacionesRelacionales.fields.generacion_id').':') !!}
    <select name="generaciones[]" id="generaciones" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Personalidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personalidades', __('models/informacionesRelacionales.fields.personalidad_id').':') !!}
    <select name="personalidades[]" id="personalidades" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Beneficio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('beneficios', __('models/informacionesRelacionales.fields.beneficio_id').':') !!}
    <select name="beneficios[]" id="beneficios" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Frecuencia Uso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frecuenciasUso', __('models/informacionesRelacionales.fields.frecuencia_uso_id').':') !!}
    <select name="frecuenciasUso[]" id="frecuenciasUso" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Estatus Usuario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatusUsuario', __('models/informacionesRelacionales.fields.estatus_usuario_id').':') !!}
    <select name="estatusUsuario[]" id="estatusUsuario" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Estatus Lealtad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatusLealtad', __('models/informacionesRelacionales.fields.estatus_lealtad_id').':') !!}
    <select name="estatusLealtad[]" id="estatusLealtad" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Estado Disposicion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estadosDisposicion', __('models/informacionesRelacionales.fields.estado_disposicion_id').':') !!}
    <select name="estadosDisposicion[]" id="estadosDisposicion" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Actitud Servicio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actitudesServicio', __('models/informacionesRelacionales.fields.actitud_servicio_id').':') !!}
    <select name="actitudesServicio[]" id="actitudesServicio" class="form-control" multiple="multiple">
   </select> 
</div>

<!-- Autoriza Comunicacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autoriza_comunicacion', __('models/informacionesRelacionales.fields.autoriza_comunicacion').':') !!}
    {!! Form::select('autoriza_comunicacion',[''=>'TODOS',1=>'SI',0=>'NO'], old('autoriza_comunicacion'), ['class' => 'form-control']) !!}
</div>

<!-- Preferencias Medios Comunicacion -->
<div class="form-group col-sm-12">
    {!! Form::label('preferenciasMediosComunicacion', ' Preferencias Medios de Comunicación:') !!}
    <select name="preferenciasMediosComunicacion[]" id="preferenciasMediosComunicacion" class="form-control"  multiple="multiple">
    </select> 
</div>

<!-- Preferencias Formaciones -->
<div class="form-group col-sm-12">
    {!! Form::label('preferenciasFormaciones', ' Preferencias Formaciones:') !!}
    <select name="preferenciasFormaciones[]" id="preferenciasFormaciones" class="form-control"  multiple="multiple">
   </select> 
</div>

<!-- Preferencias Campos Educación -->
<div class="form-group col-sm-12">
    {!! Form::label('preferenciasCamposEducacion', ' Preferencias Campos de Educación:') !!}
    <select name="preferenciasCamposEducacion[]" id="preferenciasCamposEducacion" class="form-control"  multiple="multiple">
    </select> 
</div>

<!-- Preferencias Actividades Ocio -->
<div class="form-group col-sm-12">
    {!! Form::label('preferenciasActividadesOcio', ' Preferencias Actividades Ocio:') !!}
    <select name="preferenciasActividadesOcio[]" id="preferenciasActividadesOcio" class="form-control"  multiple="multiple">
    </select> 
</div>

@push('scripts')
    <script type="text/javascript">       
        $(document).ready(function() { 
            $('#nivelesFormacion').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("formaciones.nivelesFormacion.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
            $('#ocupaciones').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("entidades.ocupaciones.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
            $('#estilosVida').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.estilosVida.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
            $('#religiones').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.religiones.dataAjax") }}',
                    dataType: 'json',
                },
            });            
            $('#razas').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.razas.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#generaciones').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.generaciones.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#personalidades').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.personalidades.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
            $('#beneficios').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.beneficios.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
            $('#frecuenciasUso').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.frecuenciasUso.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
            $('#estatusUsuario').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.estatusUsuario.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#estatusLealtad').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.estatusLealtad.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#estadosDisposicion').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.estadosDisposicion.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
            $('#actitudesServicio').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.actitudesServicio.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#preferenciasFormaciones').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("formaciones.formaciones.dataAjax") }}',
                    dataType: 'json',
                },
            });  
            $('#preferenciasMediosComunicacion').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.mediosComunicacion.dataAjax") }}',
                    dataType: 'json',
                },
            });  
            $('#preferenciasCamposEducacion').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("formaciones.camposEducacion.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#preferenciasActividadesOcio').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.actividadesOcio.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#autoriza_comunicacion').select2();  
        });   
    </script>
@endpush
