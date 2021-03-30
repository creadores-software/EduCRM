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

<!-- Fecha Inicio Field -->
<div class="form-group">
    {!! Form::label('fecha_inicio', __('models/informacionesEscolares.fields.fecha_inicio').':') !!}
    <p>{{ $informacionEscolar->fecha_inicio?Date('Y-m-d',strtotime($informacionEscolar->fecha_inicio)): ''}}</p>
</div>

<!-- Fecha Grado Field -->
<div class="form-group">
    {!! Form::label('fecha_grado', __('models/informacionesEscolares.fields.fecha_grado').':') !!}
    <p>{{ $informacionEscolar->fecha_grado?Date('Y-m-d',strtotime($informacionEscolar->fecha_grado)):'' }}</p>
</div>

