<!-- Categoria Actividad Economica Id Field -->
<div class="form-group">
    {!! Form::label('categoria_actividad_economica_id', __('models/actividadesEconómicas.fields.categoria_actividad_economica_id').':') !!}
    <p>{{ $actividadEconomica->categoria_actividad_economica_id }}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/actividadesEconómicas.fields.nombre').':') !!}
    <p>{{ $actividadEconomica->nombre }}</p>
</div>

<!-- Es Ies Field -->
<div class="form-group">
    {!! Form::label('es_ies', __('models/actividadesEconómicas.fields.es_ies').':') !!}
    <p>{{ $actividadEconomica->es_ies }}</p>
</div>

<!-- Es Colegio Field -->
<div class="form-group">
    {!! Form::label('es_colegio', __('models/actividadesEconómicas.fields.es_colegio').':') !!}
    <p>{{ $actividadEconomica->es_colegio }}</p>
</div>

