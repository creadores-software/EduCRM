<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/buyerPersonas.fields.nombre').':') !!}
    <p>{{ $buyerPersona->nombre }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/buyerPersonas.fields.descripcion').':') !!}
    <p>{!! $buyerPersona->descripcion !!}</p>
</div>

