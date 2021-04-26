<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/tiposInteraccion.fields.nombre').':') !!}
    <p>{{ $tipoInteraccion->nombre }}</p>
</div>

<!-- Con Fecha Fin Field -->
<div class="form-group">
    {!! Form::label('con_fecha_fin', __('models/tiposInteraccion.fields.con_fecha_fin').':') !!}
    <p>{{ $tipoInteraccion->con_fecha_fin }}</p>
</div>

