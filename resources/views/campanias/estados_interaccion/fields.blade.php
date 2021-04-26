<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/estadosInteraccion.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', __('models/estadosInteraccion.fields.descripcion').':') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Por Defecto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('por_defecto', __('models/estadosInteraccion.fields.por_defecto').':') !!}
    {!! Form::select('por_defecto',[1=>'SI', 0=>'NO'], old('por_defecto'), ['class' => 'form-control']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
         $(document).ready(function() { 
            $('#por_defecto').select2(); 
        }); 
    </script>
@endpush

<!-- Tipo Estado Color Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_estado_color_id', __('models/estadosInteraccion.fields.tipo_estado_color_id').':') !!}
    {!! Form::number('tipo_estado_color_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.estadosInteraccion.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
