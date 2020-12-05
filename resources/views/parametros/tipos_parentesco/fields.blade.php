<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/tiposParentesco.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id', old('id', $tipoParentesco->id ?? '')) !!}
</div>

<!-- Tipo Contrario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_contrario_id', __('models/tiposParentesco.fields.tipo_contrario_id').':') !!}
    <select name="tipo_contrario_id" id="tipo_contrario_id" class="form-control">
        @if(!empty(old('tipo_contrario_id', $tipoParentesco->tipo_contrario_id ?? '' )))
            <option value="{{ old('tipo_contrario_id', $tipoParentesco->tipo_contrario_id ?? '' ) }}" selected> {{ App\Models\Parametros\TipoParentesco::find(old('tipo_contrario_id', $tipoParentesco->tipo_contrario_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('parametros.tiposParentesco.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tipo_contrario_id').select2({
                ajax: {
                    url: '{{ route("parametros.tiposParentesco.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });
    </script>
@endpush
