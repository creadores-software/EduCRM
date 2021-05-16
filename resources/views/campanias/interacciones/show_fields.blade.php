<!-- Tipo Interaccion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_interaccion_id', __('models/interacciones.fields.tipo_interaccion_id').':') !!}
    <p>{{ $interaccion->tipoInteraccion->nombre }}</p>
</div>

<!-- Estado Interaccion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_interaccion_id', __('models/interacciones.fields.estado_interaccion_id').':') !!}
    <p>{{ $interaccion->estadoInteraccion->nombre }}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', __('models/interacciones.fields.fecha_inicio').':') !!}
    <p>{{ $interaccion->fecha_inicio }}</p>
</div>

<!-- Fecha Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_fin', __('models/interacciones.fields.fecha_fin').':') !!}
    <p>{{ $interaccion->fecha_fin }}</p>
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observacion', __('models/interacciones.fields.observacion').':') !!}
    <p>{{ $interaccion->observacion }}</p>
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', __('models/interacciones.fields.users_id').':') !!}
    <p>{{ $interaccion->users->name }}</p>
</div>

