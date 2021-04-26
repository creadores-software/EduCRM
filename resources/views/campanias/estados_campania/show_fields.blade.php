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

<!-- Tipo Estado Color Id Field -->
<div class="form-group">
    {!! Form::label('tipo_estado_color_id', __('models/estadosCampania.fields.tipo_estado_color_id').':') !!}
    <p>{{ $estadoCampania->tipo_estado_color_id }}</p>
</div>

