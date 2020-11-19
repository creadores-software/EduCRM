<!-- Campo Educacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campo_educacion_id', __('models/preferenciasCamposEducacion.fields.campo_educacion_id').':') !!}
    {!! Form::number('campo_educacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Informacion Relacional Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('informacion_relacional_id', __('models/preferenciasCamposEducacion.fields.informacion_relacional_id').':') !!}
    {!! Form::number('informacion_relacional_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.preferenciasCamposEducacion.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
