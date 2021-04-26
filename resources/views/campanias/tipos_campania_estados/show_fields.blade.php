<!-- Tipo Campania Id Field -->
<div class="form-group">
    {!! Form::label('tipo_campania_id', __('models/tiposCampaniaEstados.fields.tipo_campania_id').':') !!}
    <p>{{ $tipoCampaniaEstados->tipo_campania_id }}</p>
</div>

<!-- Estado Campania Id Field -->
<div class="form-group">
    {!! Form::label('estado_campania_id', __('models/tiposCampaniaEstados.fields.estado_campania_id').':') !!}
    <p>{{ $tipoCampaniaEstados->estado_campania_id }}</p>
</div>

<!-- Orden Field -->
<div class="form-group">
    {!! Form::label('orden', __('models/tiposCampaniaEstados.fields.orden').':') !!}
    <p>{{ $tipoCampaniaEstados->orden }}</p>
</div>

<!-- Dias Cambio Field -->
<div class="form-group">
    {!! Form::label('dias_cambio', __('models/tiposCampaniaEstados.fields.dias_cambio').':') !!}
    <p>{{ $tipoCampaniaEstados->dias_cambio }}</p>
</div>

