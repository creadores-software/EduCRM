<!-- Contacto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto_id', __('models/informacionesAcademicas.fields.contacto_id').':') !!}
    {!! Form::number('contacto_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formacion_id', __('models/informacionesAcademicas.fields.formacion_id').':') !!}
    {!! Form::number('formacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Finalizado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finalizado', __('models/informacionesAcademicas.fields.finalizado').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('finalizado', 0) !!}
        {!! Form::checkbox('finalizado', '1', null) !!} &nbsp;
    </label>
</div>

<!-- Fecha Grado Estimada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_grado_estimada', __('models/informacionesAcademicas.fields.fecha_grado_estimada').':') !!}
    {!! Form::date('fecha_grado_estimada', null, ['class' => 'form-control','id'=>'fecha_grado_estimada']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_grado_estimada').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Fecha Grado Real Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_grado_real', __('models/informacionesAcademicas.fields.fecha_grado_real').':') !!}
    {!! Form::date('fecha_grado_real', null, ['class' => 'form-control','id'=>'fecha_grado_real']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_grado_real').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.informacionesAcademicas.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
