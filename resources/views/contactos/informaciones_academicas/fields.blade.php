{!! Form::hidden('contacto_id',$idContacto) !!}
{!! Form::hidden('idContacto',$idContacto) !!}
{!! Form::hidden('id', old('id', $informacionAcademica->id ?? '')) !!}

<!-- Entidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entidad_id', __('models/informacionesAcademicas.fields.entidad_id').':') !!}
    <select name="entidad_id" id="entidad_id" class="form-control">
        <option></option>
        @if(!empty(old('entidad_id', $informacionAcademica->entidad_id ?? '' )))
            <option value="{{ old('entidad_id', $informacionAcademica->entidad_id ?? '' ) }}" selected> {{ App\Models\Entidades\Entidad::find(old('entidad_id', $informacionAcademica->entidad_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formacion_id', __('models/informacionesAcademicas.fields.formacion_id').':') !!}
    <select name="formacion_id" id="formacion_id" class="form-control">
        <option></option>
        @if(!empty(old('formacion_id', $informacionAcademica->formacion_id ?? '' )))
            <option value="{{ old('formacion_id', $informacionAcademica->formacion_id ?? '' ) }}" selected> {{ App\Models\Formaciones\Formacion::find(old('formacion_id', $informacionAcademica->formacion_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Finalizado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finalizado', __('models/informacionesAcademicas.fields.finalizado').':') !!}
    {!! Form::select('finalizado',[1=>'SI',0=>'NO'], old('finalizado'), ['class' => 'form-control']) !!}
</div>

<!-- Fecha Grado Estimada Field -->
<div id="div_fecha_estimada" class="form-group col-sm-6">
    {!! Form::label('fecha_grado_estimada', __('models/informacionesAcademicas.fields.fecha_grado_estimada').':') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_grado_estimada" name="fecha_grado_estimada" type="text" placeholder="AAAA-MM-DD" value="{{ old('fecha_grado_estimada',$informacionAcademica->fecha_grado_estimada ?? '' ) }}" class="form-control pull-right">
    </div>
</div>

<!-- Fecha Grado Real Field -->
<div id="div_fecha_real" class="form-group col-sm-6">
    {!! Form::label('fecha_grado_real', __('models/informacionesAcademicas.fields.fecha_grado_real').':') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_grado_real" name="fecha_grado_real" type="text" placeholder="AAAA-MM-DD" value="{{ old('fecha_grado_real',$informacionAcademica->fecha_grado_real ?? '' ) }}" class="form-control pull-right">
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.informacionesAcademicas.index',['idContacto'=>$idContacto]) }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_grado_estimada').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#fecha_grado_real').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#finalizado').change(function(){
           if($('#finalizado').val()==1){
                $('#div_fecha_estimada').hide(); 
                $('#div_fecha_real').show();   
           }else{
                $('#div_fecha_estimada').show(); 
                $('#div_fecha_real').hide();      
           }
        }); 
        $('#entidad_id').change(function(){
            $('#formacion_id').val(null).trigger('change');
        }); 
        $(document).ready(function() { 
            if($('#finalizado').val()==1){
                $('#div_fecha_estimada').hide(); 
                $('#div_fecha_real').show();   
            }else{
                $('#div_fecha_estimada').show(); 
                $('#div_fecha_real').hide();      
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
