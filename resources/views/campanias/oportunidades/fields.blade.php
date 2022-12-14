{!! Form::hidden('id', old('id', $oportunidad->id ?? '')) !!}

@if(!empty($campania))
{!! Form::hidden('idCampania',$campania->id) !!}
{!! Form::hidden('campania_id',$campania->id) !!}
@endif

<!-- Contacto Id Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('contacto_id', __('models/oportunidades.fields.contacto_id')) !!}
    <select name="contacto_id" id="contacto_id" class="form-control" @if(!empty($oportunidad)) disabled="disabled" @endif>
        <option></option>
        @if(!empty(old('contacto_id', $oportunidad->contacto_id ?? '' )))
            <option value="{{ old('contacto_id', $oportunidad->contacto_id ?? '' ) }}" selected> {{ App\Models\Contactos\Contacto::find(old('contacto_id', $oportunidad->contacto_id ?? '' ))->getNombreCompleto() }} </option>
        @endif
    </select>
    @if(!empty($oportunidad)) 
    {!! Form::hidden('contacto_id',$oportunidad->contacto_id) !!}
    @endif
</div>

<!-- Formacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formacion_id', __('models/oportunidades.fields.formacion_id')) !!}
    <select name="formacion_id" id="formacion_id" class="form-control">
        <option></option>
        @if(!empty(old('formacion_id', $oportunidad->formacion_id ?? '' )))
            <option value="{{ old('formacion_id', $oportunidad->formacion_id ?? '' ) }}" selected> {{ App\Models\Formaciones\Formacion::find(old('formacion_id', $oportunidad->formacion_id ?? '' ))->nombre }} </option>
        @endif
    </select>
</div>

<!-- Estado Campania Id Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('estado_campania_id', __('models/oportunidades.fields.estado_campania_id')) !!}
    <select name="estado_campania_id" id="estado_campania_id" class="form-control">
        <option></option>
        @if(!empty(old('estado_campania_id', $oportunidad->estado_campania_id ?? '' )))
            <option value="{{ old('estado_campania_id', $oportunidad->estado_campania_id ?? '' ) }}" selected> {{ App\Models\Campanias\EstadoCampania::find(old('estado_campania_id', $oportunidad->estado_campania_id ?? '' ))->nombre }} </option>
        @endif
    </select>
</div>

<!-- Justificacion Estado Campania Id Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('justificacion_estado_campania_id', __('models/oportunidades.fields.justificacion_estado_campania_id')) !!}
    <select name="justificacion_estado_campania_id" id="justificacion_estado_campania_id" class="form-control">
        <option></option>
        @if(!empty(old('justificacion_estado_campania_id', $oportunidad->justificacion_estado_campania_id ?? '' )))
            <option value="{{ old('justificacion_estado_campania_id', $oportunidad->justificacion_estado_campania_id ?? '' ) }}" selected> {{ App\Models\Campanias\JustificacionEstadoCampania::find(old('justificacion_estado_campania_id', $oportunidad->justificacion_estado_campania_id ?? '' ))->nombre }} </option>
        @endif
    </select>
</div>

<!-- Ingreso Recibido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingreso_recibido', __('models/oportunidades.fields.ingreso_recibido')) !!}
    <div class="input-group">
        <span class="input-group-addon" id="symbol_cost1">$</span>
        {!! Form::text('ingreso_recibido_formato', null, ['class' => 'form-control price_decimals']) !!}
        <span class="input-group-addon" id="iso_cost1">COP</span>
    </div>
    {!! Form::hidden('ingreso_recibido', old('ingreso_recibido', $oportunidad->ingreso_recibido ?? '')) !!}     
</div>

<!-- Ingreso Proyectado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ingreso_proyectado', __('models/oportunidades.fields.ingreso_proyectado')) !!}
    <div class="input-group">
        <span class="input-group-addon" id="symbol_cost1">$</span>
        {!! Form::text('ingreso_proyectado_formato', null, ['class' => 'form-control price_decimals']) !!}
        <span class="input-group-addon" id="iso_cost1">COP</span>
    </div> 
    {!! Form::hidden('ingreso_proyectado', old('ingreso_proyectado', $oportunidad->ingreso_proyectado ?? '')) !!} 
</div>

<!-- Capacidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacidad', __('models/oportunidades.fields.capacidad')) !!}
    {!! Form::select('capacidad',[''=>'',1=>1,2=>2,3=>3,4=>4,5=>5], old('interes'), ['class' => 'form-control']) !!}
