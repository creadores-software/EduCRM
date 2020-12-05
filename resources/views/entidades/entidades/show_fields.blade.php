<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/entidades.fields.nombre').':') !!}
    <p>{{ $entidad->nombre }}</p>
</div>

<!-- Lugar Id Field -->
<div class="form-group">
    {!! Form::label('lugar_id', __('models/entidades.fields.lugar_id').':') !!}
    <p>{{ $entidad->lugar->nombre }}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', __('models/entidades.fields.direccion').':') !!}
    <p>{{ $entidad->direccion }}</p>
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', __('models/entidades.fields.telefono').':') !!}
    <p>{{ $entidad->telefono }}</p>
</div>

<!-- Sector Id Field -->
<div class="form-group">
    {!! Form::label('sector_id', __('models/entidades.fields.sector_id').':') !!}
    <p>{{ $entidad->sector->nombre }}</p>
</div>

<!-- Actividad Economica Id Field -->
<div class="form-group">
    {!! Form::label('actividad_economica_id', __('models/entidades.fields.actividad_economica_id').':') !!}
    <p>{{ $entidad->actividadEconomica->nombre }}</p>
</div>

<!-- Mi Universidad Field -->
<div class="form-group">
    {!! Form::label('mi_universidad', __('models/entidades.fields.mi_universidad').':') !!}
    <p>{{ $entidad->mi_universidad? 'Si': 'No' }}</p>
</div>

