<!-- Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campania_id', __('models/campaniasFormaciones.fields.campania_id').':') !!}
    {!! Form::number('campania_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formacion_id', __('models/campaniasFormaciones.fields.formacion_id').':') !!}
    {!! Form::number('formacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.campaniasFormaciones.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
