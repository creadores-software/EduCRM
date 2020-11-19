<!-- Informacion Relacional Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('informacion_relacional_id', __('models/preferenciasFormaciones.fields.informacion_relacional_id').':') !!}
    {!! Form::number('informacion_relacional_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formacion_id', __('models/preferenciasFormaciones.fields.formacion_id').':') !!}
    {!! Form::number('formacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.preferenciasFormaciones.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
