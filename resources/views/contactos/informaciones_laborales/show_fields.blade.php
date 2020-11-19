<!-- Contacto Id Field -->
<div class="form-group">
    {!! Form::label('contacto_id', __('models/informacionesLaborales.fields.contacto_id').':') !!}
    <p>{{ $informacionLaboral->contacto_id }}</p>
</div>

<!-- Entidad Id Field -->
<div class="form-group">
    {!! Form::label('entidad_id', __('models/informacionesLaborales.fields.entidad_id').':') !!}
    <p>{{ $informacionLaboral->entidad_id }}</p>
</div>

<!-- Ocupacion Id Field -->
<div class="form-group">
    {!! Form::label('ocupacion_id', __('models/informacionesLaborales.fields.ocupacion_id').':') !!}
    <p>{{ $informacionLaboral->ocupacion_id }}</p>
</div>

<!-- Area Field -->
<div class="form-group">
    {!! Form::label('area', __('models/informacionesLaborales.fields.area').':') !!}
    <p>{{ $informacionLaboral->area }}</p>
</div>

<!-- Funciones Field -->
<div class="form-group">
    {!! Form::label('funciones', __('models/informacionesLaborales.fields.funciones').':') !!}
    <p>{{ $informacionLaboral->funciones }}</p>
</div>

<!-- Telefono Field -->
<div class="form-group">
    {!! Form::label('telefono', __('models/informacionesLaborales.fields.telefono').':') !!}
    <p>{{ $informacionLaboral->telefono }}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group">
    {!! Form::label('fecha_inicio', __('models/informacionesLaborales.fields.fecha_inicio').':') !!}
    <p>{{ $informacionLaboral->fecha_inicio }}</p>
</div>

<!-- Fecha Fin Field -->
<div class="form-group">
    {!! Form::label('fecha_fin', __('models/informacionesLaborales.fields.fecha_fin').':') !!}
    <p>{{ $informacionLaboral->fecha_fin }}</p>
</div>

