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

<!-- Por Defecto Field -->
<div class="form-group">
    {!! Form::label('por_defecto', __('models/estadosInteraccion.fields.por_defecto').':') !!}
    <p>{{ $estadoInteraccion->por_defecto }}</p>
</div>

<!-- Tipo Estado Color Id Field -->
<div class="form-group">
    {!! Form::label('tipo_estado_color_id', __('models/estadosInteraccion.fields.tipo_estado_color_id').':') !!}
    <p>{{ $estadoInteraccion->tipo_estado_color_id }}</p>
</div>

