<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/tiposCampania.fields.nombre').':') !!}
    <p>{{ $tipoCampania->nombre }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/tiposCampania.fields.descripcion').':') !!}
    <p>{{ $tipoCampania->descripcion }}</p>
</div>

