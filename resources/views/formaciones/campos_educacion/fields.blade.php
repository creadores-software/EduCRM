<!-- Categoria Campo Educacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_campo_educacion_id', __('models/camposEducacion.fields.categoria_campo_educacion_id').':') !!}
    {!! Form::number('categoria_campo_educacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/camposEducacion.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('formaciones.camposEducacion.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