</div>

<!-- Interes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interes', __('models/oportunidades.fields.interes')) !!}
    {!! Form::select('interes',[''=>'',1=>1,2=>2,3=>3,4=>4,5=>5], old('interes'), ['class' => 'form-control']) !!}
</div>

<!-- Categoria Oportunidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_oportunidad_id', __('models/oportunidades.fields.categoria_oportunidad_id')) !!}
    <span id="categoria_icono"></span>
    {!! Form::text('categoria_oportunidad_nombre', null, ['class' => 'form-control','disabled'=>true]) !!}
    {!! Form::hidden('categoria_oportunidad_id', old('categoria_oportunidad_id', $oportunidad->categoria_oportunidad_id ?? '')) !!}
</div>

@if($autorizacionGeneral)
<!-- Responsable Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsable_id', __('models/oportunidades.fields.responsable_id')) !!}
    <select name="responsable_id" id="responsable_id" class="form-control">
        <option></option>
        @if(!empty(old('responsable_id', $oportunidad->responsable_id ?? '' )))
            <option value="{{ old('responsable_id', $oportunidad->responsable_id ?? '' ) }}" selected> {{ App\Models\Admin\User::find(old('responsable_id', $oportunidad->responsable_id ?? '' ))->name }} </option>
        @endif
    </select>
</div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.oportunidades.index',['idCampania'=>$campania->id]) }}" class="btn btn-default">@lang('crud.cancel')</a>
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

        var coloresEstados = @json($coloresEstados);
        var coloresCategorias = @json($coloresCategorias);

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
                       return {
                            q: params.term, 
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
            $('#formacion_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("formaciones.formaciones.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                       //La campa??a determinar?? las formaciones
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
                       //La campa??a determinar?? los equipos
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
                templateSelection: formatEstado,
                templateResult: formatEstado,
                ajax: {
                    url: '{{ route("campanias.estadosCampania.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                       //La campa??a determinar?? los estados
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
                       //Los estados determinar??n las razones
                       estado = $('#estado_campania_id').val();
                       return {
                            q: params.term, 
                            estado: estado,
                        };
                    },
                },
            });

            $('#interes').select2({
                templateSelection: formatStar,
                templateResult: formatStar
            }); 
            $('#capacidad').select2({
                templateSelection: formatStar,
                templateResult: formatStar
            }); 

            $(document).on('change', '#interes, #capacidad', function(e){
                actualizarCategoriaOportunidad()    
            });

            $(document).on('change', '#estado_campania_id', function(e){
                $("#justificacion_estado_campania_id").val(null).trigger("change"); 
            }); 

            function actualizarCategoriaOportunidad(){
                var interes = $('#interes').val();
                var capacidad = $('#capacidad').val();
                $.ajax({
                    url:'{{ route("campanias.categoriasOportunidad.categoriaPorDatos") }}?interes=_interes_&capacidad=_capacidad_'.replace("_interes_",interes).replace("_capacidad_",capacidad),
                    dataType: 'json',               
                    success: function(data) {                        
                        if(data!=null && data['id']!=null){
                            $("[name='categoria_oportunidad_id']").val(data['id']);                                             
                            $("[name='categoria_oportunidad_nombre']").val(data['nombre']);                            
                            var color = coloresCategorias[data['id']]['color'];
                            $texto= `<span id="categoria_icono" style="color: ${color}"><i class='fa fa-circle'></i></span>`;
                                      
                        }else{
                            $texto= `<span id="categoria_icono"></span>`;
                            $("[name='categoria_oportunidad_id']").val(null);                                             
                            $("[name='categoria_oportunidad_nombre']").val(null);
                        }
                        $("#categoria_icono").html($texto);                         
                    }
                });
            }            

            function formatEstado(estado) {
                if (!estado.id) return estado.text;
                var color = coloresEstados[estado.id]['color'];
                return $(`<span style="color: ${color}"><i class='fa fa-circle'></i></span><span> ${estado.text}</span>`);
            };

            function formatStar(star) {
                if (!star.id) return star.text;
                cantidad=star.id;
                stars="";
                for(var i=0;i<cantidad;i++){
                    stars=stars+"<i class='fa fa-star'></i>";
                }
                return $("<span>"+stars+"</span>");
            };
        });
    </script>
@endpush
