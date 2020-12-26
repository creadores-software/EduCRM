<!-- Entidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entidad_id', __('models/informacionesLaborales.fields.entidad_id').':') !!}
    <p>{{ $informacionLaboral->entidad->nombre }}</p>
</div>

<!-- Ocupacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ocupacion_id', __('models/informacionesLaborales.fields.ocupacion_id').':') !!}
    <p>{{ $informacionLaboral->ocupacion->nombre }}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', __('models/informacionesLaborales.fields.fecha_inicio').':') !!}
    <p>{{ $informacionLaboral->fecha_inicio? Date('Y-m-d',strtotime($informacionLaboral->fecha_inicio)):'' }}</p>
</div>

<!-- Fecha Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_fin', __('models/informacionesLaborales.fields.fecha_fin').':') !!}
    <p>{{ $informacionLaboral->fecha_fin? Date('Y-m-d',strtotime($informacionLaboral->fecha_fin)):'' }}</p>
</div>

<!-- Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area', __('models/informacionesLaborales.fields.area').':') !!}
    <p>{{ $informacionLaboral->area }}</p>
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', __('models/informacionesLaborales.fields.telefono').':') !!}
    <p>{{ $informacionLaboral->telefono }}</p>
</div>

<!-- Funciones Field -->
<div class="form-group col-sm-12">
    {!! Form::label('funciones', __('models/informacionesLaborales.fields.funciones').':') !!}
    <p>{{ $informacionLaboral->funciones }}</p>
</div>
