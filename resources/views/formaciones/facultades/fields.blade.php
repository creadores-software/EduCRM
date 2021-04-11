<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/facultades.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id', old('id', $facultad->id ?? '')) !!}
</div>

<!-- Perfiles Buyers Persona -->
<div class="form-group col-sm-12">
    {!! Form::label('perfilesBuyersPersona', ' Perfiles Buyer Persona:') !!}
    <select name="perfilesBuyersPersona[]" id="perfilesBuyersPersona" class="form-control"  multiple="multiple">
        @if(!empty($facultad))
            @foreach (old('perfilesBuyersPersona[]', $facultad->perfilesBuyersPersona??null) as $perfil)
                <option value="{{ $perfil->id }}" selected="selected">{{ $perfil->nombre }}</option>
            @endforeach
        @endif
    </select> 
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('formaciones.facultades.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">       
        $(document).ready(function() {             
            $('#perfilesBuyersPersona').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.buyerPersonas.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });   
    </script>
@endpush
