<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/nivelesAcademicos.fields.nombre').':') !!}
    <p>{{ $nivelAcademico->nombre }}</p>
</div>

<!-- Es Ies Field -->
<div class="form-group">
    {!! Form::label('es_ies', __('models/nivelesAcademicos.fields.es_ies').':') !!}
    <p>{{ $nivelAcademico->es_ies }}</p>
</div>

