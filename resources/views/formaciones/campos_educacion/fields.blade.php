<!-- Categoria Campo Educacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_campo_educacion_id', __('models/camposEducacion.fields.categoria_campo_educacion_id').':') !!}
    <select name="categoria_campo_educacion_id" id="categoria_campo_educacion_id" class="form-control">
        @if(!empty(old('categoria_campo_educacion_id', $campoEducacion->categoria_campo_educacion_id ?? '' )))
            <option value="{{ old('categoria_campo_educacion_id', $campoEducacion->categoria_campo_educacion_id ?? '' ) }}" selected> {{ App\Models\Formaciones\CategoriaCampoEducacion::find(old('categoria_campo_educacion_id', $campoEducacion->categoria_campo_educacion_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/camposEducacion.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('formaciones.camposEducacion.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#categoria_campo_educacion_id').select2({
                ajax: {
                    url: '{{ route("formaciones.categoriasCampoEducacion.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });
    </script>
@endpush
