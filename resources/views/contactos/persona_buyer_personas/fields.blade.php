<!-- Buyer Persona Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('buyer_persona_id', __('models/personaBuyerPersonas.fields.buyer_persona_id').':') !!}
    {!! Form::number('buyer_persona_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Informacion Relacional Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('informacion_relacional_id', __('models/personaBuyerPersonas.fields.informacion_relacional_id').':') !!}
    {!! Form::number('informacion_relacional_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.personaBuyerPersonas.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
