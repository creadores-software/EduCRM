<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/equiposMercadeo.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id', old('id', $equipoMercadeo->id ?? '')) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.equiposMercadeo.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
