<h3 class="page-header" style="padding-left: 20px">Información Académica</h3>
       
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#universitario">Historial Universitario</a></li>
         <li><a data-toggle="tab" href="#escolar">Historial Escolar</a></li>   
    </ul>                        
</div>
<div class="tab-content">   
    <div id="universitario" class="tab-pane fade in active">     
        @include('contactos.advanced_filter.filtro_academico_universitario') 
    </div>   
    <div id="escolar" class="tab-pane fade">   
        @include('contactos.advanced_filter.filtro_academico_escolar')                          
    </div>
  </div> 