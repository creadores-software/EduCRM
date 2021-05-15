@push('css')
    <link rel="stylesheet" href="/css/huebee.min.css">
@endpush

<!-- Nombre Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('nombre', __('models/categoriasOportunidad.fields.nombre')) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id', old('id', $categoriaOportunidad->id ?? '')) !!}
</div>

<!-- Color Hexadecimal Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('color_hexadecimal', __('models/categoriasOportunidad.fields.color_hexadecimal')) !!}
    {!! Form::text('color_hexadecimal', null, ['class' => 'form-control']) !!}
</div>

<!-- Capacidad Minima Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('capacidad_minima', __('models/categoriasOportunidad.fields.capacidad_minima')) !!}
    {!! Form::select('capacidad_minima',[''=>'',1=>1,2=>2,3=>3,4=>4,5=>5], old('capacidad_minima'), ['class' => 'form-control']) !!}
</div>

<!-- Capacidad Maxima Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('capacidad_maxima', __('models/categoriasOportunidad.fields.capacidad_maxima')) !!}
    {!! Form::select('capacidad_maxima',[''=>'',1=>1,2=>2,3=>3,4=>4,5=>5], old('capacidad_maxima'), ['class' => 'form-control']) !!}
</div>

<!-- Interes Minimo Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('interes_minimo', __('models/categoriasOportunidad.fields.interes_minimo')) !!}
    {!! Form::select('interes_minimo',[''=>'',1=>1,2=>2,3=>3,4=>4,5=>5], old('interes_minimo'), ['class' => 'form-control']) !!}
</div>

<!-- Interes Maximo Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('interes_maximo', __('models/categoriasOportunidad.fields.interes_maximo')) !!}
    {!! Form::select('interes_maximo',[''=>'',1=>1,2=>2,3=>3,4=>4,5=>5], old('interes_maximo'), ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('descripcion', __('models/categoriasOportunidad.fields.descripcion')) !!}
    {!! Form::textArea('descripcion', null, ['class' => 'form-control','rows'=>2,'maxlength'=>255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.categoriasOportunidad.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
<script src="/js/huebee.pkgd.min.js"></script>
<script type="text/javascript">
    var elem = $('#color_hexadecimal')[0];
    var hueb = new Huebee( elem, {
    // options
    });
    $(document).ready(function() { 
        $('#capacidad_minima').select2({
            templateSelection: formatStar,
            templateResult: formatStar
        }); 
        $('#capacidad_maxima').select2({
            templateSelection: formatStar,
            templateResult: formatStar
        });  
        $('#interes_minimo').select2({
            templateSelection: formatStar,
            templateResult: formatStar
        });  
        $('#interes_maximo').select2({
            templateSelection: formatStar,
            templateResult: formatStar
        }); 

        function formatStar(star) {
            if (!star.id) return star.text;
            cantidad=star.id;
            stars="";
            for(var i=0;i<cantidad;i++){
                stars=stars+"<i class='fa fa-star'></i>";
            }
            return $("<span>"+stars+"</span>");
        };
    }); 
</script>  
@endpush
