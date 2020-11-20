<!-- Contacto Origen Field -->
<div class="form-group">
    {!! Form::label('contacto_origen', __('models/parentescos.fields.contacto_origen').':') !!}
    <p>{{ $parentesco->contacto_origen }}</p>
</div>

<!-- Contacto Destino Field -->
<div class="form-group">
    {!! Form::label('contacto_destino', __('models/parentescos.fields.contacto_destino').':') !!}
    <p>{{ $parentesco->contacto_destino }}</p>
</div>

<!-- Tipo Parentesco Id Field -->
<div class="form-group">
    {!! Form::label('tipo_parentesco_id', __('models/parentescos.fields.tipo_parentesco_id').':') !!}
    <p>{{ $parentesco->tipo_parentesco_id }}</p>
</div>

<!-- Acudiente Field -->
<div class="form-group">
    {!! Form::label('acudiente', __('models/parentescos.fields.acudiente').':') !!}
    <p>{{ $parentesco->acudiente }}</p>
</div>

