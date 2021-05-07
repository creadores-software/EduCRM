<!-- Equipo Mercadeo Id Field -->
<div class="form-group">
    {!! Form::label('equipo_mercadeo_id', __('models/pertenenciasEquipoMercadeo.fields.equipo_mercadeo_id').':') !!}
    <p>{{ $pertenenciaEquipoMercadeo->equipoMercadeo->nombre }}</p>
</div>

<!-- Users Id Field -->
<div class="form-group">
    {!! Form::label('users_id', __('models/pertenenciasEquipoMercadeo.fields.users_id').':') !!}
    <p>{{ $pertenenciaEquipoMercadeo->user->name }}</p>
</div>

<!-- Es Lider Field -->
<div class="form-group">
    {!! Form::label('es_lider', __('models/pertenenciasEquipoMercadeo.fields.es_lider').':') !!}
    <p>{{ $pertenenciaEquipoMercadeo->es_lider?"Sí":"No" }}</p>
</div>

