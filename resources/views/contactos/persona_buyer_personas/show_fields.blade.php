<!-- Buyer Persona Id Field -->
<div class="form-group">
    {!! Form::label('buyer_persona_id', __('models/personaBuyerPersonas.fields.buyer_persona_id').':') !!}
    <p>{{ $personaBuyerPersona->buyer_persona_id }}</p>
</div>

<!-- Informacion Relacional Id Field -->
<div class="form-group">
    {!! Form::label('informacion_relacional_id', __('models/personaBuyerPersonas.fields.informacion_relacional_id').':') !!}
    <p>{{ $personaBuyerPersona->informacion_relacional_id }}</p>
</div>

