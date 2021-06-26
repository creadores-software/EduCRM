<div class="clearfix"></div>
@include('flash::message')
<div class="clearfix"></div>

<ul class="nav nav-tabs">
    <li class="{{ (request()->is('contactos/contactos*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.contactos.show',$idContacto) }}"><i class="fa fa-user"></i> General</a></li>
    <li class="{{ (request()->is('contactos/informacionesRelacionales*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.informacionesRelacionales.show',[$idRelacional,'idContacto'=>$idContacto]) }}"><i class="fa fa-heart"></i> Relacional</a></li>
    <li class="{{ (request()->is('contactos/informacionesUniversitarias*') || request()->is('contactos/informacionesEscolares*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.informacionesUniversitarias.index',['idContacto'=>$idContacto]) }}"><i class="fa fa-graduation-cap"></i> Académica</a></li>
    <li class="{{ (request()->is('contactos/informacionesLaborales*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.informacionesLaborales.index',['idContacto'=>$idContacto]) }}"><i class="fa fa-briefcase"></i> Laboral</a></li>
    <li class="{{ (request()->is('contactos/parentescos*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.parentescos.index',['idContacto'=>$idContacto]) }}"><i class="fa fa-users"></i> Familiar</a></li>
    <li class="{{ (request()->is('campanias/oportunidades*')) ? 'active' : '' }}">
        <a href="{{ route('campanias.oportunidades.index',['idContacto'=>$idContacto]) }}"><i class="fa fa-filter"></i> Oportunidades</a></li>
    <li class="{{ (request()->is('campanias/interacciones*')) ? 'active' : '' }}">
        <a href="{{ route('campanias.interacciones.index',['idContacto'=>$idContacto]) }}"><i class="fa fa-comment"></i> Interacciones</a></li>
</ul>

@if(request()->is('contactos/informacionesUniversitarias*') || request()->is('contactos/informacionesEscolares*'))
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="{{ (request()->is('contactos/informacionesUniversitarias*')) ? 'active' : '' }}">
            <a href="{{ route('contactos.informacionesUniversitarias.index',['idContacto'=>$idContacto]) }}">Historial Universitario</a></li>
        <li class="{{ (request()->is('contactos/informacionesEscolares*')) ? 'active' : '' }}">
            <a href="{{ route('contactos.informacionesEscolares.index',['idContacto'=>$idContacto]) }}">Historial Escolar</a></li>
    </ul>                        
</div>
@endif