@include('campanias.interacciones.box_info_contacto')
{!! Form::hidden('id', old('id', $interaccion->id ?? '')) !!}
{!! Form::hidden('idOportunidad',$oportunidad->id) !!}
{!! Form::hidden('users_id',$usuario) !!}
{!! Form::hidden('oportunidad_id',$oportunidad->id ?? $interaccion->oportunidad_id) !!}

<!-- Tipo Interaccion Id Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('tipo_interaccion_id', __('models/interacciones.fields.tipo_interaccion_id')) !!}
    <select name="tipo_interaccion_id" id="tipo_interaccion_id" class="form-control">
        <option></option>
        @if(!empty(old('tipo_interaccion_id', $interaccion->tipo_interaccion_id ?? '' )))
            <option value="{{ old('tipo_interaccion_id', $interaccion->tipo_interaccion_id ?? '' ) }}" selected> {{ App\Models\Campanias\TipoInteraccion::find(old('tipo_interaccion_id', $interaccion->tipo_interaccion_id ?? '' ))->nombre }} </option>
        @endif
    </select>
</div>

<!-- Estado Interaccion Id Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('estado_interaccion_id', __('models/interacciones.fields.estado_interaccion_id')) !!}
    <select name="estado_interaccion_id" id="estado_interaccion_id" class="form-control">
        <option></option>
        @if(!empty(old('estado_interaccion_id', $interaccion->estado_interaccion_id ?? '' )))
            <option value="{{ old('estado_interaccion_id', $interaccion->estado_interaccion_id ?? '' ) }}" selected> {{ App\Models\Campanias\EstadoInteraccion::find(old('estado_interaccion_id', $interaccion->estado_interaccion_id ?? '' ))->nombre }} </option>
        @endif
    </select>
</div>

<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6 required">
    <i class="fa fa-question-circle mytt" data-toggle="tooltip" title="Debe ser mayor o igual a la fecha actual"></i>
    {!! Form::label('fecha_inicio', __('models/interacciones.fields.fecha_inicio')) !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_inicio" name="fecha_inicio" type="text" placeholder="AAAA-MM-DD HH:MM" value="{{ old('fecha_inicio',$interaccion->fecha_inicio ?? '' ) }}" class="form-control pull-right">
    </div>
</div>

<!-- Fecha Fin Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('fecha_fin', __('models/interacciones.fields.fecha_fin').' (Hora):' ) !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_fin" name="fecha_fin" type="text" placeholder="HH:MM" value="{{ old('fecha_fin',$interaccion->fecha_fin ?? '' ) }}" class="form-control pull-right">
    </div>
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-12 required">
    {!! Form::label('observacion', __('models/interacciones.fields.observacion')) !!}
    {!! Form::textArea('observacion', null, ['class' => 'form-control','rows'=>2,'maxlength'=>255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.interacciones.index',['idOportunidad'=>$oportunidad->id]) }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
   <script type="text/javascript">
        fechaActual=new Date();
        hoyPrimeraHora = new Date();
        hoyPrimeraHora.setHours(0,0,0,0);
        //Minimo la fecha actual para que no se pierda trazabilidad de atrasos
        $('#fecha_inicio').datetimepicker({
            format: 'YYYY-MM-DD hh:mm a',
            locale: 'es',
            defaultDate: fechaActual,
            minDate: hoyPrimeraHora,
        }).on('dp.change', function(e) {
            $('#fecha_fin').data("DateTimePicker").minDate(e.date);
            $('#fecha_fin').data("DateTimePicker").defaultDate(e.date);
            $('#fecha_fin').data("DateTimePicker").date(e.date);
        });         
        
        $('#fecha_fin').datetimepicker({
            format: 'hh:mm a',
            locale: 'es',   
            defaultDate: fechaActual,
        });

        interaccion = @json($interaccion);
        if(interaccion!=null){
            fin = interaccion['fecha_fin'];
            date = new Date(fin);
            $('#fecha_fin').data("DateTimePicker").date(date); 
        }

        var coloresEstadosInteraccion = @json($coloresEstadosInteraccion);
        var coloresEstadosCampania = @json($coloresEstadosCampania);

        $(document).ready(function() { 
            $('#tipo_interaccion_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("campanias.tiposInteraccion.dataAjax") }}',
                    dataType: 'json',
                },
            });           
            $('#estado_interaccion_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                templateSelection: formatEstadoInteraccion,
                templateResult: formatEstadoInteraccion,
                ajax: {
                    url: '{{ route("campanias.estadosInteraccion.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        tipo = $('#tipo_interaccion_id').val();
                        return {
                            q: params.term, 
                            tipo:tipo,
                        };
                    },
                },
            });            

            $(document).on('change', '#tipo_interaccion_id', function(e){
                $("#estado_interaccion_id").val(null).trigger("change"); 
            });   
            
            $(document).on('change', '#estado_interaccion_id', function(e){
                $("#observacion").val(null).trigger("change"); 
            });

            //Para estados de interaccion
            function formatEstadoInteraccion(estado) {
                if (!estado.id) return estado.text;
                var color = coloresEstadosInteraccion[estado.id]['color'];
                return $(`<span style="color: ${color}"><i class='fa fa-circle'></i></span><span> ${estado.text}</span>`);
            };
            //Para estados de campaña
            function formatEstadoCampania(estado) {
                if (!estado.id) return estado.text;
                var color = coloresEstadosCampania[estado.id]['color'];
                return $(`<span style="color: ${color}"><i class='fa fa-circle'></i></span><span> ${estado.text}</span>`);
            };
        });
    </script>
@endpush

