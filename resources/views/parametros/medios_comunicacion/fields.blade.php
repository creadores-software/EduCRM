<!-- Nombre Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('nombre', __('models/mediosComunicacion.fields.nombre')) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id', old('id', $medioComunicacion->id ?? '')) !!}
</div>

<!-- Es Red Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('es_red_social', __('models/mediosComunicacion.fields.es_red_social')) !!}
    {!! Form::select('es_red_social',[ 0=>'NO',1=>'SI'], old('es_red_social'), ['class' => 'form-control']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
         $(document).ready(function() { 
            $('#es_red_social').select2(); 
        }); 
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('parametros.mediosComunicacion.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
