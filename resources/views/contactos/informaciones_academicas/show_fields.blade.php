<!-- Entidad Id Field -->
<div class="form-group">
    {!! Form::label('entidad', __('models/informacionesAcademicas.fields.entidad_id').':') !!}
    <p>{{ $informacionAcademica->entidad->nombre }}</p>
</div>

<!-- Formacion Id Field -->
<div class="form-group">
    {!! Form::label('formacion_id', __('models/informacionesAcademicas.fields.formacion_id').':') !!}
    <p>{{ $informacionAcademica->formacion->nombre }}</p>
</div>

<!-- Finalizado Field -->
<div class="form-group">
    {!! Form::label('finalizado', __('models/informacionesAcademicas.fields.finalizado').':') !!}
    <p>{{ $informacionAcademica->finalizado?'Si':'No' }}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group">
    {!! Form::label('fecha_inicio', __('models/informacionesAcademicas.fields.fecha_inicio').':') !!}
    <p>{{ $informacionAcademica->fecha_inicio? Date('Y-m-d',strtotime($informacionAcademica->fecha_inicio)):'' }}</p>
</div>

<!-- Fecha Grado Field -->
<div class="form-group">
    {!! Form::label('fecha_grado', __('models/informacionesAcademicas.fields.fecha_grado').':') !!}
    <p>{{$informacionAcademica->fecha_grado?  Date('Y-m-d',strtotime($informacionAcademica->fecha_grado)):'' }}</p>
</div>

