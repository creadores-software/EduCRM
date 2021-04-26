<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', __('models/interacciones.fields.fecha_inicio').':') !!}
    {!! Form::date('fecha_inicio', null, ['class' => 'form-control','id'=>'fecha_inicio']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_inicio').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Fecha Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_fin', __('models/interacciones.fields.fecha_fin').':') !!}
    {!! Form::date('fecha_fin', null, ['class' => 'form-control','id'=>'fecha_fin']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_fin').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Tipo Interaccion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_interaccion_id', __('models/interacciones.fields.tipo_interaccion_id').':') !!}
    {!! Form::number('tipo_interaccion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Interaccion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_interaccion_id', __('models/interacciones.fields.estado_interaccion_id').':') !!}
    {!! Form::number('estado_interaccion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observacion', __('models/interacciones.fields.observacion').':') !!}
    {!! Form::text('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Oportunidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('oportunidad_id', __('models/interacciones.fields.oportunidad_id').':') !!}
    {!! Form::number('oportunidad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Contacto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto_id', __('models/interacciones.fields.contacto_id').':') !!}
    {!! Form::number('contacto_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.interacciones.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
