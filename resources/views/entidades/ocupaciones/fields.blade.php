<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/ocupaciones.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Ocupacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_ocupacion_id', __('models/ocupaciones.fields.tipo_ocupacion_id').':') !!}
    {!! Form::number('tipo_ocupacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('entidades.ocupaciones.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
