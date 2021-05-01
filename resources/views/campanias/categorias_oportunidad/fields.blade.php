@push('css')
    <link rel="stylesheet" href="https://unpkg.com/huebee@2/dist/huebee.min.css">
@endpush

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/categoriasOportunidad.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id', old('id', $categoriaOportunidad->id ?? '')) !!}
</div>

<!-- Color Hexadecimal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color_hexadecimal', __('models/categoriasOportunidad.fields.color_hexadecimal').':') !!}
    {!! Form::text('color_hexadecimal', null, ['class' => 'form-control']) !!}
</div>

<!-- Capacidad Minima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacidad_minima', __('models/categoriasOportunidad.fields.capacidad_minima').':') !!}
    {!! Form::number('capacidad_minima', null, ['class' => 'form-control']) !!}
</div>

<!-- Capacidad Maxima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacidad_maxima', __('models/categoriasOportunidad.fields.capacidad_maxima').':') !!}
    {!! Form::number('capacidad_maxima', null, ['class' => 'form-control']) !!}
</div>

<!-- Interes Minimo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interes_minimo', __('models/categoriasOportunidad.fields.interes_minimo').':') !!}
    {!! Form::number('interes_minimo', null, ['class' => 'form-control']) !!}
</div>

<!-- Interes Maximo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interes_maximo', __('models/categoriasOportunidad.fields.interes_maximo').':') !!}
    {!! Form::number('interes_maximo', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('descripcion', __('models/categoriasOportunidad.fields.descripcion').':') !!}
    {!! Form::textArea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.categoriasOportunidad.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
<script src="https://unpkg.com/huebee@2/dist/huebee.pkgd.min.js"></script>
<script type="text/javascript">
    var elem = $('#color_hexadecimal')[0];
    var hueb = new Huebee( elem, {
    // options
    });
</script>  
@endpush
