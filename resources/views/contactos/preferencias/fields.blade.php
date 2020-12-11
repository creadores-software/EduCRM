<!-- Preferencias Formaciones -->
<div class="form-group col-sm-12">
    {!! Form::label('preferenciasFormaciones', ' Preferencias Formaciones:') !!}
    <select name="preferenciasFormaciones[]" id="preferenciasFormaciones" class="form-control">
        @foreach ((array)old('preferenciasFormaciones', $contacto->preferenciasFormaciones,null) as $preferencia)
            <option value="{{ $preferencia->formacion->id }}" selected="selected">{{ $preferencia->formacion->nombre }}</option>
        @endforeach
    </select> 
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.contactos.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>


@push('scripts')
    <script type="text/javascript">       
        $(document).ready(function() { 
            $('#preferenciasFormaciones').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                ajax: {
                    url: '{{ route("formaciones.formaciones.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
        });
    </script>
@endpush