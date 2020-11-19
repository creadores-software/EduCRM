<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/formaciones.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Entidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entidad_id', __('models/formaciones.fields.entidad_id').':') !!}
    {!! Form::number('entidad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nivel Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_formacion_id', __('models/formaciones.fields.nivel_formacion_id').':') !!}
    {!! Form::number('nivel_formacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Area Conocimiento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area_conocimiento_id', __('models/formaciones.fields.area_conocimiento_id').':') !!}
    {!! Form::number('area_conocimiento_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', __('models/formaciones.fields.activo').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('activo', 0) !!}
        {!! Form::checkbox('activo', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('formaciones.formaciones.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
