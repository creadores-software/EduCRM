<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', __('models/pertenenciasEquipoMercadeo.fields.users_id').':') !!}
    {!! Form::number('users_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Equipo Mercadeo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipo_mercadeo_id', __('models/pertenenciasEquipoMercadeo.fields.equipo_mercadeo_id').':') !!}
    {!! Form::number('equipo_mercadeo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Es Lider Field -->
<div class="form-group col-sm-6">
    {!! Form::label('es_lider', __('models/pertenenciasEquipoMercadeo.fields.es_lider').':') !!}
    {!! Form::select('es_lider',[1=>'SI', 0=>'NO'], old('es_lider'), ['class' => 'form-control']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
         $(document).ready(function() { 
            $('#es_lider').select2(); 
        }); 
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.pertenenciasEquipoMercadeo.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
