<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/estadosInteraccion.fields.nombre').':') !!}
    <p>{{ $estadoInteraccion->nombre }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/estadosInteraccion.fields.descripcion').':') !!}
    <p>{{ $estadoInteraccion->descripcion }}</p>
</div>

<!-- Tipo Estado Color Id Field -->
<div class="form-group">
    {!! Form::label('tipo_estado_color_id', __('models/estadosInteraccion.fields.tipo_estado_color_id').':') !!}
    <p>{!! "<span style='color:{$estadoInteraccion->tipoEstadoColor->color_hexadecimal}'><i class='fa fa-circle'></i></span> {$estadoInteraccion->tipoEstadoColor->nombre}" !!}</p>
</div>

