<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/nivelesAcademicos.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Es Ies Field -->
<div class="form-group col-sm-6">
    {!! Form::label('es_ies', __('models/nivelesAcademicos.fields.es_ies').':') !!}
    {!! Form::select('es_ies',[1=>'SI', 0=>'NO'], old('es_ies'), ['class' => 'form-control']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
         $(document).ready(function() { 
            $('#es_ies').select2(); 
        }); 
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('formaciones.nivelesAcademicos.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
