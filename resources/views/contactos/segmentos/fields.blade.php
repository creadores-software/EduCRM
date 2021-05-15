<!-- Nombre Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('nombre', __('models/segmentos.fields.nombre')) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('descripcion', __('models/segmentos.fields.descripcion')) !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Global Field -->
<div class="form-group col-sm-6">
    {!! Form::label('global', __('models/segmentos.fields.global')) !!}
    <select name="global" id="global" class="form-control">
        <option value="0" selected>NO</option>
        <option value="1">SI</option>
    </select> 
</div>

<!-- Filtros Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('filtros', __('models/segmentos.fields.filtros')) !!}     
    <!-- Por defecto se añade un atributo genérico para que no falle la validación -->
    <input type="hidden" name="filtros[0][campo]" class="form-control" value="filtro">
    <input type="hidden" name="filtros[0][valor]" class="form-control" value="1">
    @include('contactos.segmentos.filtros')
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">    
    <a href="{{ route('contactos.segmentos.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
    <button class = 'btn btn-default' type="submit" value="vistaPrevia">Vista Previa</button>
    <button class='btn btn-primary' type="submit" value="guardar">Guardar</button>    
</div>

@push('scripts')
    <script type="text/javascript">  
        $(document).ready(function() {
            $('#global').select2(); 

            $("#formSegmento button").click(function (ev) {
                ev.preventDefault()
                if ($(this).attr("value") == "guardar") {  
                    $("#formSegmento").submit();
                }
                if ($(this).attr("value") == "vistaPrevia") {
                    valor_filtro=$("[name='filtros_texto']").val();
                    if(valor_filtro!="cumple:0;"){
                        sessionStorage.setItem('filtros_texto', valor_filtro);
                        window.open("{{ route('contactos.contactos.index',['vistaPrevia'=>'1']) }}", '_blank');
                    }else{
                        alert('Es necesario elegir algunos valores en filtros para ver la vista previa.');    
                    }                    
                }
            });
        });
    </script>
@endpush

