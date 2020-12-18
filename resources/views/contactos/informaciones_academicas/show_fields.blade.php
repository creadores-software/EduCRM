<!-- Contacto Id Field -->
<div class="form-group">
    {!! Form::label('contacto_id', __('models/informacionesAcademicas.fields.contacto_id').':') !!}
    <p>{{ $informacionAcademica->contacto->nombre }}</p>
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

<!-- Fecha Grado Estimada Field -->
<div class="form-group">
    {!! Form::label('fecha_grado_estimada', __('models/informacionesAcademicas.fields.fecha_grado_estimada').':') !!}
    <p>{{ Date('Y-m-d',strtotime($informacionAcademica->fecha_grado_estimada)) }}</p>
</div>

<!-- Fecha Grado Real Field -->
<div class="form-group">
    {!! Form::label('fecha_grado_real', __('models/informacionesAcademicas.fields.fecha_grado_real').':') !!}
    <p>{{ Date('Y-m-d',strtotime($informacionAcademica->fecha_grado_real)) }}</p>
</div>

