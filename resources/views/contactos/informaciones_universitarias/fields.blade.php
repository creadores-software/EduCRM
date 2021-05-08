{!! Form::hidden('contacto_id',$idContacto) !!}
{!! Form::hidden('idContacto',$idContacto) !!}
{!! Form::hidden('id', old('id', $informacionUniversitaria->id ?? '')) !!}

<!-- Entidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entidad_id', __('models/informacionesUniversitarias.fields.entidad_id').':') !!}
    <select name="entidad_id" id="entidad_id" class="form-control">
        <option></option>
        @if(!empty(old('entidad_id', $informacionUniversitaria->entidad_id ?? '' )))
            <option value="{{ old('entidad_id', $informacionUniversitaria->entidad_id ?? '' ) }}" selected> {{ App\Models\Entidades\Entidad::find(old('entidad_id', $informacionUniversitaria->entidad_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formacion_id', __('models/informacionesUniversitarias.fields.formacion_id').':') !!}
    <select name="formacion_id" id="formacion_id" class="form-control">
        <option></option>
        @if(!empty(old('formacion_id', $informacionUniversitaria->formacion_id ?? '' )))
            <option value="{{ old('formacion_id', $informacionUniversitaria->formacion_id ?? '' ) }}" selected> {{ App\Models\Formaciones\Formacion::find(old('formacion_id', $informacionUniversitaria->formacion_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Tipo Acceso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_acceso_id', __('models/informacionesUniversitarias.fields.tipo_acceso_id').':') !!}
    <select name="tipo_acceso_id" id="tipo_acceso_id" class="form-control">
        <option></option>
        @if(!empty(old('tipo_acceso_id', $informacionUniversitaria->tipo_acceso_id ?? '' )))
            <option value="{{ old('tipo_acceso_id', $informacionUniversitaria->tipo_acceso_id ?? '' ) }}" selected> {{ App\Models\Formaciones\TipoAcceso::find(old('tipo_acceso_id', $informacionUniversitaria->tipo_acceso_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Finalizado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finalizado', __('models/informacionesUniversitarias.fields.finalizado').':') !!}
    {!! Form::select('finalizado',[1=>'SI',0=>'NO'], old('finalizado'), ['class' => 'form-control']) !!}
</div>

<!-- Fecha Inicio Field -->
<div id="div_fecha_inicio" class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', __('models/informacionesUniversitarias.fields.fecha_inicio').':') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_inicio" name="fecha_inicio" type="text" placeholder="AAAA-MM-DD" value="{{ old('fecha_inicio',$informacionUniversitaria->fecha_inicio ?? '' ) }}" class="form-control pull-right">
    </div>
</div>

<!-- Periodo Académico Inicial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_academico_inicial', __('models/informacionesUniversitarias.fields.periodo_academico_inicial').':') !!}
    <select name="periodo_academico_inicial" id="periodo_academico_inicial" class="form-control">
        <option></option>
        @if(!empty(old('periodo_academico_inicial', $informacionUniversitaria->periodo_academico_inicial ?? '' )))
            <option value="{{ old('periodo_academico_inicial', $informacionUniversitaria->periodo_academico_inicial ?? '' ) }}" selected> {{ App\Models\Formaciones\PeriodoAcademico::find(old('periodo_academico_inicial', $informacionUniversitaria->periodo_academico_inicial ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Fecha Grado Field -->
<div id="div_fecha_grado" class="form-group col-sm-6">
    {!! Form::label('fecha_grado', __('models/informacionesUniversitarias.fields.fecha_grado').':') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_grado" name="fecha_grado" type="text" placeholder="AAAA-MM-DD" value="{{ old('fecha_grado',$informacionUniversitaria->fecha_grado ?? '' ) }}" class="form-control pull-right">
    </div>
</div>

<!-- Periodo Académico Final Field -->
<div id="div_periodo_academico_final" class="form-group col-sm-6">
    {!! Form::label('periodo_academico_final', __('models/informacionesUniversitarias.fields.periodo_academico_final').':') !!}
    <select name="periodo_academico_final" id="periodo_academico_final" class="form-control">
        <option></option>
        @if(!empty(old('periodo_academico_final', $informacionUniversitaria->periodo_academico_final ?? '' )))
            <option value="{{ old('periodo_academico_final', $informacionUniversitaria->periodo_academico_final ?? '' ) }}" selected> {{ App\Models\Formaciones\PeriodoAcademico::find(old('periodo_academico_final', $informacionUniversitaria->periodo_academico_final ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Promedio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('promedio', __('models/informacionesUniversitarias.fields.promedio').':') !!}
    {!! Form::text('promedio', null, ['class' => 'form-control']) !!}
</div>

<!-- Periodo Alcanzado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_alcanzado', __('models/informacionesUniversitarias.fields.periodo_alcanzado').':') !!}
    {!! Form::text('periodo_alcanzado', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.informacionesUniversitarias.index',['idContacto'=>$idContacto]) }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_inicio').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#fecha_grado').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#finalizado').change(function(){
            if($('#finalizado').val()==1){
                $('#div_fecha_grado').show();   
                $('#div_periodo_academico_final').show();
           }else{ 
                $('#div_fecha_grado').hide();
                $('#div_periodo_academico_final').hide();      
           }
        }); 
        $('#entidad_id').change(function(){
            $('#formacion_id').val(null).trigger('change');
        }); 
        $(document).ready(function() { 
            if($('#finalizado').val()==1){
                $('#div_fecha_grado').show(); 
                $('#div_periodo_academico_final').show();  
           }else{ 
                $('#div_fecha_grado').hide(); 
                $('#div_periodo_academico_final').hide();     
           }
            $('#finalizado').select2(); 
            $('#entidad_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("entidades.entidades.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        return {
                            q: params.term, 
                            es_ies: 1,
                            page: params.page || 1,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.results,
                            pagination: {
                                more: data.more
                            }
                        };
                    }
                },
            });
            $('#tipo_acceso_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.tiposAcceso.dataAjax") }}',
                    dataType: 'json'
                },
            });
            $('#periodo_academico_inicial').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.periodosAcademicos.dataAjax") }}',
                    dataType: 'json'
                },
            });
            $('#periodo_academico_final').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.periodosAcademicos.dataAjax") }}',
                    dataType: 'json'
                },
            });
            $('#formacion_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.formaciones.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        entidad_seleccionada = $('#entidad_id').val();
                        if($('#entidad_id').val()=== ''){
                            entidad_seleccionada='n';    
                        }
                        return {
                            q: params.term, 
                            entidad: entidad_seleccionada,
                            page: params.page || 1,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.results,
                            pagination: {
                                more: data.more
                            }
                        };
                    }   
                },
            });             
        }); 
    </script>
@endpush
