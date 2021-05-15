 <!-- Entidad Id Field -->
 <div class="form-group col-sm-6">
    {!! Form::label('entidad_id', __('models/informacionesUniversitarias.fields.entidad_id')) !!}
    <select name="universidadEntidades[]" id="universidadEntidades" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Ubicación entidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('universidadUbicacionesEntidad', 'Ubicación Entidad:') !!}
    <select name="universidadUbicacionesEntidad[]" id="universidadUbicacionesEntidad" class="form-control">                
    </select> 
</div>

<!-- Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formacion_id', __('models/informacionesUniversitarias.fields.formacion_id')) !!}
    <select name="universidadFormaciones[]" id="universidadFormaciones" class="form-control"  multiple="multiple">
    </select> 
</div>

<!-- Categoria Campo Educación Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('universidadCategoriasCampoEducacion','Categoría Campo Educación:') !!}
    <select name="universidadCategoriasCampoEducacion[]" id="universidadCategoriasCampoEducacion" class="form-control"  multiple="multiple">
    </select> 
</div>

<!-- Campo Educación Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('universidadCamposEducacion', 'Campo Educación:') !!}
    <select name="universidadCamposEducacion[]" id="universidadCamposEducacion" class="form-control"  multiple="multiple">
    </select> 
</div>

<!-- Tipo Acceso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_acceso_id', __('models/informacionesUniversitarias.fields.tipo_acceso_id')) !!}
    <select name="universidadTiposAcceso[]" id="universidadTiposAcceso" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Promedio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('promedio', __('models/informacionesUniversitarias.fields.promedio')) !!}
    <div class="row">
        <div class="col-sm-6">
            <input id="universidadPromedioMinimo" name="universidadPromedioMinimo" type="text" placeholder="Desde" value="{{ old('universidadPromedioMinimo') }}" class="form-control pull-right">
        </div>
        <div class="col-sm-6">
            <input id="universidadPromedioMaximo" name="universidadPromedioMaximo" type="text" placeholder="Hasta" value="{{ old('universidadPromedioMaximo') }}" class="form-control pull-right">
        </div>
    </div>
</div>

<!-- Periodo Alcanzado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_alcanzado', __('models/informacionesUniversitarias.fields.periodo_alcanzado')) !!}
    <div class="row">
        <div class="col-sm-6">
            <input id="universidadPeriodoAlcanzadoMinimo" name="universidadPeriodoAlcanzadoMinimo" type="text" placeholder="Desde" value="{{ old('universidadPeriodoAlcanzadoMinimo') }}" class="form-control pull-right">
        </div>
        <div class="col-sm-6">
            <input id="universidadPeriodoAlcanzadoMaximo" name="universidadPeriodoAlcanzadoMaximo" type="text" placeholder="Hasta" value="{{ old('universidadPeriodoAlcanzadoMaximo') }}" class="form-control pull-right">
        </div>
    </div>
</div>

<!-- Fecha Inicio -->
<div class="form-group col-sm-6">
    {!! Form::label('universidadFechaInicio', 'Fecha de Inicio:') !!}
    <div class="row">
        <div class="col-sm-6">
            <input id="universidadFechaInicialInicio" name="universidadFechaInicialInicio" type="text" placeholder="Desde" value="{{ old('universidadFechaInicialInicio') }}" class="form-control pull-right">
        </div>
        <div class="col-sm-6">
            <input id="universidadFechaFinalInicio" name="universidadFechaFinalInicio" type="text" placeholder="Hasta" value="{{ old('universidadFechaFinalInicio') }}" class="form-control pull-right">
        </div>
    </div>
</div>

<!-- Fecha de Grado -->
<div class="form-group col-sm-6">
    {!! Form::label('universidadFechaGrado', 'Fecha de Grado:') !!}
    <div class="row">
        <div class="col-sm-6">
            <input id="universidadFechaInicialGrado" name="universidadFechaInicialGrado" type="text" placeholder="Desde" value="{{ old('universidadFechaInicialGrado') }}" class="form-control pull-right">
        </div>
        <div class="col-sm-6">
            <input id="universidadFechaFinalGrado" name="universidadFechaFinalGrado" type="text" placeholder="Hasta" value="{{ old('universidadFechaFinalGrado') }}" class="form-control pull-right">
        </div>
    </div>
</div>

<!-- Periodo Academico Inicial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_academico_inicial', __('models/informacionesUniversitarias.fields.periodo_academico_inicial')) !!}
    <select name="universidadPeriodosAcademicosIniciales[]" id="universidadPeriodosAcademicosIniciales" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Periodo Academico Final Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_academico_final', __('models/informacionesUniversitarias.fields.periodo_academico_final')) !!}
    <select name="universidadPeriodosAcademicosFinales[]" id="universidadPeriodosAcademicosFinales" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Finalizado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finalizado', __('models/informacionesUniversitarias.fields.finalizado')) !!}
    {!! Form::select('universidadFinalizado',[''=>'TODOS',1=>'SI',0=>'NO'], old('universidadFinalizado'), ['class' => 'form-control','id'=>'universidadFinalizado']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#universidadFechaInicialGrado').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        }).on('dp.change', function(e) {
            $('#universidadFechaFinalGrado').data("DateTimePicker").minDate(e.date);
        });
        $('#universidadFechaFinalGrado').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#universidadFechaInicialInicio').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        }).on('dp.change', function(e) {
            $('#universidadFechaFinalInicio').data("DateTimePicker").minDate(e.date);
        });
        $('#universidadFechaFinalInicio').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#universidadEntidades').change(function(){
            $('#universidadFormaciones').val(null).trigger('change');
        }); 
        $(document).ready(function() { 
            $('#universidadFinalizado').select2(); 
            $('#universidadEntidades').select2({
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
                            es_ies: 1,
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
            $('#universidadFormaciones').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("formaciones.formaciones.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        entidades_seleccionadas = $('#universidadEntidades').val();
                        if($('#universidadEntidades').val()=== ''){
                            entidades_seleccionadas='n';    
                        }
                        return {
                            q: params.term, 
                            entidad: entidades_seleccionadas,
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
            $('#universidadTiposAcceso').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("formaciones.tiposAcceso.dataAjax") }}',
                    dataType: 'json'
                },
            });
            $('#universidadPeriodosAcademicosIniciales').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("formaciones.periodosAcademicos.dataAjax") }}',
                    dataType: 'json'
                },
            });
            $('#universidadPeriodosAcademicosFinales').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("formaciones.periodosAcademicos.dataAjax") }}',
                    dataType: 'json'
                },
            });
            $('#universidadTiposAcceso').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("formaciones.tiposAcceso.dataAjax") }}',
                    dataType: 'json'
                },
            });
            $('#universidadUbicacionesEntidad').select2({
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
            $('#universidadCategoriasCampoEducacion').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("formaciones.categoriasCampoEducacion.dataAjax") }}',
                    dataType: 'json'
                },
            }); 
            $('#universidadCamposEducacion').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("formaciones.camposEducacion.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        categorias_seleccionadas = $('#universidadCategoriasCampoEducacion').val();
                        if($('#universidadCategoriasCampoEducacion').val()=== ''){
                            categorias_seleccionadas='n';    
                        }
                        return {
                            q: params.term, 
                            categoria: categorias_seleccionadas,
                        };
                    },
                },
            });          
        });
    </script>
@endpush
