<!-- Tipo Estado Color Id Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('tipo_estado_color_id', __('models/estadosCampania.fields.tipo_estado_color_id')) !!}
    <select name="tipo_estado_color_id" id="tipo_estado_color_id" class="form-control">
        <option></option>
        @if(!empty(old('tipo_estado_color_id', $estadoCampania->tipo_estado_color_id ?? '' )))
            <option value="{{ old('tipo_estado_color_id', $estadoCampania->tipo_estado_color_id ?? '' ) }}" selected> {{ App\Models\Campanias\TipoEstadoColor::find(old('tipo_estado_color_id', $estadoCampania->tipo_estado_color_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('nombre', __('models/estadosCampania.fields.nombre')) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id', old('id', $estadoCampania->id ?? '')) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('descripcion', __('models/estadosCampania.fields.descripcion')) !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.estadosCampania.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
    var colores = @json($colores);
        $(document).ready(function() {
            $('#tipo_estado_color_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                templateSelection: formatState,
                templateResult: formatState,
                ajax: {
                    url: '{{ route("campanias.tiposEstadoColor.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });

        function formatState(state) {
            if (!state.id) return state.text;
            var color = colores[state.id]['color'];
            return $(`<span style="color: ${color}"><i class='fa fa-circle'></i></span><span> ${state.text}</span>`);
        };
    </script>
@endpush
