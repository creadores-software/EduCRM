<!-- Tipo Contacto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_contacto_id', __('models/contactosTipoContacto.fields.tipo_contacto_id').':') !!}
    {!! Form::number('tipo_contacto_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Contacto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto_id', __('models/contactosTipoContacto.fields.contacto_id').':') !!}
    {!! Form::number('contacto_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.contactosTipoContacto.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
