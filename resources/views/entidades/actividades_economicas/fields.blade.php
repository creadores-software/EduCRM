<!-- Categoria Actividad Economica Id Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('categoria_actividad_economica_id', __('models/actividadesEconomicas.fields.categoria_actividad_economica_id')) !!}
    <select name="categoria_actividad_economica_id" id="categoria_actividad_economica_id" class="form-control">
        <option></option>
        @if(!empty(old('categoria_actividad_economica_id', $actividadEconomica->categoria_actividad_economica_id ?? '' )))
            <option value="{{ old('categoria_actividad_economica_id', $actividadEconomica->categoria_actividad_economica_id ?? '' ) }}" selected> {{ App\Models\Entidades\CategoriaActividadEconomica::find(old('categoria_actividad_economica_id', $actividadEconomica->categoria_actividad_economica_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6 required">
    {!! Form::hidden('id', old('id', $actividadEconomica->id ?? '')) !!}
    {!! Form::label('nombre', __('models/actividadesEconomicas.fields.nombre')) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    <div class="help-block with-errors"></div>
</div>

<!-- Es Ies Field -->
<div class="form-group col-sm-6">
    {!! Form::label('es_ies', __('models/actividadesEconomicas.fields.es_ies')) !!}
    {!! Form::select('es_ies',[0=>'NO',1=>'SI'], old('es_ies'), ['class' => 'form-control']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
         $(document).ready(function() { 
            $('#es_ies').select2(); 
        }); 
    </script>
@endpush

<!-- Es Colegio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('es_colegio', __('models/actividadesEconomicas.fields.es_colegio')) !!}
    {!! Form::select('es_colegio',[0=>'NO',1=>'SI'], old('es_colegio'), ['class' => 'form-control']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
         $(document).ready(function() { 
            $('#es_colegio').select2(); 
        }); 
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('entidades.actividadesEconomicas.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#categoria_actividad_economica_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("entidades.categoriasActividadEconomica.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });
    </script>
@endpush
