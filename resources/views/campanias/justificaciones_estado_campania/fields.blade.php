<!-- Estado Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_campania_id', __('models/justificacionesEstadoCampania.fields.estado_campania_id').':') !!}
    {!! Form::number('estado_campania_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/justificacionesEstadoCampania.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', __('models/justificacionesEstadoCampania.fields.descripcion').':') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.justificacionesEstadoCampania.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
