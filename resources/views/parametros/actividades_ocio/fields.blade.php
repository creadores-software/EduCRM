<!-- Nombre Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('nombre', __('models/actividadesOcio.fields.nombre')) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id', old('id', $actividadOcio->id ?? '')) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('parametros.actividadesOcio.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
