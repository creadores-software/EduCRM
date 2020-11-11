<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/tiposDocumento.fields.nombre').':') !!}
    <p>{{ $tipoDocumento->nombre }}</p>
</div>

<!-- Abreviacion Field -->
<div class="form-group">
    {!! Form::label('abreviacion', __('models/tiposDocumento.fields.abreviacion').':') !!}
    <p>{{ $tipoDocumento->abreviacion }}</p>
</div>

