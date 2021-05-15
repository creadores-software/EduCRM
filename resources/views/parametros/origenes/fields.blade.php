<!-- Nombre Field -->
<div class="form-group col-sm-6 required">
    {!! Form::hidden('id', old('id', $origen->id ?? '')) !!}
    {!! Form::label('nombre', __('models/origenes.fields.nombre')) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('parametros.origenes.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
