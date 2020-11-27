<!-- Categoria Campo Educacion Id Field -->
<div class="form-group">
    {!! Form::label('categoria_campo_educacion_id', __('models/camposEducacion.fields.categoria_campo_educacion_id').':') !!}
    <p>{{ $campoEducacion->categoriaCampoEducacion->nombre }}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/camposEducacion.fields.nombre').':') !!}
    <p>{{ $campoEducacion->nombre }}</p>
</div>

