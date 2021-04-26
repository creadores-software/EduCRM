<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/tiposInteraccion.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Con Fecha Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('con_fecha_fin', __('models/tiposInteraccion.fields.con_fecha_fin').':') !!}
    {!! Form::select('con_fecha_fin',[1=>'SI', 0=>'NO'], old('con_fecha_fin'), ['class' => 'form-control']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
         $(document).ready(function() { 
            $('#con_fecha_fin').select2(); 
        }); 
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.tiposInteraccion.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
