<!-- Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campania_id', __('models/oportunidades.fields.campania_id').':') !!}
    {!! Form::number('campania_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Contacto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto_id', __('models/oportunidades.fields.contacto_id').':') !!}
    {!! Form::number('contacto_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formacion_id', __('models/oportunidades.fields.formacion_id').':') !!}
    {!! Form::number('formacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Responsable Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsable_id', __('models/oportunidades.fields.responsable_id').':') !!}
    {!! Form::number('responsable_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_campania_id', __('models/oportunidades.fields.estado_campania_id').':') !!}
    {!! Form::number('estado_campania_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Justificacion Estado Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('justificacion_estado_campania_id', __('models/oportunidades.fields.justificacion_estado_campania_id').':') !!}
    {!! Form::number('justificacion_estado_campania_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Interes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interes', __('models/oportunidades.fields.interes').':') !!}
    {!! Form::number('interes', null, ['class' => 'form-control']) !!}
</div>

<!-- Probabilidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('probabilidad', __('models/oportunidades.fields.probabilidad').':') !!}
    {!! Form::number('probabilidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Categoria Oportunidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_oportunidad_id', __('models/oportunidades.fields.categoria_oportunidad_id').':') !!}
    {!! Form::number('categoria_oportunidad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ingreso Recibido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingreso_recibido', __('models/oportunidades.fields.ingreso_recibido').':') !!}
    {!! Form::text('ingreso_recibido', null, ['class' => 'form-control']) !!}
</div>

<!-- Ingreso Proyectado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingreso_proyectado', __('models/oportunidades.fields.ingreso_proyectado').':') !!}
    {!! Form::text('ingreso_proyectado', null, ['class' => 'form-control']) !!}
</div>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.oportunidades.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() { 
            $('#tipo_campania_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("campanias.tiposCampania.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });
    </script>
@endpush
