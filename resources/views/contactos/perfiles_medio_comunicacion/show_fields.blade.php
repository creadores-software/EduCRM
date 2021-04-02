<!-- Medio Comunicacion Id Field -->
<div class="form-group">
    {!! Form::label('medio_comunicacion_id', __('models/perfilesMedioComunicacion.fields.medio_comunicacion_id').':') !!}
    <p>{{ $perfilMedioComunicacion->medio_comunicacion_id }}</p>
</div>

<!-- Informacion Relacional Id Field -->
<div class="form-group">
    {!! Form::label('informacion_relacional_id', __('models/perfilesMedioComunicacion.fields.informacion_relacional_id').':') !!}
    <p>{{ $perfilMedioComunicacion->informacion_relacional_id }}</p>
</div>

<!-- Perfil Field -->
<div class="form-group">
    {!! Form::label('perfil', __('models/perfilesMedioComunicacion.fields.perfil').':') !!}
    <p>{{ $perfilMedioComunicacion->perfil }}</p>
</div>

