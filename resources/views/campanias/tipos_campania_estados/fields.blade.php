<!-- Tipo Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_campania_id', __('models/tiposCampaniaEstados.fields.tipo_campania_id').':') !!}
    {!! Form::number('tipo_campania_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_campania_id', __('models/tiposCampaniaEstados.fields.estado_campania_id').':') !!}
    {!! Form::number('estado_campania_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Orden Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orden', __('models/tiposCampaniaEstados.fields.orden').':') !!}
    {!! Form::number('orden', null, ['class' => 'form-control']) !!}
</div>

<!-- Dias Cambio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dias_cambio', __('models/tiposCampaniaEstados.fields.dias_cambio').':') !!}
    {!! Form::number('dias_cambio', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.tiposCampaniaEstados.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
