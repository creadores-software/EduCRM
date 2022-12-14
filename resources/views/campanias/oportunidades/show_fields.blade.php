<!-- Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campania_id', __('models/oportunidades.fields.campania_id').':') !!}
    <p>{{ $oportunidad->campania->nombre }}</p>
</div>

<!-- Contacto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto_id', __('models/oportunidades.fields.contacto_id').':') !!}
    <p>{{ $oportunidad->contacto->getNombreCompleto() }}</p>
</div>

<!-- Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formacion_id', __('models/oportunidades.fields.formacion_id').':') !!}
    <p>{{ $oportunidad->formacion->nombre }}</p>
</div>

<!-- Responsable Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsable_id', __('models/oportunidades.fields.responsable_id').':') !!}
    <p>{{ $oportunidad->responsable->name }}</p>
</div>

<!-- Estado Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_campania_id', __('models/oportunidades.fields.estado_campania_id').':') !!}
    <p>{!! "<span style='color:{$oportunidad->estadoCampania->tipoEstadoColor->color_hexadecimal}'><i class='fa fa-circle'></i></span> {$oportunidad->estadoCampania->nombre}" !!}</p>
</div>

<!-- Justificacion Estado Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('justificacion_estado_campania_id', __('models/oportunidades.fields.justificacion_estado_campania_id').':') !!}
    <p>{{ $oportunidad->justificacionEstadoCampania->nombre }}</p>
</div>

<!-- Categoria Oportunidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_oportunidad_id', __('models/oportunidades.fields.categoria_oportunidad_id').':') !!}
    <p>{!! "<span style='color:{$oportunidad->categoriaOportunidad->color_hexadecimal}'><i class='fa fa-circle'></i></span> {$oportunidad->categoriaOportunidad->nombre}" !!}</p>
</div>

<!-- Adicion Manual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adicion_manual', __('models/oportunidades.fields.adicion_manual').':') !!}
    <p>{{ $oportunidad->adicion_manual?"Si":"No" }}</p>
</div>

<!-- Capacidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacidad', __('models/oportunidades.fields.capacidad').':') !!}
    <p>{!! !empty($oportunidad->categoriaOportunidad)?$oportunidad->categoriaOportunidad->stars($oportunidad->capacidad): '' !!}</p>
</div>

<!-- Interes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interes', __('models/oportunidades.fields.interes').':') !!}
    <p>{!! !empty($oportunidad->categoriaOportunidad)?$oportunidad->categoriaOportunidad->stars($oportunidad->interes):'' !!}</p>
</div>


<!-- Ingreso Recibido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingreso_recibido', __('models/oportunidades.fields.ingreso_recibido').':') !!}
    <p>${{ number_format($oportunidad->ingreso_recibido,0,",",'.') }}</p>
</div>

<!-- Ingreso Proyectado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingreso_proyectado', __('models/oportunidades.fields.ingreso_proyectado').':') !!}
    <p>${{ number_format($oportunidad->ingreso_proyectado,0,",",'.') }}</p>
</div>

<!-- Ultima Actualizacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ultima_actualizacion', __('models/oportunidades.fields.ultima_actualizacion').':') !!}
    <p>{{ $oportunidad->ultima_actualizacion? Date('Y-m-d h:i:s A',strtotime($oportunidad->ultima_actualizacion)):'' }}</p>
</div>

<!-- Ultima Interaccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ultima_interaccion', __('models/oportunidades.fields.ultima_interaccion').':') !!}
    <p>{{ $oportunidad->ultima_interaccion? Date('Y-m-d h:i:s A',strtotime($oportunidad->ultima_interaccion)):'' }}</p>
</div>

