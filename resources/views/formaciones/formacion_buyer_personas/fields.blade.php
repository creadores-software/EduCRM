<!-- Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formacion_id', __('models/formacionBuyerPersonas.fields.formacion_id').':') !!}
    {!! Form::number('formacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Buyer Persona Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('buyer_persona_id', __('models/formacionBuyerPersonas.fields.buyer_persona_id').':') !!}
    {!! Form::number('buyer_persona_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('formaciones.formacionBuyerPersonas.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
