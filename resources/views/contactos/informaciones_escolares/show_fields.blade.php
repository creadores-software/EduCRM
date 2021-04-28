<!-- Entidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entidad_id', __('models/informacionesEscolares.fields.entidad_id').':') !!}
    <p>{{ $informacionEscolar->entidad->nombre }}</p>
</div>

<!-- Nivel Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_formacion_id', __('models/informacionesEscolares.fields.nivel_formacion_id').':') !!}
    <p>{{ $informacionEscolar->nivelFormacion->nombre }}</p>
</div>

<!-- Finalizado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finalizado', __('models/informacionesEscolares.fields.finalizado').':') !!}
    <p>{{ $informacionEscolar->finalizado?'Si':'No' }}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', __('models/informacionesEscolares.fields.fecha_inicio').':') !!}
    <p>{{ $informacionEscolar->fecha_inicio?Date('Y-m-d',strtotime($informacionEscolar->fecha_inicio)): ''}}</p>
</div>

<!-- Fecha Grado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_grado', __('models/informacionesEscolares.fields.fecha_grado').':') !!}
    <p>{{ $informacionEscolar->fecha_grado?Date('Y-m-d',strtotime($informacionEscolar->fecha_grado)):'' }}</p>
</div>


<!-- Grado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grado', __('models/informacionesEscolares.fields.grado').':') !!}
    <p>{{ $informacionEscolar->grado }}</p>
</div>

<!-- Fecha Icfes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_icfes', __('models/informacionesEscolares.fields.fecha_icfes').':') !!}
    <p>{{ $informacionEscolar->fecha_icfes?Date('Y-m-d',strtotime($informacionEscolar->fecha_icfes)):'' }}</p>
</div>

<!-- Icfes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grado', __('models/informacionesEscolares.fields.puntaje_icfes').':') !!}
    <p>{{ $informacionEscolar->puntaje_icfes }}</p>
</div>

