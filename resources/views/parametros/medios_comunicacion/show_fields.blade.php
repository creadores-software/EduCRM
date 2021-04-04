<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/mediosComunicacion.fields.nombre').':') !!}
    <p>{{ $medioComunicacion->nombre }}</p>
</div>

<!-- Es Red Social Field -->
<div class="form-group">
    {!! Form::label('es_red_social', __('models/mediosComunicacion.fields.es_red_social').':') !!}
    <p>{{ $medioComunicacion->es_red_social?'Si':'No' }}</p>
</div>

