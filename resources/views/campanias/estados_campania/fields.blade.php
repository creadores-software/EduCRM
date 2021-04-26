<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/estadosCampania.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', __('models/estadosCampania.fields.descripcion').':') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Estado Color Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_estado_color_id', __('models/estadosCampania.fields.tipo_estado_color_id').':') !!}
    {!! Form::number('tipo_estado_color_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.estadosCampania.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
