<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('id', old('id', $entidad->id ?? '')) !!}
    {!! Form::label('nombre', __('models/entidades.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', __('models/entidades.fields.direccion').':') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', __('models/entidades.fields.telefono').':') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Sector Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sector_id', __('models/entidades.fields.sector_id').':') !!}
    <select name="sector_id" id="sector_id" class="form-control">
        <option></option>
        @if(!empty(old('sector_id', $entidad->sector_id ?? '' )))
            <option value="{{ old('sector_id', $entidad->sector_id ?? '' ) }}" selected> {{ App\Models\Entidades\Sector::find(old('sector_id', $entidad->sector_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Actividad Economica Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('actividad_economica_id', __('models/entidades.fields.actividad_economica_id').':') !!}
    <select name="actividad_economica_id" id="actividad_economica_id" class="form-control">
        <option></option>
        @if(!empty(old('actividad_economica_id', $entidad->actividad_economica_id ?? '' )))
            <option value="{{ old('actividad_economica_id', $entidad->actividad_economica_id ?? '' ) }}" selected> {{ App\Models\Entidades\ActividadEconomica::find(old('actividad_economica_id', $entidad->actividad_economica_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Lugar Id Field -->
<div class="form-group col-sm-6 location-select">    
    {!! Form::label('lugar_id', __('models/entidades.fields.lugar_id').':') !!}    
    <select name="lugar_id" id="lugar_id" class="form-control">
        <option></option>
        @if(!empty(old('lugar_id', $entidad->lugar_id ?? '' )))
            <option value="{{ old('lugar_id', $entidad->lugar_id ?? '' ) }}" selected> {{ App\Models\Parametros\Lugar::find(old('lugar_id', $entidad->lugar_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
    <small>Seleccionar primero el pais, luego el departamento y por último la ciudad.<br/> Para el exterior solo es necesario el pais</small>
</div>

<!-- Mi Universidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mi_universidad', __('models/entidades.fields.mi_universidad').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('mi_universidad', 0) !!}
        {!! Form::checkbox('mi_universidad', '1', null) !!} Solo 1 entidad puede ser marcada
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('entidades.entidades.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {            
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
    </script>
@endpush
