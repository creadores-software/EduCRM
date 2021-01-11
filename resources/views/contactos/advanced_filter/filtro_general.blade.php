<h3 class="page-header" style="padding-left: 20px">Información General</h3>

<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', __('models/contactos.fields.nombres').':') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidos', __('models/contactos.fields.apellidos').':') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}
</div>

<!-- Correo Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo_personal', __('models/contactos.fields.correo_personal').':') !!}
    {!! Form::text('correo_personal', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}
</div>

<!-- Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('celular', __('models/contactos.fields.celular').':') !!}
    {!! Form::text('celular', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}
</div>

<!-- Origen Id Field -->
<div class="form-group col-sm-6" id="div_origen">
    {!! Form::label('origenes', __('models/contactos.fields.origen_id').':') !!}
    <select name="origenes[]" id="origenes" class="form-control">
        @if(!empty($segmento))
            @foreach (old('origenes[]', $segmento->origenes,null) as $id)
                <option value="{{ $id }}" selected="selected">{{ App\Models\Parametros\Origen::find($id)->nombre }} </option>
            @endforeach
        @endif
    </select> 
</div>

<!-- Referido Por Field -->
<div class="form-group col-sm-6" id="div_referido">
    {!! Form::label('referidos', __('models/contactos.fields.referido_por').':') !!}
    <select name="referidos[]" id="referidos" class="form-control">        
        @if(!empty($segmento))
            @foreach (old('referidos[]', $segmento->referidos,null) as $id)
                <option value="{{ $id }}" selected="selected">{{ App\Models\Contactos\Contacto::find($id)->getNombreCompleto() }} </option>
            @endforeach
        @endif
    </select> 
</div>

<!-- Otro origen Field -->
<div class="form-group col-sm-6" id="div_otro_origen">
    {!! Form::label('otro_origen', __('models/contactos.fields.otro_origen').':') !!}
    {!! Form::text('otro_origen', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}
</div>

<!-- Tipo Documento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipos_documento', __('models/contactos.fields.tipo_documento_id').':') !!}
    <select name="tipos_documento[]" id="tipos_documento" class="form-control">        
        @if(!empty($segmento))
            @foreach (old('tipos_documento[]', $segmento->tipos_documento,null) as $id)
                <option value="{{ $id }}" selected="selected">{{ App\Models\Parametros\TipoDocumento::find($id)->nombre }} </option>
            @endforeach
        @endif
    </select> 
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', __('models/contactos.fields.telefono').':') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}
</div>

<!-- Correo Institucional Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo_institucional', __('models/contactos.fields.correo_institucional').':') !!}
    {!! Form::text('correo_institucional', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}
</div>

<!-- Genero Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('generos', __('models/contactos.fields.genero_id').':') !!}
    <select name="generos[]" id="generos" class="form-control"> 
        @if(!empty($segmento))
            @foreach (old('generos[]', $segmento->generos,null) as $id)
                <option value="{{ $id }}" selected="selected">{{ App\Models\Parametros\Genero::find($id)->nombre }} </option>
            @endforeach
        @endif
    </select> 
</div>

<!-- Prefijo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prefijos', __('models/contactos.fields.prefijo_id').':') !!}
    <select name="prefijos[]" id="prefijos" class="form-control">        
        @if(!empty($segmento))
            @foreach (old('prefijos[]', $segmento->prefijos,null) as $id)
                <option value="{{ $id }}" selected="selected">{{ App\Models\Parametros\Prefijo::find($id)->nombre }} </option>
            @endforeach
        @endif
    </select> 
</div>

<!-- Estado Civil Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estados_civiles', __('models/contactos.fields.estado_civil_id').':') !!}
    <select name="estados_civiles[]" id="estados_civiles" class="form-control"> 
        @if(!empty($segmento))
            @foreach (old('estados_civiles[]', $segmento->estados_civiles,null) as $id)
                <option value="{{ $id }}" selected="selected">{{ App\Models\Parametros\EstadoCivil::find($id)->nombre }} </option>
            @endforeach
        @endif
    </select> 
</div>

<!-- Fecha Nacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_nacimiento', __('models/contactos.fields.fecha_nacimiento').':') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_nacimiento" name="fecha_nacimiento" type="text" placeholder="AAAA-MM-DD" value="{{ old('fecha_nacimiento',$segmento->fecha_nacimiento ?? '' ) }}" class="form-control pull-right">
    </div>
</div>

<!-- Fecha Nacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cumple', 'Cumpleaños:') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        {!! Form::select('cumple',[
            0=>'Cualquier Fecha',
            1=>'Ayer',
            2=>'Hoy',
            3=>'Mañana',
            4=>'Esta semana',
            5=>'Este mes',
        ], old('cumple'), ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Fecha Nacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edad', 'Edad:') !!}
    <div class="row">
        <div class="col-sm-6">
            {!! Form::text('edad_minima', null, ['class' => 'form-control','placeholder'=>'Mínimo']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::text('edad_maxima', null, ['class' => 'form-control','placeholder'=>'Máximo']) !!}
        </div>
    </div>
</div>

<!-- Direccion Residencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_residencia', __('models/contactos.fields.direccion_residencia').':') !!}
    {!! Form::text('direccion_residencia', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}
</div>

<!-- Estrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estratos', __('models/contactos.fields.estrato').':') !!}
    {!! Form::select('estratos',[1=>1,2=>2,3=>3,4=>4,5=>5,6=>6], old('estratos'), ['class' => 'form-control']) !!}
</div>

<!-- Lugar Residencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lugares_residencia', __('models/contactos.fields.lugar_residencia').':') !!}
    <select name="lugares_residencia[]" id="lugares_residencia" class="form-control">        
        @if(!empty($segmento))
            @foreach (old('lugares_residencia[]', $segmento->lugares_residencia,null) as $id)
                <option value="{{ $id }}" selected="selected">{{ App\Models\Parametros\Lugar::find($id)->nombre }} </option>
            @endforeach
        @endif
    </select> 
</div>

<!-- Tipos de Contacto -->
<div class="form-group col-sm-6">
    {!! Form::label('tiposContacto', ' Tipo Contacto:') !!}
    <select name="tiposContacto[]" id="tiposContacto" class="form-control"  multiple="multiple">
        @if(!empty($contacto))
            @foreach (old('tiposContacto[]', $segmento->tiposContacto,null) as $id)
                <option value="{{ $id }}" selected="selected">{{ App\Models\Parametros\TipoContacto::find($id)->nombre }}</option>
            @endforeach
        @endif
    </select> 
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observacion', __('models/contactos.fields.observacion').':') !!}
    {!! Form::text('observacion', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', __('models/contactos.fields.activo').':') !!}
    {!! Form::select('activo',[''=>'TODOS',1=>'SI',0=>'NO'], old('activo'), ['class' => 'form-control']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_nacimiento').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });         
        $(document).ready(function() { 
            $('#origenes').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.origenes.dataAjax") }}',
                    dataType: 'json',
                },
            });  
            $('#referidos').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("contactos.contactos.dataAjax") }}',
                    dataType: 'json',                   
                },
            });          
            $('#estratos').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
            });      
            $('#tipos_documento').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.tiposDocumento.dataAjax") }}',
                    dataType: 'json',
                },
            });       
            $('#generos').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.generos.dataAjax") }}',
                    dataType: 'json',
                },
            });   
            $('#prefijos').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.prefijos.dataAjax") }}',
                    dataType: 'json',                    
                },
            });  
            $('#estados_civiles').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.estadosCiviles.dataAjax") }}',
                    dataType: 'json',
                },
            }); 
            $('#tiposContacto').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.tiposContacto.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#lugares_residencia').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.lugares.dataAjax") }}',
                    dataType: 'json',
                },                
            });
            $('#activo').select2();  
            $('#cumple').select2();     
        });
    </script>
@endpush   

@if(empty($segmento->estratos) && empty(old('estratos')))
@push('scripts')
    <script type="text/javascript">        
        $(document).ready(function() { 
            $("#estratos").val(null).trigger("change");            
        });
    </script>
@endpush 
@endif