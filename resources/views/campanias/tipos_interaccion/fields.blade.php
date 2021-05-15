<!-- Nombre Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('nombre', __('models/tiposInteraccion.fields.nombre')) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id', old('id', $tipoInteraccion->id ?? '')) !!}
</div>

<!-- Con Fecha Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('con_fecha_fin', __('models/tiposInteraccion.fields.con_fecha_fin')) !!}
    {!! Form::select('con_fecha_fin',[1=>'SI', 0=>'NO'], old('con_fecha_fin'), ['class' => 'form-control']) !!}
</div>

<!-- Permisos -->
<div class="form-group col-sm-6">
    {!! Form::label('estados', ' Estados:') !!}
    <select name="tipoInteraccionEstados[]" id="tipoInteraccionEstados" class="form-control"  multiple="multiple">
        @if(!empty($tipoInteraccion))
            @foreach (old('tipoInteraccionEstados[]', $tipoInteraccion->tipoInteraccionEstados,null) as $estado)
                <option value="{{ $estado->id }}" selected="selected">{{ $estado->nombre }}</option>
            @endforeach
        @endif     
    </select> 
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.tiposInteraccion.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
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
            $('#con_fecha_fin').select2();     
        });

        function formatState(state) {
            if (!state.id) return state.text;
            var color = colores[state.id]['color'];
            return $(`<span style="color: ${color}"><i class='fa fa-circle'></i></span><span> ${state.text}</span>`);
        };

    </script>
@endpush
