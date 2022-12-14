<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/formaciones.fields.nombre').':') !!}
    <p>{{ $formacion->nombre }}</p>
</div>

<!-- Entidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entidad_id', __('models/formaciones.fields.entidad_id').':') !!}
    <p>{{ $formacion->entidad->nombre }}</p>
</div>

<!-- Nivel Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_formacion_id', __('models/formaciones.fields.nivel_formacion_id').':') !!}
    <p>{{ $formacion->nivelFormacion->nombre }}</p>
</div>

<!-- Codigo Snies Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo_snies', __('models/formaciones.fields.codigo_snies').':') !!}
    <p>{{ $formacion->codigo_snies }}</p>
</div>

<!-- Titulo Otorgado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo_otorgado', __('models/formaciones.fields.titulo_otorgado').':') !!}
    <p>{{ $formacion->titulo_otorgado }}</p>
</div>

<!-- Campo Educacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campo_educacion_id', __('models/formaciones.fields.campo_educacion_id').':') !!}
    <p>{{ $formacion->campoEducacion->nombre }}</p>
</div>

<!-- Facultad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facultad_id', __('models/formaciones.fields.facultad_id').':') !!}
    <p>{{ $formacion->facultad->nombre }}</p>
</div>

<!-- Modalidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modalidad_id', __('models/formaciones.fields.modalidad_id').':') !!}
    <p>{{ $formacion->modalidad->nombre }}</p>
</div>

<!-- Modalidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jornada_id', __('models/formaciones.fields.jornada_id').':') !!}
    <p>{{ $formacion->jornada->nombre }}</p>
</div>

<!-- Periodicidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodicidad_id', __('models/formaciones.fields.periodicidad_id').':') !!}
    <p>{{ $formacion->periodicidad->nombre }}</p>
</div>

<!-- Periodos Duracion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodos_duracion', __('models/formaciones.fields.periodos_duracion').':') !!}
    <p>{{ $formacion->periodos_duracion }}</p>
</div>

<!-- Reconocimiento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reconocimiento_id', __('models/formaciones.fields.reconocimiento_id').':') !!}
    <p>{{ $formacion->reconocimiento->nombre }}</p>
</div>

<!-- Costo Matricula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('costo_matricula', __('models/formaciones.fields.costo_matricula').':') !!}
   <p>${{ number_format($formacion->costo_matricula,0,",",'.') }}</p>
</div>

<!-- Perfiles Buyer Persona -->
<div class="form-group col-sm-12">
    {!! Form::label('perfilesBuyersPersona', ' Perfiles Buyer Persona:') !!}
    <select name="perfilesBuyersPersona[]" id="perfilesBuyersPersona" class="form-control"  multiple="multiple" disabled=true>
        @foreach (old('perfilesBuyersPersona[]', $formacion->perfilesBuyersPersona,null) as $perfil)
            <option value="{{ $perfil->id }}" selected="selected">{{ $perfil->nombre }}</option>
        @endforeach
    </select> 
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', __('models/formaciones.fields.activo').':') !!}
    <p>{{ $formacion->activo?'Si':'No' }}</p>
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


