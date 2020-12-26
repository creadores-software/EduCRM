<!-- Entidad Id Field -->
<div class="form-group">
    {!! Form::label('entidad_id', __('models/informacionesEscolares.fields.entidad_id').':') !!}
    <p>{{ $informacionEscolar->entidad->nombre }}</p>
</div>

<!-- Nivel Educativo Id Field -->
<div class="form-group">
    {!! Form::label('nivel_educativo_id', __('models/informacionesEscolares.fields.nivel_educativo_id').':') !!}
    <p>{{ $informacionEscolar->nivelEducativo->nombre }}</p>
</div>

<!-- Finalizado Field -->
<div class="form-group">
    {!! Form::label('finalizado', __('models/informacionesEscolares.fields.finalizado').':') !!}
    <p>{{ $informacionEscolar->finalizado?'Si':'No' }}</p>
</div>

<!-- Fecha Grado Estimada Field -->
<div class="form-group">
    {!! Form::label('fecha_grado_estimada', __('models/informacionesEscolares.fields.fecha_grado_estimada').':') !!}
    <p>{{ $informacionEscolar->fecha_grado_estimada?Date('Y-m-d',strtotime($informacionEscolar->fecha_grado_estimada)): ''}}</p>
</div>

<!-- Fecha Grado Real Field -->
<div class="form-group">
    {!! Form::label('fecha_grado_real', __('models/informacionesEscolares.fields.fecha_grado_real').':') !!}
    <p>{{ $informacionEscolar->fecha_grado_real?Date('Y-m-d',strtotime($informacionEscolar->fecha_grado_real)):'' }}</p>
</div>

