<!-- Genero Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('genero_id', __('models/prefijos.fields.genero_id').':') !!}
    {!! Form::select('genero_id', $generos, old('genero_id'), ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/prefijos.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>  

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('parametros.prefijos.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>