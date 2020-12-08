<!-- Tipo Documento Id Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('tipo_documento_id', __('models/contactos.fields.tipo_documento_id').':') !!}
    <p>{{ $contacto->tipoDocumento->nombre }}</p>
</div>

<!-- Identificacion Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('identificacion', __('models/contactos.fields.identificacion').':') !!}
    <p>{{ $contacto->identificacion }}</p>
</div>

<!-- Prefijo Id Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('prefijo_id', __('models/contactos.fields.prefijo_id').':') !!}
    <p>{{ $contacto->prefijo->nombre }}</p>
</div>

<!-- Nombres Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('nombres', __('models/contactos.fields.nombres').':') !!}
    <p>{{ $contacto->nombres }}</p>
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('apellidos', __('models/contactos.fields.apellidos').':') !!}
    <p>{{ $contacto->apellidos }}</p>
</div>

<!-- Fecha Nacimiento Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('fecha_nacimiento', __('models/contactos.fields.fecha_nacimiento').':') !!}
    <p>{{ $contacto->fecha_nacimiento }}</p>
</div>

<!-- Genero Id Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('genero_id', __('models/contactos.fields.genero_id').':') !!}
    <p>{{ $contacto->genero->nombre }}</p>
</div>

<!-- Estado Civil Id Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('estado_civil_id', __('models/contactos.fields.estado_civil_id').':') !!}
    <p>{{ $contacto->estadoCivil->nombre }}</p>
</div>

<!-- Celular Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('celular', __('models/contactos.fields.celular').':') !!}
    <p>{{ $contacto->celular }}</p>
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('telefono', __('models/contactos.fields.telefono').':') !!}
    <p>{{ $contacto->telefono }}</p>
</div>

<!-- Correo Personal Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('correo_personal', __('models/contactos.fields.correo_personal').':') !!}
    <p>{{ $contacto->correo_personal }}</p>
</div>

<!-- Correo Institucional Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('correo_institucional', __('models/contactos.fields.correo_institucional').':') !!}
    <p>{{ $contacto->correo_institucional }}</p>
</div>

<!-- Lugar Residencia Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('lugar_residencia', __('models/contactos.fields.lugar_residencia').':') !!}
    <p>{{ $contacto->lugarResidencia->nombre }}</p>
</div>

<!-- Direccion Residencia Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('direccion_residencia', __('models/contactos.fields.direccion_residencia').':') !!}
    <p>{{ $contacto->direccion_residencia }}</p>
</div>

<!-- Estrato Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('estrato', __('models/contactos.fields.estrato').':') !!}
    <p>{{ $contacto->estrato }}</p>
</div>

<!-- Origen Id Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('origen_id', __('models/contactos.fields.origen_id').':') !!}
    <p>{{ $contacto->origen->nombre }}</p>
</div>

<!-- Referido Por Field -->
<div class="form-group col-sm-6" >
    {!! Form::label('referido_por', __('models/contactos.fields.referido_por').':') !!}
    <p>{{ $contacto->referido_por? $contacto->referido->getNombreCompleto():'' }}</p>
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-12" >
    {!! Form::label('observacion', __('models/contactos.fields.observacion').':') !!}
    <p>{{ $contacto->observacion }}</p>
</div>

<!-- Activo Field -->
<div class="form-group col-sm-12" >
    {!! Form::label('activo', __('models/contactos.fields.activo').':') !!}
    <p>{{ $contacto->activo? 'Si' : 'No' }}</p>
</div>


