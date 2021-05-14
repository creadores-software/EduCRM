<!-- Fecha Inicio Field -->
<div class="form-group">
    {!! Form::label('fecha_inicio', __('models/interacciones.fields.fecha_inicio').':') !!}
    <p>{{ $interaccion->fecha_inicio }}</p>
</div>

<!-- Fecha Fin Field -->
<div class="form-group">
    {!! Form::label('fecha_fin', __('models/interacciones.fields.fecha_fin').':') !!}
    <p>{{ $interaccion->fecha_fin }}</p>
</div>

<!-- Tipo Interaccion Id Field -->
<div class="form-group">
    {!! Form::label('tipo_interaccion_id', __('models/interacciones.fields.tipo_interaccion_id').':') !!}
    <p>{{ $interaccion->tipo_interaccion_id }}</p>
</div>

<!-- Estado Interaccion Id Field -->
<div class="form-group">
    {!! Form::label('estado_interaccion_id', __('models/interacciones.fields.estado_interaccion_id').':') !!}
    <p>{{ $interaccion->estado_interaccion_id }}</p>
</div>

<!-- Observacion Field -->
<div class="form-group">
    {!! Form::label('observacion', __('models/interacciones.fields.observacion').':') !!}
    <p>{{ $interaccion->observacion }}</p>
</div>

<!-- Oportunidad Id Field -->
<div class="form-group">
    {!! Form::label('oportunidad_id', __('models/interacciones.fields.oportunidad_id').':') !!}
    <p>{{ $interaccion->oportunidad_id }}</p>
</div>

<!-- Contacto Id Field -->
<div class="form-group">
    {!! Form::label('contacto_id', __('models/interacciones.fields.contacto_id').':') !!}
    <p>{{ $interaccion->contacto_id }}</p>
</div>

<!-- Users Id Field -->
<div class="form-group">
    {!! Form::label('users_id', __('models/interacciones.fields.users_id').':') !!}
    <p>{{ $interaccion->users_id }}</p>
</div>

