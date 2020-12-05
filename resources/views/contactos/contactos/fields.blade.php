<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', __('models/contactos.fields.nombres').':') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidos', __('models/contactos.fields.apellidos').':') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo_personal', __('models/contactos.fields.correo_personal').':') !!}
    {!! Form::text('correo_personal', null, ['class' => 'form-control']) !!}
</div>

<!-- Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('celular', __('models/contactos.fields.celular').':') !!}
    {!! Form::text('celular', null, ['class' => 'form-control']) !!}
</div>


<!-- Origen Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origen_id', __('models/contactos.fields.origen_id').':') !!}
    {!! Form::number('origen_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Referido Por Field -->
<div class="form-group col-sm-6">
    {!! Form::label('referido_por', __('models/contactos.fields.referido_por').':') !!}
    {!! Form::number('referido_por', null, ['class' => 'form-control']) !!}
</div>


<!-- Tipo Documento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_documento_id', __('models/contactos.fields.tipo_documento_id').':') !!}
    {!! Form::number('tipo_documento_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Identificacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identificacion', __('models/contactos.fields.identificacion').':') !!}
    {!! Form::text('identificacion', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id', old('id', $contacto->id ?? '')) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', __('models/contactos.fields.telefono').':') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Institucional Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo_institucional', __('models/contactos.fields.correo_institucional').':') !!}
    {!! Form::text('correo_institucional', null, ['class' => 'form-control']) !!}
</div>

<!-- Genero Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('genero_id', __('models/contactos.fields.genero_id').':') !!}
    {!! Form::number('genero_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Prefijo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prefijo_id', __('models/contactos.fields.prefijo_id').':') !!}
    {!! Form::number('prefijo_id', null, ['class' => 'form-control']) !!}
</div>



<!-- Fecha Nacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_nacimiento', __('models/contactos.fields.fecha_nacimiento').':') !!}
    {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control','id'=>'fecha_nacimiento']) !!}
</div>


<!-- Estado Civil Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_civil_id', __('models/contactos.fields.estado_civil_id').':') !!}
    {!! Form::number('estado_civil_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Lugar Residencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lugar_residencia', __('models/contactos.fields.lugar_residencia').':') !!}
    {!! Form::number('lugar_residencia', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Residencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_residencia', __('models/contactos.fields.direccion_residencia').':') !!}
    {!! Form::text('direccion_residencia', null, ['class' => 'form-control']) !!}
</div>

<!-- Estrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estrato', __('models/contactos.fields.estrato').':') !!}
    {!! Form::number('estrato', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('observacion', __('models/contactos.fields.observacion').':') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', __('models/contactos.fields.activo').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('activo', 0) !!}
        {!! Form::checkbox('activo', '1', null) !!} &nbsp;
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.contactos.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>


@push('scripts')
    <script type="text/javascript">
        $('#fecha_nacimiento').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush
