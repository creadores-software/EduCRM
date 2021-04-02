<!-- Facultad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facultad_id', __('models/facultadesBuyerPersona.fields.facultad_id').':') !!}
    {!! Form::number('facultad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Buyer Persona Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('buyer_persona_id', __('models/facultadesBuyerPersona.fields.buyer_persona_id').':') !!}
    {!! Form::number('buyer_persona_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('formaciones.facultadesBuyerPersona.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
