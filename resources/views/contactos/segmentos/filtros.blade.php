
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#general"><i class="fa fa-user"></i></a></li>
        <li><a data-toggle="tab" href="#relacional"><i class="fa fa-heart"></i></a></li>
        <li><a data-toggle="tab" href="#academico"><i class="fa fa-graduation-cap"></i></a>
        </li>
        <li><a data-toggle="tab" href="#laboral"><i class="fa fa-briefcase"></i></a></li>
        <li><a data-toggle="tab" href="#familiar"><i class="fa fa-users"></i></a></li>
        <li><a data-toggle="tab" href="#interacciones"><i class="fa fa-comment"></i></a>
        </li>
        <li><a data-toggle="tab" href="#campañas"><i class="fa fa-filter"></i></a></li>
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
       $("input[type='text']").change( function() {
            actualizarFiltroTexto();    
       });

       $(document).ready(function() {
            actualizarFiltroTexto();
        });
       
       function actualizarFiltroTexto(){
           console.log("cambiando");
            let filtros = "";
            $('#content-filtros *').filter(':input').each(function() {
                var $this = $(this);
                if ($(this).val() && $(this).val().length !== 0) {
                    filtros = filtros + $this.attr('id')+":"+$this.val()+";";
                }
            });
            $("[name='filtros_texto']").val(filtros);
            console.log(filtros);
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
        };

        function actualizarCamposSegmento(campos) {            
            $.each(campos, function(index, filtro) {
                $("#" + filtro['campo']).val(filtro['valor']);
                //Para select2 es necesario llamar este método
                $("#" + filtro['campo']).trigger('change');
            });
        };
    </script>
@endpush



