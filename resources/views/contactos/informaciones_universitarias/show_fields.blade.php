<!-- Entidad Id Field -->
<div class="form-group">
    {!! Form::label('entidad', __('models/informacionesUniversitarias.fields.entidad_id').':') !!}
    <p>{{ $informacionUniversitaria->entidad->nombre }}</p>
</div>

<!-- Formacion Id Field -->
<div class="form-group">
    {!! Form::label('formacion_id', __('models/informacionesUniversitarias.fields.formacion_id').':') !!}
    <p>{{ $informacionUniversitaria->formacion->nombre }}</p>
</div>

<!-- Finalizado Field -->
<div class="form-group">
    {!! Form::label('finalizado', __('models/informacionesUniversitarias.fields.finalizado').':') !!}
    <p>{{ $informacionUniversitaria->finalizado?'Si':'No' }}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group">
    {!! Form::label('fecha_inicio', __('models/informacionesUniversitarias.fields.fecha_inicio').':') !!}
    <p>{{ $informacionUniversitaria->fecha_inicio? Date('Y-m-d',strtotime($informacionUniversitaria->fecha_inicio)):'' }}</p>
</div>

<!-- Fecha Grado Field -->
<div class="form-group">
    {!! Form::label('fecha_grado', __('models/informacionesUniversitarias.fields.fecha_grado').':') !!}
    <p>{{$informacionUniversitaria->fecha_grado?  Date('Y-m-d',strtotime($informacionUniversitaria->fecha_grado)):'' }}</p>
</div>
