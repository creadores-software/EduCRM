<!-- Categoria Actividad Economica Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_actividad_economica_id', __('models/actividadesEconómicas.fields.categoria_actividad_economica_id').':') !!}
    {!! Form::number('categoria_actividad_economica_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/actividadesEconómicas.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Es Ies Field -->
<div class="form-group col-sm-6">
    {!! Form::label('es_ies', __('models/actividadesEconómicas.fields.es_ies').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('es_ies', 0) !!}
        {!! Form::checkbox('es_ies', '1', null) !!} 1
    </label>
</div>

<!-- Es Colegio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('es_colegio', __('models/actividadesEconómicas.fields.es_colegio').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('es_colegio', 0) !!}
        {!! Form::checkbox('es_colegio', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('entidades.actividadesEconómicas.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
