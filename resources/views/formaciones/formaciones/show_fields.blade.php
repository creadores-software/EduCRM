<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/formaciones.fields.nombre').':') !!}
    <p>{{ $formacion->nombre }}</p>
</div>

<!-- Entidad Id Field -->
<div class="form-group">
    {!! Form::label('entidad_id', __('models/formaciones.fields.entidad_id').':') !!}
    <p>{{ $formacion->entidad_id }}</p>
</div>

<!-- Nivel Formacion Id Field -->
<div class="form-group">
    {!! Form::label('nivel_formacion_id', __('models/formaciones.fields.nivel_formacion_id').':') !!}
    <p>{{ $formacion->nivel_formacion_id }}</p>
</div>

<!-- Area Conocimiento Id Field -->
<div class="form-group">
    {!! Form::label('area_conocimiento_id', __('models/formaciones.fields.area_conocimiento_id').':') !!}
    <p>{{ $formacion->area_conocimiento_id }}</p>
</div>

<!-- Activo Field -->
<div class="form-group">
    {!! Form::label('activo', __('models/formaciones.fields.activo').':') !!}
    <p>{{ $formacion->activo }}</p>
</div>

