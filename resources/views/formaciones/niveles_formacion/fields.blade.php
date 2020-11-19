<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/nivelesFormacion.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Nivel Academico Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_academico_id', __('models/nivelesFormacion.fields.nivel_academico_id').':') !!}
    {!! Form::number('nivel_academico_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('formaciones.nivelesFormacion.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
