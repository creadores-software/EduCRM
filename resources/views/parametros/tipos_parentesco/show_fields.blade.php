<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/tiposParentesco.fields.nombre').':') !!}
    <p>{{ $tipoParentesco->nombre }}</p>
</div>

<!-- Tipo Contrario Id Field -->
<div class="form-group">
    {!! Form::label('tipo_contrario_id', __('models/tiposParentesco.fields.tipo_contrario_id').':') !!}
    <p>{{ $tipoParentesco->tipoContrario->nombre }}</p>
</div>

