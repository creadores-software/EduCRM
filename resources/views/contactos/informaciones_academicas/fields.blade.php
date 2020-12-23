{!! Form::hidden('contacto_id',$idContacto) !!}
{!! Form::hidden('idContacto',$idContacto) !!}
{!! Form::hidden('id', old('id', $informacionAcademica->id ?? '')) !!}

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
<div class="form-group col-sm-12">
    {!! Form::label('finalizado', __('models/informacionesAcademicas.fields.finalizado').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('finalizado', 0) !!}
        {!! Form::checkbox('finalizado', 1, old('finalizado', $informacionAcademica->finalizado ?? 1)) !!}  &nbsp;
    </label>
</div>

<!-- Fecha Grado Estimada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_grado_estimada', __('models/informacionesAcademicas.fields.fecha_grado_estimada').':') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_grado_estimada" name="fecha_grado_estimada" type="text" placeholder="AAAA-MM-DD" value="{{ old('fecha_grado_estimada',$informacionAcademica->fecha_grado_estimada ?? '' ) }}" class="form-control pull-right">
    </div>
</div>

<!-- Fecha Grado Real Field -->
<div class="form-group col-sm-6">
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
        })
        $('#fecha_grado_real').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        })
        $(document).ready(function() { 
            $('#formacion_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.formaciones.dataAjax") }}',
                    dataType: 'json',
                },
            });             
        }); 
    </script>
@endpush
