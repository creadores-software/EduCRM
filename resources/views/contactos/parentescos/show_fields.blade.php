<!-- Contacto Destino Field -->
<div class="form-group">
    {!! Form::label('contacto_destino', __('models/parentescos.fields.contacto_destino').':') !!}
    <p>{{ $parentesco->contactoDestino->getNombreCompleto() }}</p>
</div>

<!-- Tipo Parentesco Id Field -->
<div class="form-group">
    {!! Form::label('tipo_parentesco_id', __('models/parentescos.fields.tipo_parentesco_id').':') !!}
    <p>{{ $parentesco->tipoParentesco->nombre }}</p>
</div>

<!-- Acudiente Field -->
<div class="form-group">
    {!! Form::label('acudiente', __('models/parentescos.fields.acudiente').':') !!}
    <p>{{ $parentesco->acudiente?'Si':'No' }}</p>
</div>

