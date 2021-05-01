<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/categoriasOportunidad.fields.nombre').':') !!}
    <p>{{ $categoriaOportunidad->nombre }}</p>
</div>

<!-- Color Hexadecimal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color_hexadecimal', __('models/categoriasOportunidad.fields.color_hexadecimal').':') !!}
    <p>{!! "$categoriaOportunidad->color_hexadecimal <span style='color:$categoriaOportunidad->color_hexadecimal'><i class='fa fa-circle'></i><span>" !!}</p>
</div>

<!-- Capacidad Minima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacidad_minima', __('models/categoriasOportunidad.fields.capacidad_minima').':') !!}
    <p>{{ $categoriaOportunidad->capacidad_minima }}</p>
</div>

<!-- Capacidad Maxima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacidad_maxima', __('models/categoriasOportunidad.fields.capacidad_maxima').':') !!}
    <p>{{ $categoriaOportunidad->capacidad_maxima }}</p>
</div>

<!-- Interes Minimo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interes_minimo', __('models/categoriasOportunidad.fields.interes_minimo').':') !!}
    <p>{{ $categoriaOportunidad->interes_minimo }}</p>
</div>

<!-- Interes Maximo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interes_maximo', __('models/categoriasOportunidad.fields.interes_maximo').':') !!}
    <p>{{ $categoriaOportunidad->interes_maximo }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('descripcion', __('models/categoriasOportunidad.fields.descripcion').':') !!}
    <p>{{ $categoriaOportunidad->descripcion }}</p>
</div>
