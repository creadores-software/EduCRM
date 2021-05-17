<h3 class="page-header" style="padding-left: 20px">Campañas</h3>

<!-- Tipo Campañas -->
<div class="form-group col-sm-6">
    {!! Form::label('tipoCampanias', __('models/campanias.fields.tipo_campania_id')) !!}
    <select name="tipoCampanias[]" id="tipoCampanias" class="form-control" multiple="multiple">
    </select> 
</div>


<!-- Campañas -->
<div class="form-group col-sm-6">
    {!! Form::label('campaniasOportunidad', __('models/oportunidades.fields.campania_id')) !!}
    <select name="campaniasOportunidad[]" id="campaniasOportunidad" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Estados Campañas -->
<div class="form-group col-sm-6">
    {!! Form::label('estadosCampanias', __('models/oportunidades.fields.estado_campania_id')) !!}
    <select name="estadosCampanias[]" id="estadosCampanias" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Razones estados -->
<div class="form-group col-sm-6">
    {!! Form::label('razonesCampanias', __('models/oportunidades.fields.justificacion_estado_campania_id')) !!}
    <select name="razonesCampanias[]" id="razonesCampanias" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Categoría oportunidad -->
<div class="form-group col-sm-6">
    {!! Form::label('categoriasOportunidadContacto', 'Categoría Oportunidad') !!}
    <select name="categoriasOportunidadContacto[]" id="categoriasOportunidadContacto" class="form-control" multiple="multiple">
    </select> 
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campaniaActiva', 'Campaña activa') !!}
    {!! Form::select('campaniaActiva',[''=>'TODOS',1=>'SI',0=>'NO'], old('campaniaActiva'), ['class' => 'form-control']) !!}
</div>

@push('scripts')
    <script type="text/javascript">       
        $(document).ready(function() { 
            $('#tipoCampanias').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("campanias.tiposCampania.dataAjax") }}',
                    dataType: 'json',                      
                },
            });
            $('#campaniasOportunidad').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("campanias.campanias.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        tipos_seleccionados = $('#tipoCampanias').val();
                        return {
                            q: params.term, 
                            tipo: tipos_seleccionados,
                        };
                    },
                },
            }); 
            $('#estadosCampanias').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("campanias.estadosCampania.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        tipos_seleccionados = $('#tipoCampanias').val();
                        campanias_seleccionadas = $('#campaniasOportunidad').val();
                        return {
                            q: params.term, 
                            campania: campanias_seleccionadas,
                            tipo: tipos_seleccionados
                        };
                    },
                },
            });
            $('#razonesCampanias').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("campanias.justificacionesEstadoCampania.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        estados_seleccionados = $('#estadosCampanias').val();
                        if($('#estadosCampanias').val()=== ''){
                            estados_seleccionados='n';    
                        }
                        return {
                            q: params.term, 
                            estado: estados_seleccionados,
                        };
                    },
                },
            });
            $('#categoriasOportunidadContacto').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("campanias.categoriasOportunidad.dataAjax") }}',
                    dataType: 'json',                    
                },
            });
            $('#campaniaActiva').select2();   
        });   
    </script>
@endpush
