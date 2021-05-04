@push('css')
    <link rel="stylesheet" href=/css/huebee.min.css">
@endpush

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/tiposEstadoColor.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id', old('id', $tipoEstadoColor->id ?? '')) !!}
</div>

<!-- Color Hexadecimal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color_hexadecimal', __('models/tiposEstadoColor.fields.color_hexadecimal').':') !!}
    {!! Form::text('color_hexadecimal', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.tiposEstadoColor.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
<script src="/js/huebee.pkgd.min.js"></script>
<script type="text/javascript">
    var elem = $('#color_hexadecimal')[0];
    var hueb = new Huebee( elem, {
    // options
    });
</script>  
@endpush