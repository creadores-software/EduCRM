<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/nivelesFormacion.fields.nombre').':') !!}
    <p>{{ $nivelFormacion->nombre }}</p>
</div>

<!-- Es Ies Field -->
<div class="form-group">
    {!! Form::label('es_ies', __('models/nivelesFormacion.fields.es_ies').':') !!}
    <p>{{ $nivelFormacion->es_ies? 'Sí': 'No' }}</p>
</div>

