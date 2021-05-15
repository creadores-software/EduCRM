<!-- Entidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entidad_id', __('models/informacionesLaborales.fields.entidad_id').':') !!}
    <select name="laboralEntidades[]" id="laboralEntidades" class="form-control">
     </select> 
</div>

<!-- Ubicación entidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('laboralUbicacionesEntidad', 'Ubicación Entidad:') !!}
    <select name="laboralUbicacionesEntidad[]" id="laboralUbicacionesEntidad" class="form-control">                
    </select> 
</div>

<!-- Categoria Actividad Económica Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('laboralCategoriasActividadEconomica', 'Categoría Actividad Económica:') !!}
    <select name="laboralCategoriasActividadEconomica[]" id="laboralCategoriasActividadEconomica" class="form-control">
    </select> 
</div>

<!-- Actividad Económica Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('laboralActividadesEconomicas', 'Actividad Económica:') !!}
    <select name="laboralActividadesEconomicas[]" id="laboralActividadesEconomicas" class="form-control">
    </select> 
</div>

<!-- Categoria Ocupacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('laboralTiposOcupacion', 'Categoría Ocupación:') !!}
    <select name="laboralTiposOcupacion[]" id="laboralTiposOcupacion" class="form-control">
    </select> 
</div>

<!-- Ocupacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ocupacion_id', __('models/informacionesLaborales.fields.ocupacion_id').':') !!}
    <select name="laboralOcupaciones[]" id="laboralOcupaciones" class="form-control">
    </select> 
</div>

<!-- Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area', __('models/informacionesLaborales.fields.area').':') !!}
    {!! Form::text('laboralArea', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', __('models/informacionesLaborales.fields.telefono').':') !!}
    {!! Form::text('laboralTelefono', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}
</div>

<!-- Funciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('funciones', __('models/informacionesLaborales.fields.funciones').':') !!}
    {!! Form::text('laboralFunciones', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}
</div>

<!-- Fecha Inicio -->
<div class="form-group col-sm-6">
    {!! Form::label('laboralFechaInicio', 'Fecha de Inicio:') !!}
    <div class="row">
        <div class="col-sm-6">
            <input id="laboralFechaInicialInicio" name="laboralFechaInicialInicio" type="text" placeholder="Desde" value="{{ old('laboralFechaInicialInicio') }}" class="form-control pull-right">
        </div>
        <div class="col-sm-6">
            <input id="laboralFechaFinalInicio" name="laboralFechaFinalInicio" type="text" placeholder="Hasta" value="{{ old('laboralFechaFinalInicio') }}" class="form-control pull-right">
        </div>
    </div>
</div>

<!-- Fecha de Fin -->
<div class="form-group col-sm-6">
    {!! Form::label('laboralFechaFin', 'Fecha de Fin:') !!}
    <div class="row">
        <div class="col-sm-6">
            <input id="laboralFechaInicialFin" name="laboralFechaInicialFin" type="text" placeholder="Desde" value="{{ old('laboralFechaInicialFin') }}" class="form-control pull-right">
        </div>
        <div class="col-sm-6">
            <input id="laboralFechaFinalFin" name="laboralFechaFinalFin" type="text" placeholder="Hasta" value="{{ old('laboralFechaFinalFin') }}" class="form-control pull-right">
        </div>
    </div>
</div>

<!-- Vinculado Actualmente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vinculado_actualmente', __('models/informacionesLaborales.fields.vinculado_actualmente').':') !!}
    {!! Form::select('laboralVinculado',[''=>'TODOS',1=>'SI',0=>'NO'], old('vinculado_actualmente'), ['class' => 'form-control','id'=>'laboralVinculado']) !!}
</div>

@push('scripts')
    <script type="text/javascript">        
        $('#laboralFechaInicialFin').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        }).on('dp.change', function(e) {
            $('#laboralFechaFinalFin').data("DateTimePicker").minDate(e.date);
        });
        $('#laboralFechaFinalFin').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#laboralFechaInicialInicio').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        }).on('dp.change', function(e) {
            $('#laboralFechaFinalInicio').data("DateTimePicker").minDate(e.date);
        });
        $('#laboralFechaFinalInicio').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });   
        $(document).ready(function() { 
            $('#laboralVinculado').select2(); 
            $('#laboralEntidades').select2({
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
            $('#laboralOcupaciones').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("entidades.ocupaciones.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#laboralUbicacionesEntidad').select2({
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
            $('#laboralTiposOcupacion').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("entidades.tiposOcupacion.dataAjax") }}',
                    dataType: 'json'
                },
            }); 
            $('#laboralOcupaciones').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("entidades.ocupaciones.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        categorias_seleccionadas = $('#laboralTiposOcupacion').val();
                        if($('#laboralTiposOcupacion').val()=== ''){
                            categorias_seleccionadas='n';    
                        }
                        return {
                            q: params.term, 
                            categoria: categorias_seleccionadas,
                        };
                    },
                },
            });   
            $('#laboralCategoriasActividadEconomica').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("entidades.categoriasActividadEconomica.dataAjax") }}',
                    dataType: 'json'
                },
            }); 
            $('#laboralActividadesEconomicas').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("entidades.actividadesEconomicas.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        categorias_seleccionadas = $('#laboralCategoriasActividadEconomica').val();
                        if($('#laboralCategoriasActividadEconomica').val()=== ''){
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

