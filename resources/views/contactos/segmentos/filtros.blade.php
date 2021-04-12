
{!! Form::hidden('filtros_texto', old('filtros_texto')) !!} 
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a data-content="Información General" data-toggle="tab" href="#general"><i class="fa fa-user"></i></a></li>
        <li><a data-content="Información Relacional" data-toggle="tab" href="#relacional"><i class="fa fa-heart"></i></a></li>
        <li><a data-content="Información Académica" data-toggle="tab" href="#academico"><i class="fa fa-graduation-cap"></i></a></li>
        <li><a data-content="Información Laboral" data-toggle="tab" href="#laboral"><i class="fa fa-briefcase"></i></a></li>
        <li><a data-content="Información Familiar" data-toggle="tab" href="#familiar"><i class="fa fa-users"></i></a></li>
        <li><a data-content="Interacciones" data-toggle="tab" href="#interacciones"><i class="fa fa-comment"></i></a></li>
        <li><a data-content="Campañas" data-toggle="tab" href="#campañas"><i class="fa fa-filter"></i></a></li>
    </ul>
</div>
<div class="tab-content" id="content-filtros">
    <div id="general" class="tab-pane fade in active">
        @include('contactos.advanced_filter.filtro_general')
    </div>
    <div id="relacional" class="tab-pane fade">
        @include('contactos.advanced_filter.filtro_relacional')
    </div>
    <div id="academico" class="tab-pane fade">
        @include('contactos.advanced_filter.filtro_academico')
    </div>    
    <div id="laboral" class="tab-pane fade">
        @include('contactos.advanced_filter.filtro_laboral')
    </div>    
</div>


@push('scripts')
    <script type="text/javascript">
       $("form :input").change( function() {
            actualizarFiltroTexto();    
       });

       $(document).ready(function() {
            actualizarFiltroTexto();
        });
       
       function actualizarFiltroTexto(){
            let filtros = "";
            $('#content-filtros *').filter(':input').each(function() {
                var $this = $(this);
                if ($(this).val() && $(this).val().length !== 0) {
                    if($(this).hasClass("select2-hidden-accessible")){
                        var seleccionados = $(this).select2('data');
                        var valor="";
                        $.each(seleccionados, function(index, seleccionado) {
                            valor=valor+seleccionado.id+'='+seleccionado.text+',';
                        });
                        
                    }else{
                        var valor=$this.val();
                    }
                    filtros = filtros + $this.attr('id')+":"+valor+";";
                }
            });
            $("[name='filtros_texto']").val(filtros);
       }

       function actualizarSegmento(idSegmento) {   
            let url = "{{ route('contactos.segmentos.filtros', ['id' => '_idSegmento']) }}";
            url = url.replace('_idSegmento', idSegmento);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(campos) {
                    actualizarCamposSegmento(campos);
                }
            });
        }

        function actualizarCamposSegmento(campos) {            
            $.each(campos, function(index, filtro) {
                actualizarCampo(filtro['campo'], filtro['valor']); 
            });
        }

        function actualizarCamposConFiltroTexto() { 
            /**
            Se pone de nuevo en document ready para que se ejecute después
            que estén instanciados los select2
            */
            jQuery(document).ready(function(){
                var filtros_texto = sessionStorage.getItem('filtros_texto'); 
                var filtros = filtros_texto.split(';'); 
                $.each(filtros, function(index, filtro) {                
                    if(filtro){
                        var valores = filtro.split(':');
                        actualizarCampo(valores[0], valores[1]); 
                    }                          
                });
                filtrarDataTable();
            });           
        }

        function actualizarCampo(campo, valor){
            if($('#' + campo).hasClass("select2-hidden-accessible")){
                //Inputs de tipo select2
                var opciones = valor.split(','); 
                $.each(opciones, function(index, opcion) { 
                    if(opcion){
                        var valores = opcion.split('=');
                        var seleccion = new Option(valores[1], valores[0], true, true);
                        $('#' + campo).append(seleccion);
                    }                          
                });
                $("#" + campo).trigger('change');

            }else{
                $("#" + campo).val(valor);
            }
        }

        function filtrarDataTable(){
            $('#dataTableBuilder').DataTable().draw();
            $('#advanced_filter').modal('hide');
        }


        function restablecerCampos(mantieneSeleccionado) {
            //Se deben resetear los campos puntuales de segmentos para que no tome los de por defecto
            $('#nombre').val('');
            $('#descripcion').val('');
            $("#global").val(0).trigger('change'); 
            //Resetea todos los input de filtros
            $('#form_filtros')[0].reset();
            if(mantieneSeleccionado){
                $(".select2-hidden-accessible").not('#segmento_seleccionado').not('#global').val(null).trigger("change");            
            }else{
                $(".select2-hidden-accessible").val(null).trigger("change");            
            }
            $("#form_filtros :input").prop("disabled", false);
        }
    </script>
@endpush



