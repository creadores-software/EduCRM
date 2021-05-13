{!! Form::hidden('id', old('id', $oportunidad->id ?? '')) !!}

@if(!empty($idCampania) || !empty($oportunidad))
{!! Form::hidden('idCampania',$idCampania) !!}
{!! Form::hidden('campania_id',$idCampania ?? $oportunidad->campania_id) !!}
@else
<!-- Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campania_id', __('models/oportunidades.fields.campania_id').':') !!}
    <select name="campania_id" id="campania_id" class="form-control">
        <option></option>
        @if(!empty(old('campania_id', $oportunidad->campania_id ?? '' )))
            <option value="{{ old('campania_id', $oportunidad->campania_id ?? '' ) }}" selected> {{ App\Models\Campanias\Campania::find(old('campania_id', $oportunidad->campania_id ?? '' ))->nombre }} </option>
        @endif
    </select>
</div>
@endif

@if(!empty($idContacto)  || !empty($oportunidad))
{!! Form::hidden('idContacto',$idContacto) !!}
{!! Form::hidden('contacto_id',$idContacto  ?? $oportunidad->contacto_id) !!}
@else
<!-- Contacto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contacto_id', __('models/oportunidades.fields.contacto_id').':') !!}
    <select name="contacto_id" id="contacto_id" class="form-control">
        <option></option>
        @if(!empty(old('contacto_id', $oportunidad->contacto_id ?? '' )))
            <option value="{{ old('contacto_id', $oportunidad->contacto_id ?? '' ) }}" selected> {{ App\Models\Contactos\Contacto::find(old('contacto_id', $oportunidad->contacto_id ?? '' ))->getNombreCompleto() }} </option>
        @endif
    </select>
</div>
@endif

<!-- Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formacion_id', __('models/oportunidades.fields.formacion_id').':') !!}
    <select name="formacion_id" id="formacion_id" class="form-control">
        <option></option>
        @if(!empty(old('formacion_id', $oportunidad->formacion_id ?? '' )))
            <option value="{{ old('formacion_id', $oportunidad->formacion_id ?? '' ) }}" selected> {{ App\Models\Formaciones\Formacion::find(old('formacion_id', $oportunidad->formacion_id ?? '' ))->nombre }} </option>
        @endif
    </select>
</div>

<!-- Estado Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_campania_id', __('models/oportunidades.fields.estado_campania_id').':') !!}
    <select name="estado_campania_id" id="estado_campania_id" class="form-control">
        <option></option>
        @if(!empty(old('estado_campania_id', $oportunidad->estado_campania_id ?? '' )))
            <option value="{{ old('estado_campania_id', $oportunidad->estado_campania_id ?? '' ) }}" selected> {{ App\Models\Campanias\EstadoCampania::find(old('estado_campania_id', $oportunidad->estado_campania_id ?? '' ))->nombre }} </option>
        @endif
    </select>
</div>

<!-- Justificacion Estado Campania Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('justificacion_estado_campania_id', __('models/oportunidades.fields.justificacion_estado_campania_id').':') !!}
    <select name="justificacion_estado_campania_id" id="justificacion_estado_campania_id" class="form-control">
        <option></option>
        @if(!empty(old('justificacion_estado_campania_id', $oportunidad->justificacion_estado_campania_id ?? '' )))
            <option value="{{ old('justificacion_estado_campania_id', $oportunidad->justificacion_estado_campania_id ?? '' ) }}" selected> {{ App\Models\Campanias\JustificacionEstadoCampania::find(old('justificacion_estado_campania_id', $oportunidad->justificacion_estado_campania_id ?? '' ))->nombre }} </option>
        @endif
    </select>
</div>

<!-- Ingreso Recibido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingreso_recibido', __('models/oportunidades.fields.ingreso_recibido').':') !!}
    <div class="input-group">
        <span class="input-group-addon" id="symbol_cost1">$</span>
        {!! Form::text('ingreso_recibido_formato', null, ['class' => 'form-control price_decimals']) !!}
        <span class="input-group-addon" id="iso_cost1">COP</span>
    </div>
    {!! Form::hidden('ingreso_recibido', old('ingreso_recibido', $oportunidad->ingreso_recibido ?? '')) !!}     
</div>

<!-- Ingreso Proyectado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingreso_proyectado', __('models/oportunidades.fields.ingreso_proyectado').':') !!}
    <div class="input-group">
        <span class="input-group-addon" id="symbol_cost1">$</span>
        {!! Form::text('ingreso_proyectado_formato', null, ['class' => 'form-control price_decimals']) !!}
        <span class="input-group-addon" id="iso_cost1">COP</span>
    </div> 
    {!! Form::hidden('ingreso_proyectado', old('ingreso_proyectado', $oportunidad->ingreso_proyectado ?? '')) !!} 
</div>

<!-- Capacidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacidad', __('models/oportunidades.fields.capacidad').':') !!}
    {!! Form::select('capacidad',[''=>'',1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10], old('interes'), ['class' => 'form-control']) !!}
