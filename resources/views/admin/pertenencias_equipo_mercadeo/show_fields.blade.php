<!-- Users Id Field -->
<div class="form-group">
    {!! Form::label('users_id', __('models/pertenenciasEquipoMercadeo.fields.users_id').':') !!}
    <p>{{ $pertenenciaEquipoMercadeo->users_id }}</p>
</div>

<!-- Equipo Mercadeo Id Field -->
<div class="form-group">
    {!! Form::label('equipo_mercadeo_id', __('models/pertenenciasEquipoMercadeo.fields.equipo_mercadeo_id').':') !!}
    <p>{{ $pertenenciaEquipoMercadeo->equipo_mercadeo_id }}</p>
</div>

<!-- Es Lider Field -->
<div class="form-group">
    {!! Form::label('es_lider', __('models/pertenenciasEquipoMercadeo.fields.es_lider').':') !!}
    <p>{{ $pertenenciaEquipoMercadeo->es_lider }}</p>
</div>

