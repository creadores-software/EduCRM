<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/facultades.fields.nombre').':') !!}
    <p>{{ $facultad->nombre }}</p>
</div>

<!-- Perfiles Buyer Persona -->
<div class="form-group">
    {!! Form::label('perfilesBuyersPersona', ' Perfiles Buyer Persona:') !!}
    <select name="perfilesBuyersPersona[]" id="perfilesBuyersPersona" class="form-control"  multiple="multiple" disabled=true>
        @foreach (old('perfilesBuyersPersona[]', $facultad->perfilesBuyersPersona,null) as $perfil)
            <option value="{{ $perfil->id }}" selected="selected">{{ $perfil->nombre }}</option>
        @endforeach
    </select> 
</div>


@push('scripts')
    <script type="text/javascript">       
        $(document).ready(function() { 
            $('#perfilesBuyersPersona').select2({
                tags: true,
                multiple: true,
            });
        });   
    </script>
@endpush
