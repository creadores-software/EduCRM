<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('id', old('id', $categoriaActividadEconomica->id ?? '')) !!}
    {!! Form::label('nombre', __('models/categoriasActividadEconomica.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('entidades.categoriasActividadEconomica.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
