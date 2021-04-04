<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/nivelesFormacion.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Nivel Academico Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_academico_id', __('models/nivelesFormacion.fields.nivel_academico_id').':') !!}
    <select name="nivel_academico_id" id="nivel_academico_id" class="form-control">
        <option></option>
        @if(!empty(old('nivel_academico_id', $nivelFormacion->nivel_academico_id ?? '' )))
            <option value="{{ old('nivel_academico_id', $nivelFormacion->nivel_academico_id ?? '' ) }}" selected> {{ App\Models\Formaciones\NivelAcademico::find(old('nivel_academico_id', $nivelFormacion->nivel_academico_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('formaciones.nivelesFormacion.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#nivel_academico_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.nivelesAcademicos.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });
    </script>
@endpush
