<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/formaciones.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Entidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entidad_id', __('models/formaciones.fields.entidad_id').':') !!}
    <select name="entidad_id" id="entidad_id" class="form-control">
        @if(!empty(old('entidad_id', $formacion->entidad_id ?? '' )))
            <option value="{{ old('entidad_id', $formacion->entidad_id ?? '' ) }}" selected> {{ App\Models\Entidades\Entidad::find(old('entidad_id', $formacion->entidad_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Nivel Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_formacion_id', __('models/formaciones.fields.nivel_formacion_id').':') !!}
    <select name="nivel_formacion_id" id="nivel_formacion_id" class="form-control">
        @if(!empty(old('nivel_formacion_id', $formacion->nivel_formacion_id ?? '' )))
            <option value="{{ old('nivel_formacion_id', $formacion->nivel_formacion_id ?? '' ) }}" selected> {{ App\Models\Formaciones\NivelFormacion::find(old('nivel_formacion_id', $formacion->nivel_formacion_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Area Conocimiento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campo_educacion_id', __('models/formaciones.fields.campo_educacion_id').':') !!}
    <select name="campo_educacion_id" id="campo_educacion_id" class="form-control">
        @if(!empty(old('campo_educacion_id', $formacion->campo_educacion_id ?? '' )))
            <option value="{{ old('campo_educacion_id', $formacion->campo_educacion_id ?? '' ) }}" selected> {{ App\Models\Formaciones\AreaConocimiento::find(old('campo_educacion_id', $formacion->campo_educacion_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', __('models/formaciones.fields.activo').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('activo', 0) !!}
        {!! Form::checkbox('activo', '1', null) !!} &nbsp;
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('formaciones.formaciones.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {            
            $('#entidad_id').select2({
                ajax: {
                    url: '{{ route("entidades.entidades.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#nivel_formacion_id').select2({
                ajax: {
                    url: '{{ route("formaciones.nivelesFormacion.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#campo_educacion_id').select2({
                ajax: {
                    url: '{{ route("formaciones.camposEducacion.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });
    </script>
@endpush

