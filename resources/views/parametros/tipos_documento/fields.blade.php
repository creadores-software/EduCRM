<!-- Nombre Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('nombre', __('models/tiposDocumento.fields.nombre')) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id', old('id', $tipoDocumento->id ?? '')) !!}
</div>

<!-- Abreviacion Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('abreviacion', __('models/tiposDocumento.fields.abreviacion')) !!}
    {!! Form::text('abreviacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('parametros.tiposDocumento.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
