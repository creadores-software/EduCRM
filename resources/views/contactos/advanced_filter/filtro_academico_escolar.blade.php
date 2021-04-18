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
        });
        $('#colegioFechaFinalInicio').datetimepicker({
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
                        };
                    },
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