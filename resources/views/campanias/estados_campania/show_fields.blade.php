<!-- Tipo Estado Color Id Field -->
<div class="form-group">
    {!! Form::label('tipo_estado_color_id', __('models/estadosInteraccion.fields.tipo_estado_color_id').':') !!}
    <p>{!! "{$estadoCampania->tipoEstadoColor->nombre} <span style='color:{$estadoCampania->tipoEstadoColor->color_hexadecimal}'><i class='fa fa-circle'></i><span>" !!}</p>
</div>


<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/estadosCampania.fields.nombre').':') !!}
    <p>{{ $estadoCampania->nombre }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/estadosCampania.fields.descripcion').':') !!}
    <p>{{ $estadoCampania->descripcion }}</p>
</div>

