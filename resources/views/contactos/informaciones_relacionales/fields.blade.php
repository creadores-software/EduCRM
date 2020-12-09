<!-- Maximo Nivel Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('maximo_nivel_formacion_id', __('models/informacionesRelacionales.fields.maximo_nivel_formacion_id').':') !!}
    <select name="maximo_nivel_formacion_id" id="maximo_nivel_formacion_id" class="form-control">
        @if(!empty(old('maximo_nivel_formacion_id', $informacionRelacional->maximo_nivel_formacion_id ?? '' )))
            <option value="{{ old('maximo_nivel_formacion_id', $informacionRelacional->maximo_nivel_formacion_id ?? '' ) }}" selected> {{ App\Models\Formaciones\NivelFormacion::find(old('maximo_nivel_formacion_id', $informacionRelacional->maximo_nivel_formacion_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Ocupacion Actual Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ocupacion_actual_id', __('models/informacionesRelacionales.fields.ocupacion_actual_id').':') !!}
    <select name="ocupacion_actual_id" id="ocupacion_actual_id" class="form-control">
        @if(!empty(old('ocupacion_actual_id', $informacionRelacional->ocupacion_actual_id ?? '' )))
            <option value="{{ old('ocupacion_actual_id', $informacionRelacional->ocupacion_actual_id ?? '' ) }}" selected> {{ App\Models\Entidades\Ocupacion::find(old('ocupacion_actual_id', $informacionRelacional->ocupacion_actual_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Estilo Vida Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estilo_vida_id', __('models/informacionesRelacionales.fields.estilo_vida_id').':') !!}
    <select name="estilo_vida_id" id="estilo_vida_id" class="form-control">
        @if(!empty(old('estilo_vida_id', $informacionRelacional->estilo_vida_id ?? '' )))
            <option value="{{ old('estilo_vida_id', $informacionRelacional->estilo_vida_id ?? '' ) }}" selected> {{ App\Models\Parametros\EstiloVida::find(old('estilo_vida_id', $informacionRelacional->estilo_vida_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Religion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('religion_id', __('models/informacionesRelacionales.fields.religion_id').':') !!}
    <select name="religion_id" id="religion_id" class="form-control">
        @if(!empty(old('religion_id', $informacionRelacional->religion_id ?? '' )))
            <option value="{{ old('religion_id', $informacionRelacional->religion_id ?? '' ) }}" selected> {{ App\Models\Parametros\Religion::find(old('religion_id', $informacionRelacional->religion_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Raza Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('raza_id', __('models/informacionesRelacionales.fields.raza_id').':') !!}
    <select name="raza_id" id="raza_id" class="form-control">
        @if(!empty(old('raza_id', $informacionRelacional->raza_id ?? '' )))
            <option value="{{ old('raza_id', $informacionRelacional->raza_id ?? '' ) }}" selected> {{ App\Models\Parametros\Raza::find(old('raza_id', $informacionRelacional->raza_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Generacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('generacion_id', __('models/informacionesRelacionales.fields.generacion_id').':') !!}
    <select name="generacion_id" id="generacion_id" class="form-control">
        @if(!empty(old('generacion_id', $informacionRelacional->generacion_id ?? '' )))
            <option value="{{ old('generacion_id', $informacionRelacional->generacion_id ?? '' ) }}" selected> {{ App\Models\Parametros\Generacion::find(old('generacion_id', $informacionRelacional->generacion_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Personalidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personalidad_id', __('models/informacionesRelacionales.fields.personalidad_id').':') !!}
    <select name="personalidad_id" id="personalidad_id" class="form-control">
        @if(!empty(old('personalidad_id', $informacionRelacional->personalidad_id ?? '' )))
            <option value="{{ old('personalidad_id', $informacionRelacional->personalidad_id ?? '' ) }}" selected> {{ App\Models\Parametros\Personalidad::find(old('personalidad_id', $informacionRelacional->personalidad_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Beneficio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('beneficio_id', __('models/informacionesRelacionales.fields.beneficio_id').':') !!}
    <select name="beneficio_id" id="beneficio_id" class="form-control">
        @if(!empty(old('beneficio_id', $informacionRelacional->beneficio_id ?? '' )))
            <option value="{{ old('beneficio_id', $informacionRelacional->beneficio_id ?? '' ) }}" selected> {{ App\Models\Parametros\Beneficio::find(old('beneficio_id', $informacionRelacional->beneficio_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Frecuencia Uso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frecuencia_uso_id', __('models/informacionesRelacionales.fields.frecuencia_uso_id').':') !!}
    <select name="frecuencia_uso_id" id="frecuencia_uso_id" class="form-control">
        @if(!empty(old('frecuencia_uso_id', $informacionRelacional->frecuencia_uso_id ?? '' )))
            <option value="{{ old('frecuencia_uso_id', $informacionRelacional->frecuencia_uso_id ?? '' ) }}" selected> {{ App\Models\Parametros\FrecuenciaUso::find(old('frecuencia_uso_id', $informacionRelacional->frecuencia_uso_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Estatus Usuario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus_usuario_id', __('models/informacionesRelacionales.fields.estatus_usuario_id').':') !!}
    <select name="estatus_usuario_id" id="estatus_usuario_id" class="form-control">
        @if(!empty(old('estatus_usuario_id', $informacionRelacional->estatus_usuario_id ?? '' )))
            <option value="{{ old('estatus_usuario_id', $informacionRelacional->estatus_usuario_id ?? '' ) }}" selected> {{ App\Models\Parametros\EstatusUsuario::find(old('estatus_usuario_id', $informacionRelacional->estatus_usuario_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Estatus Lealtad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus_lealtad_id', __('models/informacionesRelacionales.fields.estatus_lealtad_id').':') !!}
    <select name="estatus_lealtad_id" id="estatus_lealtad_id" class="form-control">
        @if(!empty(old('estatus_lealtad_id', $informacionRelacional->estatus_lealtad_id ?? '' )))
            <option value="{{ old('estatus_lealtad_id', $informacionRelacional->estatus_lealtad_id ?? '' ) }}" selected> {{ App\Models\Parametros\EstatusLealtad::find(old('estatus_lealtad_id', $informacionRelacional->estatus_lealtad_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Estado Disposicion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_disposicion_id', __('models/informacionesRelacionales.fields.estado_disposicion_id').':') !!}
    <select name="estado_disposicion_id" id="estado_disposicion_id" class="form-control">
        @if(!empty(old('estado_disposicion_id', $informacionRelacional->estado_disposicion_id ?? '' )))
            <option value="{{ old('estado_disposicion_id', $informacionRelacional->estado_disposicion_id ?? '' ) }}" selected> {{ App\Models\Parametros\EstadoDisposicion::find(old('estado_disposicion_id', $informacionRelacional->estado_disposicion_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Actitud Servicio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actitud_servicio_id', __('models/informacionesRelacionales.fields.actitud_servicio_id').':') !!}
    <select name="actitud_servicio_id" id="actitud_servicio_id" class="form-control">
        @if(!empty(old('actitud_servicio_id', $informacionRelacional->actitud_servicio_id ?? '' )))
            <option value="{{ old('actitud_servicio_id', $informacionRelacional->actitud_servicio_id ?? '' ) }}" selected> {{ App\Models\Parametros\ActitudServicio::find(old('actitud_servicio_id', $informacionRelacional->actitud_servicio_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Autoriza Comunicacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autoriza_comunicacion', __('models/informacionesRelacionales.fields.autoriza_comunicacion').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('autoriza_comunicacion', 0) !!}
        {!! Form::checkbox('autoriza_comunicacion', 1, old('autoriza_comunicacion', $informacionRelacional->autoriza_comunicacion ?? 1)) !!}  &nbsp;
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.contactos.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">       
        $(document).ready(function() { 
            $('#maximo_nivel_formacion_id').select2({
                ajax: {
                    url: '{{ route("formaciones.nivelesFormacion.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
        });
        $(document).ready(function() { 
            $('#ocupacion_actual_id').select2({
                ajax: {
                    url: '{{ route("entidades.ocupaciones.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
        });
        $(document).ready(function() { 
            $('#estilo_vida_id').select2({
                ajax: {
                    url: '{{ route("parametros.estilosVida.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
        });
        $(document).ready(function() { 
            $('#religion_id').select2({
                ajax: {
                    url: '{{ route("parametros.religiones.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
        });
        $(document).ready(function() { 
            $('#generacion_id').select2({
                ajax: {
                    url: '{{ route("parametros.generaciones.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
        });
        $(document).ready(function() { 
            $('#personalidad_id').select2({
                ajax: {
                    url: '{{ route("parametros.personalidades.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
        });
        $(document).ready(function() { 
            $('#beneficio_id').select2({
                ajax: {
                    url: '{{ route("parametros.beneficios.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
        });
        $(document).ready(function() { 
            $('#frecuencia_uso_id').select2({
                ajax: {
                    url: '{{ route("parametros.frecuenciasUso.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
        });
        $(document).ready(function() { 
            $('#estatus_usuario_id').select2({
                ajax: {
                    url: '{{ route("parametros.estatusUsuario.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
        });
        $(document).ready(function() { 
            $('#estatus_lealtad_id').select2({
                ajax: {
                    url: '{{ route("parametros.estatusLealtad.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
        });
        $(document).ready(function() { 
            $('#estado_disposicion_id').select2({
                ajax: {
                    url: '{{ route("parametros.estadosDisposicion.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
        });
        $(document).ready(function() { 
            $('#actitud_servicio_id').select2({
                ajax: {
                    url: '{{ route("parametros.actitudesServicio.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
        });
        $(document).ready(function() { 
            $('#raza_id').select2({
                ajax: {
                    url: '{{ route("parametros.razas.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
        });
    </script>
@endpush
