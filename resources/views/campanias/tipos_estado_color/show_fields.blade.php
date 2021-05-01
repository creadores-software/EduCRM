<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/tiposEstadoColor.fields.nombre').':') !!}
    <p>{{ $tipoEstadoColor->nombre }}</p>
</div>

<!-- Color Hexadecimal Field -->
<div class="form-group">
    {!! Form::label('color_hexadecimal', __('models/tiposEstadoColor.fields.color_hexadecimal').':') !!}
    <p>{!! "$tipoEstadoColor->color_hexadecimal <span style='color:$tipoEstadoColor->color_hexadecimal'><i class='fa fa-circle'></i><span>" !!}</p>
</div>

