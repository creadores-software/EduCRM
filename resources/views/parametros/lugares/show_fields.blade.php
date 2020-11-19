<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/lugares.fields.nombre').':') !!}
    <p>{{ $lugar->nombre }}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', __('models/lugares.fields.tipo').':') !!}
    <p>{{ $lugar->tipo }}</p>
</div>

<!-- Padre Id Field -->
<div class="form-group">
    {!! Form::label('padre_id', __('models/lugares.fields.padre_id').':') !!}
    <p>{{ $lugar->padre_id }}</p>
</div>

