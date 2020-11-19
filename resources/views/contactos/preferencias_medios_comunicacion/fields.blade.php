<!-- Informacion Relacional Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('informacion_relacional_id', __('models/preferenciasMediosComunicacion.fields.informacion_relacional_id').':') !!}
    {!! Form::number('informacion_relacional_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Medio Comunicacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medio_comunicacion_id', __('models/preferenciasMediosComunicacion.fields.medio_comunicacion_id').':') !!}
    {!! Form::number('medio_comunicacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.preferenciasMediosComunicacion.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
