{!! Form::hidden('contacto_id',$idContacto) !!}
{!! Form::hidden('idContacto',$idContacto) !!}
{!! Form::hidden('id', old('id', $informacionLaboral->id ?? '')) !!}

<!-- Entidad Id Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('entidad_id', __('models/informacionesLaborales.fields.entidad_id')) !!}
    <select name="entidad_id" id="entidad_id" class="form-control">
        <option></option>
        @if(!empty(old('entidad_id', $informacionLaboral->entidad_id ?? '' )))
            <option value="{{ old('entidad_id', $informacionLaboral->entidad_id ?? '' ) }}" selected> {{ App\Models\Entidades\Entidad::find(old('entidad_id', $informacionLaboral->entidad_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Ocupacion Id Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('ocupacion_id', __('models/informacionesLaborales.fields.ocupacion_id')) !!}
    <select name="ocupacion_id" id="ocupacion_id" class="form-control">
        <option></option>
        @if(!empty(old('ocupacion_id', $informacionLaboral->ocupacion_id ?? '' )))
            <option value="{{ old('ocupacion_id', $informacionLaboral->ocupacion_id ?? '' ) }}" selected> {{ App\Models\Entidades\Ocupacion::find(old('ocupacion_id', $informacionLaboral->ocupacion_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Vinculado Actualmente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vinculado_actualmente', __('models/informacionesLaborales.fields.vinculado_actualmente')) !!}
    {!! Form::select('vinculado_actualmente',[1=>'SI', 0=>'NO'], old('vinculado_actualmente'), ['class' => 'form-control']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
         $(document).ready(function() { 
            $('#vinculado_actualmente').select2(); 
        }); 
    </script>
@endpush

<!-- Fecha Inicio Field -->
<div id="div_fecha_inicio" class="form-group col-sm-6 required">
    {!! Form::label('fecha_inicio', __('models/informacionesLaborales.fields.fecha_inicio')) !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_inicio" name="fecha_inicio" type="text" placeholder="AAAA-MM-DD" value="{{ old('fecha_inicio',$informacionLaboral->fecha_inicio ?? '' ) }}" class="form-control pull-right">
    </div>
</div>

<!-- Fecha Fin Field -->
<div id="div_fecha_fin" class="form-group col-sm-6">
    {!! Form::label('fecha_fin', __('models/informacionesLaborales.fields.fecha_fin')) !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_fin" name="fecha_fin" type="text" placeholder="AAAA-MM-DD" value="{{ old('fecha_fin',$informacionLaboral->fecha_fin ?? '' ) }}" class="form-control pull-right">
    </div>
</div>

<!-- Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area', __('models/informacionesLaborales.fields.area')) !!}
    {!! Form::text('area', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', __('models/informacionesLaborales.fields.telefono')) !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Funciones Field -->
<div class="form-group col-sm-12">
    {!! Form::label('funciones', __('models/informacionesLaborales.fields.funciones')) !!}
    {!! Form::textarea('funciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.informacionesLaborales.index',['idContacto'=>$idContacto]) }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_inicio').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        }).on('dp.change', function(e) {
            $('#fecha_fin').data("DateTimePicker").minDate(e.date);
        });
        $('#fecha_fin').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });   
        $('#vinculado_actualmente').change(function(){
            toggleFechaFin();
        });     
        $(document).ready(function() { 
            toggleFechaFin();           
            $('#entidad_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("entidades.entidades.dataAjax") }}',
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
            $('#ocupacion_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("entidades.ocupaciones.dataAjax") }}',
                    dataType: 'json',
                },
            });             
        }); 

        function toggleFechaFin(){
            if($('#vinculado_actualmente').val()==1){
                $('#div_fecha_fin').hide();   
            }else{ 
                $('#div_fecha_fin').show();      
            }    
        }
    </script>
@endpush

