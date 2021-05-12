<!-- Tipo Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_campania_id', __('models/campanias.fields.tipo_campania_id').':') !!}
    <select name="tipo_campania_id" id="tipo_campania_id" class="form-control">
        <option></option>
        @if(!empty(old('tipo_campania_id', $campania->tipo_campania_id ?? '' )))
            <option value="{{ old('tipo_campania_id', $campania->tipo_campania_id ?? '' ) }}" selected> {{ App\Models\Campanias\TipoCampania::find(old('tipo_campania_id', $campania->tipo_campania_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/campanias.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Periodo Academico Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_academico_id', __('models/campanias.fields.periodo_academico_id').':') !!}
    <select name="periodo_academico_id" id="periodo_academico_id" class="form-control">
        <option></option>
        @if(!empty(old('periodo_academico_id', $campania->periodo_academico_id ?? '' )))
            <option value="{{ old('periodo_academico_id', $campania->periodo_academico_id ?? '' ) }}" selected> {{ App\Models\Formaciones\PeriodoAcademico::find(old('periodo_academico_id', $campania->periodo_academico_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Equipo Mercadeo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipo_mercadeo_id', __('models/campanias.fields.equipo_mercadeo_id').':') !!}
    <i class="fa fa-question-circle mytt" data-toggle="tooltip" title="Sus miembros podrán gestionar las oportunidades y ser asignados como responsables."></i>
    <select name="equipo_mercadeo_id" id="equipo_mercadeo_id" class="form-control">
        <option></option>
        @if(!empty(old('equipo_mercadeo_id', $campania->equipo_mercadeo_id ?? '' )))
            <option value="{{ old('equipo_mercadeo_id', $campania->equipo_mercadeo_id ?? '' ) }}" selected> {{ App\Models\Admin\EquipoMercadeo::find(old('equipo_mercadeo_id', $campania->equipo_mercadeo_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', __('models/campanias.fields.fecha_inicio').':') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_inicio" name="fecha_inicio" type="text" placeholder="AAAA-MM-DD" value="{{ old('fecha_inicio',$campania->fecha_inicio ?? '' ) }}" class="form-control pull-right">
    </div>
</div>

<!-- Fecha Final Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_final', __('models/campanias.fields.fecha_final').':') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_final" name="fecha_final" type="text" placeholder="AAAA-MM-DD" value="{{ old('fecha_final',$campania->fecha_final ?? '' ) }}" class="form-control pull-right">
    </div>
</div>

<!-- Activa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activa', __('models/campanias.fields.activa').':') !!}
    {!! Form::select('activa',[1=>'SI', 0=>'NO'], old('activa'), ['class' => 'form-control']) !!}
</div>


<!-- Segmento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('segmento_id', __('models/campanias.fields.segmento_id').':') !!}
    <i class="fa fa-question-circle mytt" data-toggle="tooltip" title="Este segmento servirá para importaciones automáticas de los contactos como oportunidades"></i>
    <div class="input-group">
        <select name="segmento_id" id="segmento_id" class="form-control">
            <option></option>
            @if(!empty(old('segmento_id', $campania->segmento_id ?? '' )))
                <option value="{{ old('segmento_id', $campania->segmento_id ?? '' ) }}" selected> {{ App\Models\Contactos\Segmento::find(old('segmento_id', $campania->segmento_id ?? '' ))->nombre }} </option>
            @endif
        </select>
        <div class="btn btn-default input-group-addon">
            <a href="#vistaPrevia">Vista previa</a>
        </div> 
    </div>      
</div>

<!-- Inversion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inversion', __('models/campanias.fields.inversion').':') !!}
    {!! Form::text('inversion', null, ['class' => 'form-control']) !!}
</div>

<!-- Facultad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facultad_id', __('models/campanias.fields.facultad_id').':') !!}
    <select name="facultad_id" id="facultad_id" class="form-control">
        <option></option>
        @if(!empty(old('facultad_id', $campania->facultad_id ?? '' )))
            <option value="{{ old('facultad_id', $campania->facultad_id ?? '' ) }}" selected> {{ App\Models\Formaciones\Facultad::find(old('facultad_id', $campania->facultad_id ?? '' ))->nombre }} </option>
        @endif
    </select>
</div>

<!-- Nivel Academico Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_academico_id', __('models/campanias.fields.nivel_academico_id').':') !!}
    <select name="nivel_academico_id" id="nivel_academico_id" class="form-control">
        <option></option>
        @if(!empty(old('nivel_academico_id', $campania->nivel_academico_id ?? '' )))
            <option value="{{ old('nivel_academico_id', $campania->nivel_academico_id ?? '' ) }}" selected> {{ App\Models\Formaciones\NivelAcademico::find(old('nivel_academico_id', $campania->nivel_academico_id ?? '' ))->nombre }} </option>
        @endif
    </select>
</div>

<!-- Nivel Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_formacion_id', __('models/campanias.fields.nivel_formacion_id').':') !!}
    <select name="nivel_formacion_id" id="nivel_formacion_id" class="form-control">
        <option></option>
        @if(!empty(old('nivel_formacion_id', $campania->nivel_formacion_id ?? '' )))
            <option value="{{ old('nivel_formacion_id', $campania->nivel_formacion_id ?? '' ) }}" selected> {{ App\Models\Formaciones\NivelFormacion::find(old('nivel_formacion_id', $campania->nivel_formacion_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>


<!-- Tipos de Contacto -->
<div class="form-group col-sm-12">
    {!! Form::label('campaniaFormacionesAsociadas', ' Formaciones:') !!}
    <select name="campaniaFormacionesAsociadas[]" id="campaniaFormacionesAsociadas" class="form-control"  multiple="multiple">
        @if(!empty($campania))
            @foreach (old('campaniaFormacionesAsociadas[]', $campania->campaniaFormacionesAsociadas,null) as $formacion)
                <option value="{{ $formacion->id }}" selected="selected">{{ $formacion->getNombreModalidadJornada() }}</option>
            @endforeach
        @endif
    </select> 
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', __('models/campanias.fields.descripcion').':') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.campanias.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
   <script type="text/javascript">
        CKEDITOR.replace( 'descripcion' );   
        $('#fecha_final').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#fecha_inicio').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $(document).ready(function() { 
            $('#activa').select2(); 
            $('.mytt').tooltip();
            $('#tipo_campania_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("campanias.tiposCampania.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#periodo_academico_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.periodosAcademicos.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#equipo_mercadeo_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("admin.equiposMercadeo.dataAjax") }}',
                    dataType: 'json',
                },
            });            
            $('#nivel_academico_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.nivelesAcademicos.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        nivelAcademico = $('#nivel_academico_id').val();
                        return {
                            q: params.term, 
                            es_ies:1,
                        };
                    },
                },
            });
            $('#nivel_formacion_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.nivelesFormacion.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        nivelAcademico = $('#nivel_academico_id').val();
                        return {
                            q: params.term, 
                            nivelAcademico: nivelAcademico,
                            es_ies:1,
                        };
                    },
                },
            });
            $('#facultad_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.facultades.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#segmento_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("contactos.segmentos.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#campaniaFormacionesAsociadas').select2({
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
                       nivelAcademico = $('#nivel_academico_id').val();
                       nivelFormacion = $('#nivel_formacion_id').val();
                       facultad = $('#facultad_id').val();
                       return {
                            q: params.term, 
                            entidad: 'miu',
                            activa: 1,
                            page: params.page || 1,
                            nivelAcademico: nivelAcademico,
                            nivelFormacion: nivelFormacion,
                            facultad: facultad
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

            $('a[href="#vistaPrevia"]').click(function(){
                idSegmento=$("#segmento_id").val();
                if(idSegmento!=null && idSegmento!=""){
                    window.open("{{ route('contactos.contactos.index') }}?vistaPrevia=1&idSegmento=_idSegmento_".replace("_idSegmento_",idSegmento), '_blank');
                }else{
                    alert('Es necesario elegir un segmento para ver la vista previa.');    
                }     
            });
        });
    </script>
@endpush
