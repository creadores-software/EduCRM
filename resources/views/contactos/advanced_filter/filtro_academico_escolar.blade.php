 <!-- Entidad Id Field -->
 <div class="form-group col-sm-6">
    {!! Form::label('entidad_id', __('models/informacionesEscolares.fields.entidad_id').':') !!}
    <select name="colegioEntidades[]" id="colegioEntidades" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Ubicación entidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('colegioUbicacionesEntidad', 'Ubicación Entidad:') !!}
    <select name="colegioUbicacionesEntidad[]" id="colegioUbicacionesEntidad" class="form-control">                
    </select> 
</div>

<!-- Nivel Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_formacion_id', __('models/informacionesEscolares.fields.nivel_formacion_id').':') !!}
    <select name="colegioNivelesFormacion[]" id="colegioNivelesFormacion" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Grado Alcanzado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grado', __('models/informacionesEscolares.fields.grado').':') !!}
    <div class="row">
        <div class="col-sm-6">
            <input id="colegioGradoMinimo" name="colegioGradoMinimo" type="text" placeholder="Desde" value="{{ old('colegioGradoMinimo') }}" class="form-control pull-right">
        </div>
        <div class="col-sm-6">
            <input id="colegioGradoMaximo" name="colegioGradoMaximo" type="text" placeholder="Hasta" value="{{ old('colegioGradoMaximo') }}" class="form-control pull-right">
        </div>
    </div>
</div>

<!-- Fecha Inicio -->
<div class="form-group col-sm-6">
    {!! Form::label('colegioFechaInicio', 'Fecha de Inicio:') !!}
    <div class="row">
        <div class="col-sm-6">
            <input id="colegioFechaInicialInicio" name="colegioFechaInicialInicio" type="text" placeholder="Desde" value="{{ old('colegioFechaInicialInicio') }}" class="form-control pull-right">
        </div>
        <div class="col-sm-6">
            <input id="colegioFechaFinalInicio" name="colegioFechaFinalInicio" type="text" placeholder="Hasta" value="{{ old('colegioFechaFinalInicio') }}" class="form-control pull-right">
        </div>
    </div>
</div>

<!-- Fecha de Grado -->
<div class="form-group col-sm-6">
    {!! Form::label('colegioFechaGrado', 'Fecha de Grado:') !!}
    <div class="row">
        <div class="col-sm-6">
            <input id="colegioFechaInicialGrado" name="colegioFechaInicialGrado" type="text" placeholder="Desde" value="{{ old('colegioFechaInicialGrado') }}" class="form-control pull-right">
        </div>
        <div class="col-sm-6">
            <input id="colegioFechaFinalGrado" name="colegioFechaFinalGrado" type="text" placeholder="Hasta" value="{{ old('colegioFechaFinalGrado') }}" class="form-control pull-right">
        </div>
    </div>
</div>

<!-- Fecha Icfes -->
<div class="form-group col-sm-6">
    {!! Form::label('colegioFechaIcfes', 'Fecha Icfes:') !!}
    <div class="row">
        <div class="col-sm-6">
            <input id="colegioFechaInicialIcfes" name="colegioFechaInicialIcfes" type="text" placeholder="Desde" value="{{ old('colegioFechaInicialIcfes') }}" class="form-control pull-right">
        </div>
        <div class="col-sm-6">
            <input id="colegioFechaFinalIcfes" name="colegioFechaFinalIcfes" type="text" placeholder="Hasta" value="{{ old('colegioFechaFinalIcfes') }}" class="form-control pull-right">
        </div>
    </div>
</div>

<!-- Grado Alcanzado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('puntaje_icfes', __('models/informacionesEscolares.fields.puntaje_icfes').':') !!}
    <div class="row">
        <div class="col-sm-6">
            <input id="colegioIcfesMinimo" name="colegioIcfesMinimo" type="text" placeholder="Desde" value="{{ old('colegioIcfesMinimo') }}" class="form-control pull-right">
        </div>
        <div class="col-sm-6">
            <input id="colegioIcfesMaximo" name="colegioIcfesMaximo" type="text" placeholder="Hasta" value="{{ old('colegioIcfesMaximo') }}" class="form-control pull-right">
        </div>
    </div>
</div>

<!-- Finalizado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finalizado', __('models/informacionesEscolares.fields.finalizado').':') !!}
    {!! Form::select('colegioFinalizado',[''=>'TODOS',1=>'SI', 0=>'NO'], old('colegioFinalizado'), ['class' => 'form-control','id'=>'colegioFinalizado']) !!}
</div>

@push('scripts')
    <script type="text/javascript">      
         $('#colegioFechaInicialGrado').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        }).on('dp.change', function(e) {
            $('#colegioFechaFinalGrado').data("DateTimePicker").minDate(e.date);
        });
        $('#colegioFechaFinalGrado').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#colegioFechaInicialInicio').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        }).on('dp.change', function(e) {
            $('#colegioFechaFinalInicio').data("DateTimePicker").minDate(e.date);
        });
        $('#colegioFechaFinalInicio').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#colegioFechaInicialIcfes').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        }).on('dp.change', function(e) {
            $('#colegioFechaFinalIcfes').data("DateTimePicker").minDate(e.date);
        });
        $('#colegioFechaFinalIcfes').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $(document).ready(function() {            
            $('#colegioFinalizado').select2();
            $('#colegioEntidades').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("entidades.entidades.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        return {
                            q: params.term, 
                            es_colegio: 1,
                            page: params.page || 1,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.results,
                            pagination: {
                                more: data.more
                            }
                        };
                    }
                },
            }); 
            $('#colegioNivelesFormacion').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("formaciones.nivelesFormacion.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        return {
                            q: params.term, 
                            es_ies: 0,
                        };
                    },
                },
            }); 
            $('#colegioUbicacionesEntidad').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.lugares.dataAjax") }}',
                    data: function (params) {  
                        return {
                            q: params.term, 
                            todos: 1,
                        };
                    },
                    dataType: 'json',
                },                
            });          
        });
    </script>
@endpush