</div>

<!-- Interes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interes', __('models/oportunidades.fields.interes').':') !!}
    {!! Form::select('interes',[''=>'',1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10], old('interes'), ['class' => 'form-control']) !!}
</div>

<!-- Categoria Oportunidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_oportunidad_id', __('models/oportunidades.fields.categoria_oportunidad_id').':') !!}
    {!! Form::text('categoria_oportunidad_nombre', null, ['class' => 'form-control','disabled'=>true]) !!}
    {!! Form::hidden('categoria_oportunidad_id', old('categoria_oportunidad_id', $oportunidad->categoria_oportunidad_id ?? '')) !!}
</div>


<!-- Responsable Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsable_id', __('models/oportunidades.fields.responsable_id').':') !!}
    <select name="responsable_id" id="responsable_id" class="form-control">
        <option></option>
        @if(!empty(old('responsable_id', $oportunidad->responsable_id ?? '' )))
            <option value="{{ old('responsable_id', $oportunidad->responsable_id ?? '' ) }}" selected> {{ App\Models\Admin\User::find(old('responsable_id', $oportunidad->responsable_id ?? '' ))->name }} </option>
        @endif
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    @if(!empty($idContacto))
        <a href="{{ route('campanias.oportunidades.index',['idContacto'=>$idContacto]) }}" class="btn btn-default">@lang('crud.cancel')</a>
    @else
        <a href="{{ route('campanias.oportunidades.index',['idCampania'=>$idCampania]) }}" class="btn btn-default">@lang('crud.cancel')</a>
    @endif
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
        ingreso_recibido=$("[name='ingreso_recibido']").val();
        $("[name='ingreso_recibido_formato'").val(ingreso_recibido);

        ingreso_proyectado=$("#ingreso_proyectado").val();
        $("[name='ingreso_proyectado_formato'").val(ingreso_proyectado);

        $(document).ready(function() {
            $("[name='ingreso_recibido_formato'").on('keyup', function () {
                var ingreso = $("[name='ingreso_recibido_formato'").val();
                ingreso = ingreso.replace(/\./g,'');
                ingreso = ingreso.replace(/\,/g,'.');
                $("[name='ingreso_recibido']").val(ingreso);
            });

            $("[name='ingreso_proyectado_formato'").on('keyup', function () {
                var ingreso = $("[name='ingreso_proyectado_formato'").val();
                ingreso = ingreso.replace(/\./g,'');
                ingreso = ingreso.replace(/\,/g,'.');
                $("[name='ingreso_proyectado']").val(ingreso);
            });
            
            actualizarCategoriaOportunidad()
            $('#campania_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("campanias.campanias.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#contacto_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("contactos.contactos.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        //Con esto se impide mostrar contactos ya elegidos
                       campania = $("[name='campania_id']").val();
                       return {
                            q: params.term, 
                            page: params.page || 1,
                            contactos_excluir_campania: campania
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
            $('#formacion_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.formaciones.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                       //La campaña determinará las formaciones
                       campania = $("[name='campania_id']").val();
                       return {
                            q: params.term, 
                            entidad: 'miu',
                            activa: 1,
                            page: params.page || 1,
                            campania: campania,
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
            $('#responsable_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("admin.users.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                       //La campaña determinará los equipos
                       campania = $("[name='campania_id']").val();
                       return {
                            q: params.term, 
                            page: params.page || 1,
                            campania: campania,
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
            $('#estado_campania_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("campanias.estadosCampania.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                       //La campaña determinará los estados
                       campania = $("[name='campania_id']").val();
                       return {
                            q: params.term, 
                            campania: campania,
                        };
                    },
                },
            });
            $('#justificacion_estado_campania_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("campanias.justificacionesEstadoCampania.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                       //Los estados determinarán las razones
                       estado = $('#estado_campania_id').val();
                       return {
                            q: params.term, 
                            estado: estado,
                        };
                    },
                },
            });

            $('#interes').select2();
            $('#capacidad').select2();

            $(document).on('change', '#interes, #capacidad', function(e){
                actualizarCategoriaOportunidad()    
            });

            $(document).on('change', '#estado_campania_id', function(e){
                $("#justificacion_estado_campania_id").val(null).trigger("change"); 
            }); 

            function actualizarCategoriaOportunidad(){
                var interes = $('#interes').val();
                var capacidad = $('#interes').val();
                $.ajax({
                    url:'{{ route("campanias.categoriasOportunidad.categoriaPorDatos") }}?interes=_interes_&capacidad=_capacidad_'.replace("_interes_",interes).replace("_capacidad_",capacidad),
                    dataType: 'json',               
                    success: function(data) {;
                        if(data!=null){
                            $("[name='categoria_oportunidad_id']").val(data['id']);
                            $("[name='categoria_oportunidad_nombre']").val(data['nombre']);
                        }
                        
                    }
                });
            }
        });
    </script>
@endpush
