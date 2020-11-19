<!-- Contacto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto_id', __('models/informacionesLaborales.fields.contacto_id').':') !!}
    {!! Form::number('contacto_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Entidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entidad_id', __('models/informacionesLaborales.fields.entidad_id').':') !!}
    {!! Form::number('entidad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ocupacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ocupacion_id', __('models/informacionesLaborales.fields.ocupacion_id').':') !!}
    {!! Form::number('ocupacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area', __('models/informacionesLaborales.fields.area').':') !!}
    {!! Form::text('area', null, ['class' => 'form-control']) !!}
</div>

<!-- Funciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('funciones', __('models/informacionesLaborales.fields.funciones').':') !!}
    {!! Form::text('funciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', __('models/informacionesLaborales.fields.telefono').':') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', __('models/informacionesLaborales.fields.fecha_inicio').':') !!}
    {!! Form::date('fecha_inicio', null, ['class' => 'form-control','id'=>'fecha_inicio']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_inicio').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Fecha Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_fin', __('models/informacionesLaborales.fields.fecha_fin').':') !!}
    {!! Form::date('fecha_fin', null, ['class' => 'form-control','id'=>'fecha_fin']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_fin').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.informacionesLaborales.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
