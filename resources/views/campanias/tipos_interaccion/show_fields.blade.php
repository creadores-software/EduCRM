<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/tiposInteraccion.fields.nombre').':') !!}
    <p>{{ $tipoInteraccion->nombre }}</p>
</div>

<!-- Estados -->
<div class="form-group">
    {!! Form::label('estados', ' Estados:') !!}
    <select name="tipoInteraccionEstados[]" id="tipoInteraccionEstados" class="form-control"  multiple="multiple" disabled="true">
        @foreach (old('tipoInteraccionEstados[]', $tipoInteraccion->tipoInteraccionEstados,null) as $estado)
                <option value="{{ $estado->id }}" selected="selected">{{ $estado->nombre }}</option>
        @endforeach
    </select> 
</div>

@push('scripts')
    <script type="text/javascript"> 
        var colores = @json($colores);

        $(document).ready(function() {                           
            $('#tipoInteraccionEstados').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                templateSelection: formatState,
                templateResult: formatState,
                ajax: {
                    url: '{{ route("campanias.estadosInteraccion.dataAjax") }}',
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

