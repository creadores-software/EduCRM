<div class="col-lg-4 col-xs-6">
    <div class="small-box bg-red">
    <div class="inner text-center">
        <h3>{{ $interaccionesAtrasadas }}</h3>  
        <p>Interacciones atrasadas</p>
    </div>             
    <a id="enlaceAtrasadas" href="#" class="small-box-footer">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-4 col-xs-6">
    <div class="small-box bg-yellow">
    <div class="inner text-center">
        <h3>{{ $interaccionesPendientes }}</h3>  
        <p>Interacciones que vencerán hoy</p>
    </div>             
    <a id="enlaceProximas" href="#" class="small-box-footer">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
    <div class="inner text-center">
        <h3>{{ $interaccionesRealizadas }}</h3>  
        <p>Interacciones realizadas esta semana</p>
    </div>              
    <a id="enlaceRealizadas" href="#" class="small-box-footer">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>

@push('scripts')   
    <script type="text/javascript">   
        $(document).ready(function() {  
            $('#enlaceAtrasadas').click(function (ev) {
                ev.preventDefault();                
                abrirInteraccionesFiltradas(1);
            });

            $('#enlaceProximas').click(function (ev) {
                ev.preventDefault();                
                abrirInteraccionesFiltradas(2);
            });

            $('#enlaceRealizadas').click(function (ev) {
                ev.preventDefault();                
                abrirInteraccionesFiltradas(4);
            });

            function abrirInteraccionesFiltradas(estado){
                url="{{ route('campanias.interacciones.index') }}?idEstado="+estado;
                idResponsable=$("#responsable_id").val();                
                if(idResponsable!=null && idResponsable!=""){
                    url=url+"&idResponsable="+idResponsable;    
                }
                idCampania=$("#campania_id").val();
                if(idCampania!=null && idCampania!=""){
                    url=url+"&idCampania="+idCampania;    
                }
                window.open(url, '_blank');
            }
        });
    </script>
@endpush