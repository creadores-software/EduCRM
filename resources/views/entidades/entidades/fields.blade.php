@push('css')
    @include('layouts.datatables_css')
    <style>
    .select2-container {
        width: 100% !important;
        padding: 0;
    }
    </style>
@endpush
<!-- Nombre Field -->
<div class="form-group col-sm-6 required">
    {!! Form::hidden('id', old('id', $entidad->id ?? '')) !!}
    {!! Form::label('nombre', __('models/entidades.fields.nombre')) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Lugar Id Field -->
<div class="form-group col-sm-6 location-select required">    
    <i class="fa fa-question-circle mytt" data-toggle="tooltip" title="Seleccionar primero el pais, luego el departamento y por último la ciudad. Para el exterior solo es necesario el pais."></i>
    {!! Form::label('lugar_id', __('models/entidades.fields.lugar_id')) !!}    
    <select name="lugar_id" id="lugar_id" class="form-control">
        <option></option>
        @if(!empty(old('lugar_id', $entidad->lugar_id ?? '' )))
            <option value="{{ old('lugar_id', $entidad->lugar_id ?? '' ) }}" selected> {{ App\Models\Parametros\Lugar::find(old('lugar_id', $entidad->lugar_id ?? '' ))->nombre }} </option>
        @endif
    </select>
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', __('models/entidades.fields.telefono')) !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', __('models/entidades.fields.direccion')) !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Barrio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barrio', __('models/entidades.fields.barrio')) !!}
    {!! Form::text('barrio', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo', __('models/entidades.fields.correo')) !!}
    {!! Form::text('correo', null, ['class' => 'form-control']) !!}
</div>

<!-- Sitio Web Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sitio_web', __('models/entidades.fields.sitio_web')) !!}
    {!! Form::text('sitio_web', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('nit', __('models/entidades.fields.nit')) !!}
    {!! Form::text('nit', null, ['class' => 'form-control']) !!}
</div>

<!-- Sector Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sector_id', __('models/entidades.fields.sector_id')) !!}
    <select name="sector_id" id="sector_id" class="form-control">
        <option></option>
        @if(!empty(old('sector_id', $entidad->sector_id ?? '' )))
            <option value="{{ old('sector_id', $entidad->sector_id ?? '' ) }}" selected> {{ App\Models\Entidades\Sector::find(old('sector_id', $entidad->sector_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Actividad Economica Id Field -->
<div class="form-group col-sm-6">
    <i class="fa fa-question-circle mytt" data-toggle="tooltip" title="De acuerdo con la actividad elegida, se cargarán campos adicionales para IES y colegios."></i>
    {!! Form::label('actividad_economica_id', __('models/entidades.fields.actividad_economica_id')) !!}
    <select name="actividad_economica_id" id="actividad_economica_id" class="form-control">
        <option></option>
        @if(!empty(old('actividad_economica_id', $entidad->actividad_economica_id ?? '' )))
            <option value="{{ old('actividad_economica_id', $entidad->actividad_economica_id ?? '' ) }}" selected> {{ App\Models\Entidades\ActividadEconomica::find(old('actividad_economica_id', $entidad->actividad_economica_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<div id="informacion_universidad">
    <!-- Mi Universidad Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('mi_universidad', __('models/entidades.fields.mi_universidad')) !!}
        {!! Form::select('mi_universidad',[0=>'NO',1=>'SI'], old('mi_universidad'), ['class' => 'form-control']) !!}
    </div>

    <!-- Acreditacion Ies Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('acreditacion_ies', __('models/entidades.fields.acreditacion_ies')) !!}
        {!! Form::select('acreditacion_ies',[0=>'NO',1=>'SI'], old('acreditacion_ies'), ['class' => 'form-control']) !!}
    </div>

    <!-- Codigo Ies Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('codigo_ies', __('models/entidades.fields.codigo_ies')) !!}
        {!! Form::text('codigo_ies', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div id="informacion_colegio">
    <!-- Calendario Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('calendario', __('models/entidades.fields.calendario')) !!}
        {!! Form::text('calendario', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('entidades.entidades.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {              
            toggleInformacionIESColegio();

            $('#actividad_economica_id').change(function(){
                toggleInformacionIESColegio();    
            }); 

            $('#mi_universidad').select2(); 
            $('#acreditacion_ies').select2();
            $('.mytt').tooltip();          
            $('#lugar_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.lugares.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        return {
                            q: params.term, 
                            padre_id: $('#lugar_id').attr('data-id'),
                        };
                    },
                },
            });
            $('#sector_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("entidades.sectores.dataAjax") }}',
                    dataType: 'json',
                },
            });
            $('#actividad_economica_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("entidades.actividadesEconomicas.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });       

        //Métodos relacionados con la actualización en el select de lugar
        $(document).on('change', '#lugar_id', function(e){
            var th = $('#lugar_id');
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
                        $('#lugar_id').val('').trigger('change');
                    }
                }
            });
        });
        $(document).on('click', 'a.location-pre', function(e){
            $(this).parent().children('#lugar_id').attr('data-id', $(this).attr('data-id'));
            $(this).parent().children('#lugar_id').select2('val','');
            $(this).nextUntil('div.location-select', 'a.location-pre').remove();
            $(this).remove();
        });
        function addLocationPreTag(input, id, label) {
            input.prev().before('<a class=\"location-pre\" data-id=\"'+(id||'')+'\">'+label+'</a>');
        }
        $('#lugar_id').each(function(){
            var th = $('#lugar_id');
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

        function toggleInformacionIESColegio(){
            var actividadesColegio = @json($actividadesColegio);
            var actividadesIES = @json($actividadesIES);
            var actividadElegida = parseInt($('#actividad_economica_id').val());

            console.log(actividadesColegio);
            console.log(actividadesIES);
            console.log(actividadElegida);

            if(actividadesIES.includes(actividadElegida)){
                console.log('Si incluye IES');
                $('#informacion_universidad').show();    
            }else{
                $('#informacion_universidad').hide();    
            }  
            
            if(actividadesColegio.includes(actividadElegida)){
                console.log('Si incluye Col');
                $('#informacion_colegio').show();    
            }else{
                $('#informacion_colegio').hide();    
            } 
        }
    </script>
@endpush
