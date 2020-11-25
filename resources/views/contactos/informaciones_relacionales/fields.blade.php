<!-- Contacto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto_id', __('models/informacionesRelacionales.fields.contacto_id').':') !!}
    {!! Form::number('contacto_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Origen Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origen_id', __('models/informacionesRelacionales.fields.origen_id').':') !!}
    {!! Form::number('origen_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Referido Por Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('referido_por_id', __('models/informacionesRelacionales.fields.referido_por_id').':') !!}
    {!! Form::number('referido_por_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Maximo Nivel Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('maximo_nivel_formacion_id', __('models/informacionesRelacionales.fields.maximo_nivel_formacion_id').':') !!}
    {!! Form::number('maximo_nivel_formacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ocupacion Actual Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ocupacion_actual_id', __('models/informacionesRelacionales.fields.ocupacion_actual_id').':') !!}
    {!! Form::number('ocupacion_actual_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estilo Vida Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estilo_vida_id', __('models/informacionesRelacionales.fields.estilo_vida_id').':') !!}
    {!! Form::number('estilo_vida_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Religion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('religion_id', __('models/informacionesRelacionales.fields.religion_id').':') !!}
    {!! Form::number('religion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Raza Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('raza_id', __('models/informacionesRelacionales.fields.raza_id').':') !!}
    {!! Form::number('raza_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Generacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('generacion_id', __('models/informacionesRelacionales.fields.generacion_id').':') !!}
    {!! Form::number('generacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Personalidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personalidad_id', __('models/informacionesRelacionales.fields.personalidad_id').':') !!}
    {!! Form::number('personalidad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Beneficio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('beneficio_id', __('models/informacionesRelacionales.fields.beneficio_id').':') !!}
    {!! Form::number('beneficio_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Frecuencia Uso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frecuencia_uso_id', __('models/informacionesRelacionales.fields.frecuencia_uso_id').':') !!}
    {!! Form::number('frecuencia_uso_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estatus Usuario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus_usuario_id', __('models/informacionesRelacionales.fields.estatus_usuario_id').':') !!}
    {!! Form::number('estatus_usuario_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estatus Lealtad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus_lealtad_id', __('models/informacionesRelacionales.fields.estatus_lealtad_id').':') !!}
    {!! Form::number('estatus_lealtad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Disposicion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_disposicion_id', __('models/informacionesRelacionales.fields.estado_disposicion_id').':') !!}
    {!! Form::number('estado_disposicion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Actitud Servicio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actitud_servicio_id', __('models/informacionesRelacionales.fields.actitud_servicio_id').':') !!}
    {!! Form::number('actitud_servicio_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Autoriza Comunicacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autoriza_comunicacion', __('models/informacionesRelacionales.fields.autoriza_comunicacion').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('autoriza_comunicacion', 0) !!}
        {!! Form::checkbox('autoriza_comunicacion', '1', null) !!} &nbsp;
    </label>
</div>

<!-- Actualizacion Autoriza Comunicacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actualizacion_autoriza_comunicacion', __('models/informacionesRelacionales.fields.actualizacion_autoriza_comunicacion').':') !!}
    {!! Form::date('actualizacion_autoriza_comunicacion', null, ['class' => 'form-control','id'=>'actualizacion_autoriza_comunicacion']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#actualizacion_autoriza_comunicacion').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.informacionesRelacionales.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
