<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', __('models/contactos.fields.nombres').':') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidos', __('models/contactos.fields.apellidos').':') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Personal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo_personal', __('models/contactos.fields.correo_personal').':') !!}
    {!! Form::text('correo_personal', null, ['class' => 'form-control']) !!}
</div>

<!-- Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('celular', __('models/contactos.fields.celular').':') !!}
    {!! Form::text('celular', null, ['class' => 'form-control']) !!}
</div>


<!-- Origen Id Field -->
<div class="form-group col-sm-6" id="div_origen">
    {!! Form::label('origen_id', __('models/contactos.fields.origen_id').':') !!}
    <select name="origen_id" id="origen_id" class="form-control">
        @if(!empty(old('origen_id', $contacto->origen_id ?? '' )))
            <option value="{{ old('origen_id', $contacto->origen_id ?? '' ) }}" selected> {{ App\Models\Parametros\Origen::find(old('origen_id', $contacto->origen_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Referido Por Field -->
<div class="form-group col-sm-6" id="div_referido">
    {!! Form::label('referido_por', __('models/contactos.fields.referido_por').':') !!}
    <select name="referido_por" id="referido_por" class="form-control">
        <option></option>
        @if(!empty(old('referido_por', $contacto->referido_por ?? '' )))
            <option value="{{ old('referido_por', $contacto->referido_por ?? '' ) }}" selected> {{ App\Models\Contactos\Contacto::find(old('referido_por', $contacto->referido_por ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<br/><br/>

<h2 class="page-header" style="padding-left: 20px">Campos Opcionales</h2>


<!-- Tipo Documento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_documento_id', __('models/contactos.fields.tipo_documento_id').':') !!}
    <select name="tipo_documento_id" id="tipo_documento_id" class="form-control">
        <option></option>
        @if(!empty(old('tipo_documento_id', $contacto->tipo_documento_id ?? '' )))
            <option value="{{ old('tipo_documento_id', $contacto->tipo_documento_id ?? '' ) }}" selected> {{ App\Models\Parametros\TipoDocumento::find(old('tipo_documento_id', $contacto->tipo_documento_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Identificacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identificacion', __('models/contactos.fields.identificacion').':') !!}
    {!! Form::text('identificacion', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id', old('id', $contacto->id ?? '')) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', __('models/contactos.fields.telefono').':') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Institucional Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo_institucional', __('models/contactos.fields.correo_institucional').':') !!}
    {!! Form::text('correo_institucional', null, ['class' => 'form-control']) !!}
</div>

<!-- Genero Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('genero_id', __('models/contactos.fields.genero_id').':') !!}
    <select name="genero_id" id="genero_id" class="form-control">
        <option></option>
        @if(!empty(old('genero_id', $contacto->genero_id ?? '' )))
            <option value="{{ old('genero_id', $contacto->genero_id ?? '' ) }}" selected> {{ App\Models\Parametros\Genero::find(old('genero_id', $contacto->genero_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Prefijo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prefijo_id', __('models/contactos.fields.prefijo_id').':') !!}
    <select name="prefijo_id" id="prefijo_id" class="form-control">
        <option></option>
        @if(!empty(old('prefijo_id', $contacto->prefijo_id ?? '' )))
            <option value="{{ old('prefijo_id', $contacto->prefijo_id ?? '' ) }}" selected> {{ App\Models\Parametros\Prefijo::find(old('prefijo_id', $contacto->prefijo_id ?? '' ))->nombre }} </option>
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
        <input type="text" placeholder="AAAA-MM-DD" value="{{ old('fecha_nacimiento',$contacto->fecha_nacimiento ?? '' ) }}" class="form-control pull-right" id="fecha_nacimiento">
    </div>
</div>


<!-- Estado Civil Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_civil_id', __('models/contactos.fields.estado_civil_id').':') !!}
    <select name="estado_civil_id" id="estado_civil_id" class="form-control">
        <option></option>
        @if(!empty(old('estado_civil_id', $contacto->estado_civil_id ?? '' )))
            <option value="{{ old('estado_civil_id', $contacto->estado_civil_id ?? '' ) }}" selected> {{ App\Models\Parametros\EstadoCivil::find(old('estado_civil_id', $contacto->estado_civil_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Direccion Residencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_residencia', __('models/contactos.fields.direccion_residencia').':') !!}
    {!! Form::text('direccion_residencia', null, ['class' => 'form-control']) !!}
</div>

<!-- Estrato Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estrato', __('models/contactos.fields.estrato').':') !!}
    {!! Form::select('estrato',[''=>'',1=>1,2=>2,3=>3,4=>4,5=>5,6=>6], old('estrato'), ['class' => 'form-control']) !!}
</div>

<!-- Lugar Residencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lugar_residencia', __('models/contactos.fields.lugar_residencia').':') !!}
    <select name="lugar_residencia" id="lugar_residencia" class="form-control">
        <option></option>
        @if(!empty(old('lugar_residencia', $contacto->lugar_residencia ?? '' )))
            <option value="{{ old('lugar_residencia', $contacto->lugar_residencia ?? '' ) }}" selected> {{ App\Models\Parametros\Lugar::find(old('lugar_residencia', $contacto->lugar_residencia ?? '' ))->nombre }} </option>
        @endif
    </select> 
    <small>Seleccionar primero el pais, luego el departamento y por último la ciudad.<br/> Para el exterior solo es necesario el pais</small>
</div>

<!-- Tipos de Contacto -->
<div class="form-group col-sm-6">
    {!! Form::label('tiposContacto', ' Tipo Contacto:') !!}
    <select name="tiposContacto[]" id="tiposContacto" class="form-control"  multiple="multiple">
        @foreach (old('tiposContacto', $contacto->tiposContacto,null) as $tipo)
            <option value="{{ $tipo->id }}" selected="selected">{{ $tipo->nombre }}</option>
        @endforeach
    </select> 
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('observacion', __('models/contactos.fields.observacion').':') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', __('models/formaciones.fields.activo').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('activo', 0) !!}
        {!! Form::checkbox('activo', 1, old('activo', $contacto->activo ?? 1)) !!}  &nbsp;
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.contactos.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>


@push('scripts')
    <script type="text/javascript">
        $('#fecha_nacimiento').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            locale: 'es',
        });
        $('#origen_id').change(function(){
            var seleccionado=$('#origen_id').select2('data');
            if(seleccionado && seleccionado[0] && seleccionado[0].text=='Referido'){
                $('#div_referido').show();  
                $('#div_origen').removeClass('col-sm-12');  
                $('#div_origen').addClass('col-sm-6');  
            }else{
                $('#div_referido').hide(); 
                $('#div_origen').removeClass('col-sm-6');  
                $('#div_origen').addClass('col-sm-12');     
            }
        }); 
        $(document).ready(function() { 
            $('#origen_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.origenes.dataAjax") }}',
                    dataType: 'json',
                },
            });  
            $('#referido_por').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("contactos.contactos.dataAjax") }}',
                    dataType: 'json',
                },
            });    
            $('#tipo_documento_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.tiposDocumento.dataAjax") }}',
                    dataType: 'json',
                },
            });       
            $('#genero_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.generos.dataAjax") }}',
                    dataType: 'json',
                },
            });   
            $('#prefijo_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.prefijos.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {
                        genero_seleccionado = $('#genero_id').val();
                        return {
                            q: params.term, 
                            genero: genero_seleccionado,
                        };
                    },
                },
            });  
            $('#estado_civil_id').select2({
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
                ajax: {
                    url: '{{ route("parametros.tiposContacto.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#lugar_residencia').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.lugares.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        return {
                            q: params.term, 
                            padre_id: $('#lugar_residencia').attr('data-id'),
                        };
                    },
                },                
            });             
            var seleccionado=$('#origen_id').select2('data');
            if(!seleccionado || !seleccionado[0] || !seleccionado[0].text.includes('Referido')){
                $('#div_referido').hide(); 
                $('#div_origen').removeClass('col-sm-6');  
                $('#div_origen').addClass('col-sm-12');   
            }           
        });

        //Métodos relacionados con la actualización en el select de lugar
        $(document).on('change', '#lugar_residencia', function(e){
            var th = $('#lugar_residencia');
            var seleccionado=th.select2('data');
            var id_seleccionado=null;
            var texto_seleccionado=''; 
            if(seleccionado && seleccionado[0]){
                id_seleccionado=seleccionado[0].id;
                texto_seleccionado=seleccionado[0].text; 
            }                  
            $.ajax({
                url:'{{ route("parametros.lugares.childrenCount",["padre_id"=>"_pid_"]) }}'.replace("_pid_",id_seleccionado),
                dataType: 'json',               
                success: function(data) {
                    if (parseInt(data) > 0) {
                        addLocationPreTag(th, th.attr('data-id'),texto_seleccionado);                        
                        th.attr('data-id', id_seleccionado);
                        $('#lugar_residencia').val('').trigger('change');
                    }
                }
            });
        });
        $(document).on('click', 'a.location-pre', function(e){
            $(this).parent().children('#lugar_residencia').attr('data-id', $(this).attr('data-id'));
            $(this).parent().children('#lugar_residencia').select2('val','');
            $(this).nextUntil('div.location-select', 'a.location-pre').remove();
            $(this).remove();
        });
        function addLocationPreTag(input, id, label) {
            input.prev().before('<a class=\"location-pre\" data-id=\"'+(id||'')+'\">'+label+'</a>');
        }
        $('#lugar_residencia').each(function(){
            var th = $('#lugar_residencia');
            $.ajax({
                url: '{{ route("parametros.lugares.parents",["id"=>"_pid_"]) }}'.replace("_pid_",th.val()),
                'dataType':'json',
                'success': function(data) {
                    if (Array.isArray(data) && data.length > 0) {
                        var lastId = '';
                        for (var i = 0; i < data.length; i++) {
                            addLocationPreTag(th, lastId, data[i].label);
                            lastId = data[i].id;
                            th.attr('data-id', lastId);
                        }
                    }
                }
            });
        });
    </script>
@endpush
