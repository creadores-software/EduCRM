<!-- Nombre Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('nombre', __('models/formaciones.fields.nombre')) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Entidad Id Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('entidad_id', __('models/formaciones.fields.entidad_id')) !!}
    <select name="entidad_id" id="entidad_id" class="form-control">
        <option></option>
        @if(!empty(old('entidad_id', $formacion->entidad_id ?? '' )))
            <option value="{{ old('entidad_id', $formacion->entidad_id ?? '' ) }}" selected> {{ App\Models\Entidades\Entidad::find(old('entidad_id', $formacion->entidad_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Nivel Formacion Id Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('nivel_formacion_id', __('models/formaciones.fields.nivel_formacion_id')) !!}
    <select name="nivel_formacion_id" id="nivel_formacion_id" class="form-control">
        <option></option>
        @if(!empty(old('nivel_formacion_id', $formacion->nivel_formacion_id ?? '' )))
            <option value="{{ old('nivel_formacion_id', $formacion->nivel_formacion_id ?? '' ) }}" selected> {{ App\Models\Formaciones\NivelFormacion::find(old('nivel_formacion_id', $formacion->nivel_formacion_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Codigo Snies Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo_snies', __('models/formaciones.fields.codigo_snies')) !!}
    {!! Form::text('codigo_snies', null, ['class' => 'form-control']) !!}
</div>

<!-- Titulo Otorgado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo_otorgado', __('models/formaciones.fields.titulo_otorgado')) !!}
    {!! Form::text('titulo_otorgado', null, ['class' => 'form-control']) !!}
</div>

<!-- Campo Educación Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campo_educacion_id', __('models/formaciones.fields.campo_educacion_id')) !!}
    <select name="campo_educacion_id" id="campo_educacion_id" class="form-control">
        <option></option>
        @if(!empty(old('campo_educacion_id', $formacion->campo_educacion_id ?? '' )))
            <option value="{{ old('campo_educacion_id', $formacion->campo_educacion_id ?? '' ) }}" selected> {{ App\Models\Formaciones\CampoEducacion::find(old('campo_educacion_id', $formacion->campo_educacion_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Facultad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facultad_id', __('models/formaciones.fields.facultad_id')) !!}
    <select name="facultad_id" id="facultad_id" class="form-control">
        <option></option>
        @if(!empty(old('facultad_id', $formacion->facultad_id ?? '' )))
            <option value="{{ old('facultad_id', $formacion->facultad_id ?? '' ) }}" selected> {{ App\Models\Formaciones\Facultad::find(old('facultad_id', $formacion->facultad_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Modalidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modalidad_id', __('models/formaciones.fields.modalidad_id')) !!}
    <select name="modalidad_id" id="modalidad_id" class="form-control">
        <option></option>
        @if(!empty(old('modalidad_id', $formacion->modalidad_id ?? '' )))
            <option value="{{ old('modalidad_id', $formacion->modalidad_id ?? '' ) }}" selected> {{ App\Models\Formaciones\Modalidad::find(old('modalidad_id', $formacion->modalidad_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Jornada Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jornada_id', __('models/formaciones.fields.jornada_id')) !!}
    <select name="jornada_id" id="jornada_id" class="form-control">
        <option></option>
        @if(!empty(old('jornada_id', $formacion->jornada_id ?? '' )))
            <option value="{{ old('jornada_id', $formacion->jornada_id ?? '' ) }}" selected> {{ App\Models\Formaciones\Jornada::find(old('jornada_id', $formacion->jornada_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Periodicidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodicidad_id', __('models/formaciones.fields.periodicidad_id')) !!}
    <select name="periodicidad_id" id="periodicidad_id" class="form-control">
        <option></option>
        @if(!empty(old('periodicidad_id', $formacion->periodicidad_id ?? '' )))
            <option value="{{ old('periodicidad_id', $formacion->periodicidad_id ?? '' ) }}" selected> {{ App\Models\Formaciones\Periodicidad::find(old('periodicidad_id', $formacion->modalidad_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Periodos Duracion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodos_duracion', __('models/formaciones.fields.periodos_duracion')) !!}
    {!! Form::text('periodos_duracion', null, ['class' => 'form-control']) !!}
</div>

<!-- Reconocimiento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reconocimiento_id', __('models/formaciones.fields.reconocimiento_id')) !!}
    <select name="reconocimiento_id" id="reconocimiento_id" class="form-control">
        <option></option>
        @if(!empty(old('reconocimiento_id', $formacion->reconocimiento_id ?? '' )))
            <option value="{{ old('reconocimiento_id', $formacion->reconocimiento_id ?? '' ) }}" selected> {{ App\Models\Formaciones\Reconocimiento::find(old('reconocimiento_id', $formacion->reconocimiento_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Costo Matricula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('costo_matricula', __('models/formaciones.fields.costo_matricula')) !!}
    <div class="input-group">
        <span class="input-group-addon" id="symbol_cost1">$</span>
        {!! Form::text('costo_matricula_formato', null, ['class' => 'form-control price_decimals']) !!}
        <span class="input-group-addon" id="iso_cost1">COP</span>
    </div>
    {!! Form::hidden('costo_matricula', old('costo_matricula', $formacion->costo_matricula ?? '')) !!}     
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', __('models/formaciones.fields.activo')) !!}
    {!! Form::select('activo',[1=>'SI', 0=>'NO'], old('activo'), ['class' => 'form-control']) !!}
</div>

<!-- Perfiles Buyers Persona -->
<div class="form-group col-sm-12">
    {!! Form::label('perfilesBuyersPersona', ' Perfiles Buyer Persona:') !!}
    <select name="perfilesBuyersPersona[]" id="perfilesBuyersPersona" class="form-control"  multiple="multiple">
        @if(!empty($formacion))
            @foreach (old('perfilesBuyersPersona[]', $formacion->perfilesBuyersPersona??null) as $perfil)
                <option value="{{ $perfil->id }}" selected="selected">{{ $perfil->nombre }}</option>
            @endforeach
        @endif
    </select> 
</div>
@push('scripts')
    <script type="text/javascript">
         $(document).ready(function() { 
            $('#activo').select2(); 
        }); 
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('formaciones.formaciones.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script src="/js/inputmask/jquery.inputmask.js"></script>
    <script type="text/javascript">
        //Se inicializa el priceformat para los campos
        $('.price_decimals').inputmask('decimal',{
                'alias': 'numeric',
                'groupSeparator': '.',
                'autoGroup': true,
                'digits': 0,
                'radixPoint': ',',
                'digitsOptional': false,
                'allowMinus': false,
                'prefix': '',
                'placeholder': '0'
        });
        costo_matricula=$("[name='costo_matricula']").val();
        $("[name='costo_matricula_formato'").val(costo_matricula);

        $(document).ready(function() {     
            $("[name='costo_matricula_formato'").on('keyup', function () {
                var ingreso = $("[name='costo_matricula_formato'").val();
                ingreso = ingreso.replace(/\./g,'');
                ingreso = ingreso.replace(/\,/g,'.');
                $("[name='costo_matricula']").val(ingreso);
            });

            $('#entidad_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("entidades.entidades.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        return {
                            q: params.term, 
                            es_ies: 1,
                            page: params.page || 1,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.results,
                            pagination: {
                                more: data.more
                            }
                        };
                    }
                },
            });
            $('#nivel_formacion_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.nivelesFormacion.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        return {
                            q: params.term, 
                            es_ies: 1,
                        };
                    },
                },
            });
            $('#campo_educacion_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.camposEducacion.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#modalidad_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.modalidades.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#jornada_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.jornadas.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#periodicidad_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.periodicidades.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#reconocimiento_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.reconocimientos.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#facultad_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.facultades.dataAjax") }}',
                    dataType: 'json',
                },
            });
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

