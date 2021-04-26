<!-- Tipo Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_campania_id', __('models/campanias.fields.tipo_campania_id').':') !!}
    {!! Form::number('tipo_campania_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/campanias.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Periodo Academico Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_academico_id', __('models/campanias.fields.periodo_academico_id').':') !!}
    {!! Form::number('periodo_academico_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Equipo Mercadeo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipo_mercadeo_id', __('models/campanias.fields.equipo_mercadeo_id').':') !!}
    {!! Form::number('equipo_mercadeo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', __('models/campanias.fields.fecha_inicio').':') !!}
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

<!-- Fecha Final Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_final', __('models/campanias.fields.fecha_final').':') !!}
    {!! Form::date('fecha_final', null, ['class' => 'form-control','id'=>'fecha_final']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_final').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', __('models/campanias.fields.descripcion').':') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Inversion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inversion', __('models/campanias.fields.inversion').':') !!}
    {!! Form::number('inversion', null, ['class' => 'form-control']) !!}
</div>

<!-- Nivel Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_formacion_id', __('models/campanias.fields.nivel_formacion_id').':') !!}
    {!! Form::number('nivel_formacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nivel Academico Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_academico_id', __('models/campanias.fields.nivel_academico_id').':') !!}
    {!! Form::number('nivel_academico_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Facultad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facultad_id', __('models/campanias.fields.facultad_id').':') !!}
    {!! Form::number('facultad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Segmento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('segmento_id', __('models/campanias.fields.segmento_id').':') !!}
    {!! Form::number('segmento_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Activa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activa', __('models/campanias.fields.activa').':') !!}
    {!! Form::select('activa',[1=>'SI', 0=>'NO'], old('activa'), ['class' => 'form-control']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
         $(document).ready(function() { 
            $('#activa').select2(); 
        }); 
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.campanias.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
