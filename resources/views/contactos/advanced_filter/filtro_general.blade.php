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
    </select> 
</div>

<!-- Identificacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identificacion', __('models/contactos.fields.identificacion').':') !!}
    {!! Form::text('identificacion', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}   
</div>

<!-- Referido Por Field -->
<div class="form-group col-sm-6" id="div_referido">
    {!! Form::label('referidos', __('models/contactos.fields.referido_por').':') !!}
    <select name="referidos[]" id="referidos" class="form-control">
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
    </select> 
</div>

<!-- Prefijo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prefijos', __('models/contactos.fields.prefijo_id').':') !!}
    <select name="prefijos[]" id="prefijos" class="form-control">   
    </select> 
</div>

<!-- Estado Civil Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estados_civiles', __('models/contactos.fields.estado_civil_id').':') !!}
    <select name="estados_civiles[]" id="estados_civiles" class="form-control"> 
    </select> 
</div>

<!-- Fecha Nacimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_nacimiento', __('models/contactos.fields.fecha_nacimiento').':') !!}
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input id="fecha_nacimiento" name="fecha_nacimiento" type="text" placeholder="AAAA-MM-DD" value="{{ old('fecha_nacimiento') }}" class="form-control pull-right">
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
            {!! Form::text('edad_minima', null, ['class' => 'form-control','placeholder'=>'Mínimo','id'=>'edad_minima']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::text('edad_maxima', null, ['class' => 'form-control','placeholder'=>'Máximo','id'=>'edad_maxima']) !!}
        </div>
    </div>
</div>

<!-- Direccion Residencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_residencia', __('models/contactos.fields.direccion_residencia').':') !!}
    {!! Form::text('direccion_residencia', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}
</div>

<!-- Barrio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barrio', __('models/contactos.fields.barrio').':') !!}
    {!! Form::text('barrio', null, ['class' => 'form-control','placeholder'=>'Contiene este texto']) !!}
</div>

<!-- Estrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estratos', __('models/contactos.fields.estrato').':') !!}
    {!! Form::select('estratos',[1=>1,2=>2,3=>3,4=>4,5=>5,6=>6], old('estratos'), ['class' => 'form-control']) !!}
</div>

<!-- Sisben Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sisben_id', __('models/contactos.fields.sisben_id').':') !!}
    <select name="sisbenes_elegidos[]" id="sisbenes_elegidos" class="form-control">   
    </select> 
</div>


<!-- Lugar Residencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lugares_residencia', __('models/contactos.fields.lugar_residencia').':') !!}
    <select name="lugares_residencia[]" id="lugares_residencia" class="form-control">                
    </select> 
</div>

<!-- Tipos de Contacto -->
<div class="form-group col-sm-6">
    {!! Form::label('tiposContacto', ' Tipo Contacto:') !!}
    <select name="tiposContacto[]" id="tiposContacto" class="form-control"  multiple="multiple">
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
                createTag: function(params) {return undefined;},
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
                createTag: function(params) {return undefined;},
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
                createTag: function(params) {return undefined;},
            });
            $('#sisbenes_elegidos').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("parametros.sisbenes.dataAjax") }}',
                    dataType: 'json',                   
                },
            });
            @if(empty(old('estratos')))
                $("#estratos").val(null).trigger("change");
            @endif
            $('#tipos_documento').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
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
                createTag: function(params) {return undefined;},
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
                createTag: function(params) {return undefined;},
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
                createTag: function(params) {return undefined;},
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
                    data: function (params) {  
                        return {
                            q: params.term, 
                            todos: 1,
                        };
                    },
                    dataType: 'json',
                },                
            });
            $('#activo').select2();  
            $('#cumple').select2();     
        });
    </script>
@endpush   