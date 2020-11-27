<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/ocupaciones.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Ocupacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_ocupacion_id', __('models/ocupaciones.fields.tipo_ocupacion_id').':') !!}
    <select name="tipo_ocupacion_id" id="tipo_ocupacion_id" class="form-control">
        @if(!empty(old('tipo_ocupacion_id', $ocupacion->tipo_ocupacion_id ?? '' )))
            <option value="{{ old('tipo_ocupacion_id', $ocupacion->tipo_ocupacion_id ?? '' ) }}" selected> {{ App\Models\Entidades\tipoOcupacion::find(old('tipo_ocupacion_id', $ocupacion->tipo_ocupacion_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('entidades.ocupaciones.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tipo_ocupacion_id').select2({
                ajax: {
                    url: '{{ route("entidades.tiposOcupacion.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });
    </script>
@endpush
