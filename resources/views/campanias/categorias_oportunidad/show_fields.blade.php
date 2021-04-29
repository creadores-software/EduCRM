<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/categoriasOportunidad.fields.nombre').':') !!}
    <p>{{ $categoriaOportunidad->nombre }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/categoriasOportunidad.fields.descripcion').':') !!}
    <p>{{ $categoriaOportunidad->descripcion }}</p>
</div>

<!-- Interes Minimo Field -->
<div class="form-group">
    {!! Form::label('interes_minimo', __('models/categoriasOportunidad.fields.interes_minimo').':') !!}
    <p>{{ $categoriaOportunidad->interes_minimo }}</p>
</div>

<!-- Interes Maximo Field -->
<div class="form-group">
    {!! Form::label('interes_maximo', __('models/categoriasOportunidad.fields.interes_maximo').':') !!}
    <p>{{ $categoriaOportunidad->interes_maximo }}</p>
</div>

<!-- Probabilidad Minima Field -->
<div class="form-group">
    {!! Form::label('probabilidad_minima', __('models/categoriasOportunidad.fields.probabilidad_minima').':') !!}
    <p>{{ $categoriaOportunidad->probabilidad_minima }}</p>
</div>

<!-- Probabilidad Maxima Field -->
<div class="form-group">
    {!! Form::label('probabilidad_maxima', __('models/categoriasOportunidad.fields.probabilidad_maxima').':') !!}
    <p>{{ $categoriaOportunidad->probabilidad_maxima }}</p>
</div>

<!-- Color Hexadecimal Field -->
<div class="form-group">
    {!! Form::label('color_hexadecimal', __('models/categoriasOportunidad.fields.color_hexadecimal').':') !!}
    <p>{{ $categoriaOportunidad->color_hexadecimal }}</p>
</div>

