<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/ocupaciones.fields.nombre').':') !!}
    <p>{{ $ocupacion->nombre }}</p>
</div>

<!-- Tipo Ocupacion Id Field -->
<div class="form-group">
    {!! Form::label('tipo_ocupacion_id', __('models/ocupaciones.fields.tipo_ocupacion_id').':') !!}
    <p>{{ $ocupacion->tipo_ocupacion_id }}</p>
</div>

