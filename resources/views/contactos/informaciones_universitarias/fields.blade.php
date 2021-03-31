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
           }else{ 
                $('#div_fecha_grado').hide();      
           }
        }); 
        $('#entidad_id').change(function(){
            $('#formacion_id').val(null).trigger('change');
        }); 
        $(document).ready(function() { 
            if($('#finalizado').val()==1){
                $('#div_fecha_grado').show();   
           }else{ 
                $('#div_fecha_grado').hide();      
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
                        };
                    },
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
                        };
                    },
                },
            });             
        }); 
    </script>
@endpush
