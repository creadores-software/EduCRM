<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/entidades.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Lugar Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lugar_id', __('models/entidades.fields.lugar_id').':') !!}
    {!! Form::number('lugar_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', __('models/entidades.fields.direccion').':') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', __('models/entidades.fields.telefono').':') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Sector Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sector_id', __('models/entidades.fields.sector_id').':') !!}
    {!! Form::number('sector_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Actividad Economica Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actividad_economica_id', __('models/entidades.fields.actividad_economica_id').':') !!}
    {!! Form::number('actividad_economica_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Mi Universidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mi_universidad', __('models/entidades.fields.mi_universidad').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('mi_universidad', 0) !!}
        {!! Form::checkbox('mi_universidad', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('entidades.entidades.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
