<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/formaciones.fields.nombre').':') !!}
    <p>{{ $formacion->nombre }}</p>
</div>

<!-- Entidad Id Field -->
<div class="form-group">
    {!! Form::label('entidad_id', __('models/formaciones.fields.entidad_id').':') !!}
    <p>{{ $formacion->entidad->nombre }}</p>
</div>

<!-- Nivel Formacion Id Field -->
<div class="form-group">
    {!! Form::label('nivel_formacion_id', __('models/formaciones.fields.nivel_formacion_id').':') !!}
    <p>{{ $formacion->nivelFormacion->nombre }}</p>
</div>

<!-- Area Conocimiento Id Field -->
<div class="form-group">
    {!! Form::label('campo_educacion_id', __('models/formaciones.fields.campo_educacion_id').':') !!}
    <p>{{ $formacion->campoEducacion->nombre }}</p>
</div>

<!-- Activo Field -->
<div class="form-group">
    {!! Form::label('activo', __('models/formaciones.fields.activo').':') !!}
    <p>{{ $formacion->activo }}</p>
</div>

