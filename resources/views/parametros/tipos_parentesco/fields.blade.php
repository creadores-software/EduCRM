<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/tiposParentesco.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Contrario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_contrario_id', __('models/tiposParentesco.fields.tipo_contrario_id').':') !!}
    {!! Form::number('tipo_contrario_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('parametros.tiposParentesco.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
