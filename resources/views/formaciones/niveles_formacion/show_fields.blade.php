<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/nivelesFormacion.fields.nombre').':') !!}
    <p>{{ $nivelFormacion->nombre }}</p>
</div>

<!-- Nivel Academico Id Field -->
<div class="form-group">
    {!! Form::label('nivel_academico_id', __('models/nivelesFormacion.fields.nivel_academico_id').':') !!}
    <p>{{ $nivelFormacion->nivel_academico_id }}</p>
</div>

