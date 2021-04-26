<!-- Accion Field -->
<div class="form-group">
    {!! Form::label('accion', __('models/matricesGestion.fields.accion').':') !!}
    <p>{{ $matrizGestion->accion }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/matricesGestion.fields.descripcion').':') !!}
    <p>{{ $matrizGestion->descripcion }}</p>
</div>

<!-- Interes Minimo Field -->
<div class="form-group">
    {!! Form::label('interes_minimo', __('models/matricesGestion.fields.interes_minimo').':') !!}
    <p>{{ $matrizGestion->interes_minimo }}</p>
</div>

<!-- Interes Maximo Field -->
<div class="form-group">
    {!! Form::label('interes_maximo', __('models/matricesGestion.fields.interes_maximo').':') !!}
    <p>{{ $matrizGestion->interes_maximo }}</p>
</div>

<!-- Probabilidad Minima Field -->
<div class="form-group">
    {!! Form::label('probabilidad_minima', __('models/matricesGestion.fields.probabilidad_minima').':') !!}
    <p>{{ $matrizGestion->probabilidad_minima }}</p>
</div>

<!-- Probabilidad Maxima Field -->
<div class="form-group">
    {!! Form::label('probabilidad_maxima', __('models/matricesGestion.fields.probabilidad_maxima').':') !!}
    <p>{{ $matrizGestion->probabilidad_maxima }}</p>
</div>

<!-- Color Hexadecimal Field -->
<div class="form-group">
    {!! Form::label('color_hexadecimal', __('models/matricesGestion.fields.color_hexadecimal').':') !!}
    <p>{{ $matrizGestion->color_hexadecimal }}</p>
</div>

