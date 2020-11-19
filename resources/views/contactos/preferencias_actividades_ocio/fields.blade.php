<!-- Informacion Relacional Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('informacion_relacional_id', __('models/preferenciasActividadesOcio.fields.informacion_relacional_id').':') !!}
    {!! Form::number('informacion_relacional_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Actividad Ocio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actividad_ocio_id', __('models/preferenciasActividadesOcio.fields.actividad_ocio_id').':') !!}
    {!! Form::number('actividad_ocio_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.preferenciasActividadesOcio.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
