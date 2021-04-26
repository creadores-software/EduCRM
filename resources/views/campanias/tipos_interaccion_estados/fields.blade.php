<!-- Tipo Interaccion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_interaccion_id', __('models/tiposInteraccionEstados.fields.tipo_interaccion_id').':') !!}
    {!! Form::number('tipo_interaccion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Interaccion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_interaccion_id', __('models/tiposInteraccionEstados.fields.estado_interaccion_id').':') !!}
    {!! Form::number('estado_interaccion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.tiposInteraccionEstados.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
