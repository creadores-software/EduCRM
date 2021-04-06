<!-- Maximo Nivel Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('maximo_nivel_formacion_id', __('models/informacionesRelacionales.fields.maximo_nivel_formacion_id').':') !!}
    <p>{{ $informacionRelacional->maximoNivelFormacion->nombre }}</p>
</div>

<!-- Ocupacion Actual Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ocupacion_actual_id', __('models/informacionesRelacionales.fields.ocupacion_actual_id').':') !!}
    <p>{{ $informacionRelacional->ocupacionActual->nombre }}</p>
</div>

<!-- Estilo Vida Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estilo_vida_id', __('models/informacionesRelacionales.fields.estilo_vida_id').':') !!}
    <p>{{ $informacionRelacional->estiloVida->nombre }}</p>
</div>

<!-- Religion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('religion_id', __('models/informacionesRelacionales.fields.religion_id').':') !!}
    <p>{{ $informacionRelacional->religion->nombre }}</p>
</div>

<!-- Raza Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('raza_id', __('models/informacionesRelacionales.fields.raza_id').':') !!}
    <p>{{ $informacionRelacional->raza->nombre }}</p>
</div>

<!-- Generacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('generacion_id', __('models/informacionesRelacionales.fields.generacion_id').':') !!}
    <p>{{ $informacionRelacional->generacion->nombre }}</p>
</div>

<!-- Personalidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personalidad_id', __('models/informacionesRelacionales.fields.personalidad_id').':') !!}
    <p>{{ $informacionRelacional->personalidad->nombre }}</p>
</div>

<!-- Beneficio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('beneficio_id', __('models/informacionesRelacionales.fields.beneficio_id').':') !!}
    <p>{{ $informacionRelacional->beneficio->nombre }}</p>
</div>

<!-- Frecuencia Uso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frecuencia_uso_id', __('models/informacionesRelacionales.fields.frecuencia_uso_id').':') !!}
    <p>{{ $informacionRelacional->frecuenciaUso->nombre }}</p>
</div>

<!-- Estatus Usuario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus_usuario_id', __('models/informacionesRelacionales.fields.estatus_usuario_id').':') !!}
    <p>{{ $informacionRelacional->estatusUsuario->nombre }}</p>
</div>

<!-- Estatus Lealtad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus_lealtad_id', __('models/informacionesRelacionales.fields.estatus_lealtad_id').':') !!}
    <p>{{ $informacionRelacional->estatusLealtad->nombre }}</p>
</div>

<!-- Estado Disposicion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_disposicion_id', __('models/informacionesRelacionales.fields.estado_disposicion_id').':') !!}
    <p>{{ $informacionRelacional->estadoDisposicion->nombre }}</p>
</div>

<!-- Actitud Servicio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actitud_servicio_id', __('models/informacionesRelacionales.fields.actitud_servicio_id').':') !!}
    <p>{{ $informacionRelacional->actitudServicio->nombre }}</p>
</div>

<!-- Autoriza Comunicacion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('autoriza_comunicacion', __('models/informacionesRelacionales.fields.autoriza_comunicacion').':') !!}
    <p>{{ $informacionRelacional->autoriza_comunicacion? 'Si' : 'No' }}</p>
</div>

<!-- Preferencias Medios Comunicacion -->
<div class="form-group col-sm-12">
    {!! Form::label('preferenciasMediosComunicacion', ' Preferencias Medios de Comunicación:') !!}
    <select name="preferenciasMediosComunicacion[]" id="preferenciasMediosComunicacion" class="form-control"  multiple="multiple" disabled=true>
        @foreach (old('preferenciasMediosComunicacion[]', $informacionRelacional->preferenciasMediosComunicacion,null) as $medio)
            <option value="{{ $medio->id }}" selected="selected">{{ $medio->nombre }}</option>
        @endforeach
    </select> 
</div>

<!-- Preferencias Formaciones -->
<div class="form-group col-sm-12">
    {!! Form::label('preferenciasFormaciones', ' Preferencias Formaciones:') !!}
    <select name="preferenciasFormaciones[]" id="preferenciasFormaciones" class="form-control"  multiple="multiple" disabled=true>
        @foreach (old('preferenciasFormaciones[]', $informacionRelacional->preferenciasFormaciones,null) as $formacion)
            <option value="{{ $formacion->id }}" selected="selected">{{ $formacion->nombre }}</option>
        @endforeach
    </select> 
</div>

<!-- Preferencias Campos Educación -->
<div class="form-group col-sm-12">
    {!! Form::label('preferenciasCamposEducacion', ' Preferencias Campos de Educación:') !!}
    <select name="preferenciasCamposEducacion[]" id="preferenciasCamposEducacion" class="form-control"  multiple="multiple" disabled=true>
        @foreach (old('preferenciasCamposEducacion[]', $informacionRelacional->preferenciasCamposEducacion,null) as $campo)
            <option value="{{ $campo->id }}" selected="selected">{{ $campo->nombre }}</option>
        @endforeach
    </select> 
</div>

<!-- Preferencias Actividades Ocio -->
<div class="form-group col-sm-12">
    {!! Form::label('preferenciasActividadesOcio', ' Preferencias Actividades Ocio:') !!}
    <select name="preferenciasActividadesOcio[]" id="preferenciasActividadesOcio" class="form-control"  multiple="multiple" disabled=true>
        @foreach (old('preferenciasActividadesOcio[]', $informacionRelacional->preferenciasActividadesOcio,null) as $actividad)
            <option value="{{ $actividad->id }}" selected="selected">{{ $actividad->nombre }}</option>
        @endforeach
    </select> 
</div>

<!-- Perfiles Buyer Persona -->
<div class="form-group col-sm-12">
    {!! Form::label('perfilesBuyersPersona', ' Perfiles Buyer Persona:') !!}
    <select name="perfilesBuyersPersona[]" id="perfilesBuyersPersona" class="form-control"  multiple="multiple" disabled=true>
        @foreach (old('perfilesBuyersPersona[]', $informacionRelacional->perfilesBuyersPersona,null) as $perfil)
            <option value="{{ $perfil->id }}" selected="selected">{{ $perfil->nombre }}</option>
        @endforeach
    </select> 
</div>


@push('scripts')
    <script type="text/javascript">       
        $(document).ready(function() { 
            $('#preferenciasFormaciones').select2({
                tags: true,
                multiple: true,
            });  
            $('#preferenciasMediosComunicacion').select2({
                tags: true,
                multiple: true,
            });  
            $('#preferenciasCamposEducacion').select2({
                tags: true,
                multiple: true,
            });
            $('#preferenciasActividadesOcio').select2({
                tags: true,
                multiple: true,
            });
            $('#perfilesBuyersPersona').select2({
                tags: true,
                multiple: true,
            });
        });   
    </script>
@endpush
