<!-- Estado Campania Id Field -->
<div class="form-group">
    {!! Form::label('estado_campania_id', __('models/justificacionesEstadoCampania.fields.estado_campania_id').':') !!}
    <p>{{ $justificacionEstadoCampania->estado_campania_id }}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/justificacionesEstadoCampania.fields.nombre').':') !!}
    <p>{{ $justificacionEstadoCampania->nombre }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/justificacionesEstadoCampania.fields.descripcion').':') !!}
    <p>{{ $justificacionEstadoCampania->descripcion }}</p>
</div>

