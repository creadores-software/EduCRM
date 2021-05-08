<!-- Entidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entidad_id', __('models/informacionesUniversitarias.fields.entidad_id').':') !!}
    <p>{{ $informacionUniversitaria->entidad->nombre }}</p>
</div>

<!-- Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formacion_id', __('models/informacionesUniversitarias.fields.formacion_id').':') !!}
    <p>{{ $informacionUniversitaria->formacion->getNombreModalidadJornada() }}</p>
</div>

<!-- Tipo Acceso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_acceso_id', __('models/informacionesUniversitarias.fields.tipo_acceso_id').':') !!}
    <p>{{ $informacionUniversitaria->tipoAcceso->nombre }}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', __('models/informacionesUniversitarias.fields.fecha_inicio').':') !!}
    <p>{{ $informacionUniversitaria->fecha_inicio? Date('Y-m-d',strtotime($informacionUniversitaria->fecha_inicio)):'' }}</p>
</div>

<!-- Fecha Grado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_grado', __('models/informacionesUniversitarias.fields.fecha_grado').':') !!}
    <p>{{ $informacionUniversitaria->fecha_grado? Date('Y-m-d',strtotime($informacionUniversitaria->fecha_grado)):'' }}</p>
</div>

<!-- Periodo Inicial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_academico_inicial', __('models/informacionesUniversitarias.fields.periodo_academico_inicial').':') !!}
    <p>{{ $informacionUniversitaria->periodoAcademicoInicial->nombre }}</p>
</div>

<!-- Periodo Final Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_academico_final', __('models/informacionesUniversitarias.fields.periodo_academico_final').':') !!}
    <p>{{ $informacionUniversitaria->periodoAcademicoFinal->nombre }}</p>
</div>

<!-- Finalizado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finalizado', __('models/informacionesUniversitarias.fields.finalizado').':') !!}
    <p>{{ $informacionUniversitaria->finalizado?'Si':'No' }}</p>
</div>

<!-- Promedio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('promedio', __('models/informacionesUniversitarias.fields.promedio').':') !!}
    <p>{{ $informacionUniversitaria->promedio }}</p>
</div>

<!-- Periodo Alcanzado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_alcanzado', __('models/informacionesUniversitarias.fields.periodo_alcanzado').':') !!}
    <p>{{ $informacionUniversitaria->periodo_alcanzado }}</p>
</div>

