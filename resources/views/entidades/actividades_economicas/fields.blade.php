<!-- Categoria Actividad Economica Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_actividad_economica_id', __('models/actividadesEconomicas.fields.categoria_actividad_economica_id').':', ['class'=>'control-label']) !!}
    <div class="input-group">       
        <select name="categoria_actividad_economica_id" id="categoria_actividad_economica_id" class="form-control">
            @if(!empty(old('categoria_actividad_economica_id', $actividadEconomica->categoria_actividad_economica_id ?? '' )))
                <option value="{{ old('categoria_actividad_economica_id', $actividadEconomica->categoria_actividad_economica_id ?? '' ) }}" selected> {{ App\Models\Entidades\categoriaActividadEconomica::find(old('categoria_actividad_economica_id', $actividadEconomica->categoria_actividad_economica_id ?? '' ))->nombre }} </option>
            @endif
        </select>        
    </div>
    <div class="help-block with-errors"></div>
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/actividadesEconomicas.fields.nombre').':',['class'=>'control-label']) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    <div class="help-block with-errors"></div>
</div>

<!-- Es Ies Field -->
<div class="form-group col-sm-6">
    {!! Form::label('es_ies', __('models/actividadesEconomicas.fields.es_ies').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('es_ies', 0) !!}
        {!! Form::checkbox('es_ies', '1', null) !!} ¿Es una actividad relacionado con IES?
    </label>
</div>

<!-- Es Colegio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('es_colegio', __('models/actividadesEconomicas.fields.es_colegio').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('es_colegio', 0) !!}
        {!! Form::checkbox('es_colegio', '1', null) !!} ¿Es una actividad relacionado con Colegios?
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('entidades.actividadesEconomicas.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $.fn.select2.defaults.set('language', 'es');
            $('#categoria_actividad_economica_id').select2({
                ajax: {
                    url: '{{ route("entidades.categoriasActividadEconomica.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });
    </script>
@endpush
