<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/nivelesAcademicos.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Es Ies Field -->
<div class="form-group col-sm-6">
    {!! Form::label('es_ies', __('models/nivelesAcademicos.fields.es_ies').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('es_ies', 0) !!}
        {!! Form::checkbox('es_ies', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('formaciones.nivelesAcademicos.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
