<h3 class="page-header" style="padding-left: 20px">Interacciones</h3>

<!-- Tipo Interaccion -->
<div class="form-group col-sm-6">
    {!! Form::label('tipoInteracciones', __('models/interacciones.fields.tipo_interaccion_id')) !!}
    <select name="tipoInteracciones[]" id="tipoInteracciones" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Estado Interaccion -->
<div class="form-group col-sm-6">
    {!! Form::label('estadoInteracciones', __('models/interacciones.fields.estado_interaccion_id')) !!}
    <select name="estadoInteracciones[]" id="estadoInteracciones" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Fecha Inicio -->
<div class="form-group col-sm-6">
    {!! Form::label('campaniaFechaInicio', 'Fecha de Inicio:') !!}
    <div class="row">
        <div class="col-sm-6">
            <input id="campaniaFechaInicialInicio" name="campaniaFechaInicialInicio" type="text" placeholder="Desde" value="{{ old('campaniaFechaInicialInicio') }}" class="form-control pull-right">
        </div>
        <div class="col-sm-6">
            <input id="campaniaFechaFinalInicio" name="campaniaFechaFinalInicio" type="text" placeholder="Hasta" value="{{ old('campaniaFechaFinalInicio') }}" class="form-control pull-right">
        </div>
    </div>
</div>

<!-- Fecha de Fin -->
<div class="form-group col-sm-6">
    {!! Form::label('campaniaFechaFin', 'Fecha de Fin:') !!}
    <div class="row">
        <div class="col-sm-6">
            <input id="campaniaFechaInicialFin" name="campaniaFechaInicialFin" type="text" placeholder="Desde" value="{{ old('campaniaFechaInicialFin') }}" class="form-control pull-right">
        </div>
        <div class="col-sm-6">
            <input id="campaniaFechaFinalFin" name="campaniaFechaFinalFin" type="text" placeholder="Hasta" value="{{ old('campaniaFechaFinalFin') }}" class="form-control pull-right">
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">    
        $('#campaniaFechaInicialFin').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        }).on('dp.change', function(e) {
            $('#campaniaFechaFinalFin').data("DateTimePicker").minDate(e.date);
        });
        $('#campaniaFechaFinalFin').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#campaniaFechaInicialInicio').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        }).on('dp.change', function(e) {
            $('#campaniaFechaFinalInicio').data("DateTimePicker").minDate(e.date);
        });
        $('#campaniaFechaFinalInicio').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        }).on('dp.change', function(e) {
            $('#campaniaFechaInicialFin').data("DateTimePicker").minDate(e.date);
        });     
        $(document).ready(function() { 
            $('#tipoInteracciones').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("campanias.tiposInteraccion.dataAjax") }}',
                    dataType: 'json',
                },
            });  
            $('#estadoInteracciones').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("campanias.estadosInteraccion.dataAjax") }}',
                    dataType: 'json',
                },
            });
            
        });   
    </script>
@endpush
