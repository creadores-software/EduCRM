<!-- Contacto Origen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto_origen', __('models/parentescos.fields.contacto_origen').':') !!}
    {!! Form::number('contacto_origen', null, ['class' => 'form-control']) !!}
</div>

<!-- Contacto Destino Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto_destino', __('models/parentescos.fields.contacto_destino').':') !!}
    {!! Form::number('contacto_destino', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Parentesco Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_parentesco_id', __('models/parentescos.fields.tipo_parentesco_id').':') !!}
    {!! Form::number('tipo_parentesco_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Acudiente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('acudiente', __('models/parentescos.fields.acudiente').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('acudiente', 0) !!}
        {!! Form::checkbox('acudiente', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('parametros.parentescos.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
