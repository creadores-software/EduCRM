
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
                    filtros = filtros + $this.attr('id')+":"+$this.val()+";";
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
            var filtros_texto = sessionStorage.getItem('filtros_texto'); 
            var filtros = filtros_texto.split(';'); 
            console.log(filtros);
            $.each(filtros, function(index, filtro) {                
                if(filtro){
                    var valores = filtro.split(':');
                    actualizarCampo(valores[0], valores[1]); 
                }                          
            });
        }

        function actualizarCampo(campo, valor){
            $("#" + campo).val(valor);
            //Para select2 es necesario llamar este método
            $("#" + campo).trigger('change');
        }
    </script>
@endpush



