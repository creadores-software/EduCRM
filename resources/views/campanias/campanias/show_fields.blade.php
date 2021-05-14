<!-- Tipo Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_campania_id', __('models/campanias.fields.tipo_campania_id').':') !!}
    <p>{{ $campania->tipoCampania->nombre }}</p>
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/campanias.fields.nombre').':') !!}
    <p>{{ $campania->nombre }}</p>
</div>

<!-- Periodo Academico Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_academico_id', __('models/campanias.fields.periodo_academico_id').':') !!}
    <p>{{ $campania->periodoAcademico->nombre }}</p>
</div>

<!-- Equipo Mercadeo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipo_mercadeo_id', __('models/campanias.fields.equipo_mercadeo_id').':') !!}
    <p>{{ $campania->equipoMercadeo->nombre }}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', __('models/campanias.fields.fecha_inicio').':') !!}
    <p>{{ $campania->fecha_inicio? Date('Y-m-d',strtotime($campania->fecha_inicio)):'' }}</p>
</div>

<!-- Fecha Final Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_final', __('models/campanias.fields.fecha_final').':') !!}
    <p>{{ $campania->fecha_final? Date('Y-m-d',strtotime($campania->fecha_final)):'' }}</p>
</div>

<!-- Activa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activa', __('models/campanias.fields.activa').':') !!}
    <p>{{ $campania->activa? 'Si' : 'No' }}</p>
</div>

<!-- Segmento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('segmento_id', __('models/campanias.fields.segmento_id').':') !!}
    <p>{{ $campania->segmento->nombre }}</p>
</div>  

<!-- Inversion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inversion', __('models/campanias.fields.inversion').':') !!}
    <p>${{ number_format($campania->inversion,0,",",'.') }}</p>
</div>


<!-- Facultad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facultad_id', __('models/campanias.fields.facultad_id').':') !!}
    <p>{{ $campania->facultad->nombre }}</p>
</div>

<!-- Nivel Academico Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_academico_id', __('models/campanias.fields.nivel_academico_id').':') !!}
    <p>{{ $campania->nivelAcademico->nombre }}</p>
</div>

<!-- Nivel Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_formacion_id', __('models/campanias.fields.nivel_formacion_id').':') !!}
    <p>{{ $campania->nivelFormacion->nombre }}</p>
</div>

<!-- Tipos de Contacto -->
<div class="form-group col-sm-6">
    {!! Form::label('campaniaFormaciones', ' Formaciones:') !!}
    <select name="campaniaFormacionesAsociadas[]" id="campaniaFormacionesAsociadas" class="form-control"  multiple="multiple" disabled="true">
        @if(!empty($campania))
            @foreach (old('campaniaFormacionesAsociadas[]', $campania->campaniaFormacionesAsociadas,null) as $formacion)
                <option value="{{ $formacion->id }}" selected="selected">{{ $formacion->getNombreModalidadJornada() }}</option>
            @endforeach
        @endif
    </select> 
</div>


<!-- Descripcion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('descripcion', __('models/campanias.fields.descripcion').':') !!}
    <p>{!! $campania->descripcion !!}</p>
</div>


@push('scripts')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
   <script type="text/javascript">
        $(document).ready(function() {          
            $('#campaniaFormacionesAsociadas').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
            });
        });
    </script>
@endpush


