<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/periodosAcademico.fields.nombre').':') !!}
    <p>{{ $periodoAcademico->nombre }}</p>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group">
    {!! Form::label('fecha_inicio', __('models/periodosAcademico.fields.fecha_inicio').':') !!}
    <p>{{ $periodoAcademico->fecha_inicio }}</p>
</div>

<!-- Fecha Fin Field -->
<div class="form-group">
    {!! Form::label('fecha_fin', __('models/periodosAcademico.fields.fecha_fin').':') !!}
    <p>{{ $periodoAcademico->fecha_fin }}</p>
</div>

