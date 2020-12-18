<ul class="nav nav-tabs">
    <li class="{{ (request()->is('contactos/contactos*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.contactos.show',$idContacto) }}"><i class="fa fa-user"></i> General</a></li>
    <li class="{{ (request()->is('contactos/informacionesRelacionales*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.informacionesRelacionales.show',$idRelacional) }}"><i class="fa fa-heart"></i> Relacional</a></li>
    <li class="{{ (request()->is('contactos/informacionesAcademicas*') || request()->is('contactos/informacionesEscolares*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.informacionesAcademicas.index') }}"><i class="fa fa-graduation-cap"></i> Académica</a></li>
    <li class="{{ (request()->is('contactos/informacionesLaborales*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.informacionesLaborales.index') }}"><i class="fa fa-briefcase"></i> Laboral</a></li>
    <li class="{{ (request()->is('contactos/parentescos*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.parentescos.index') }}"><i class="fa fa-users"></i> Familiar</a></li>
    <li class="">
        <a href="#"><i class="fa fa-comment"></i> Interacciones</a></li>
    <li class="">
        <a href="#"><i class="fa fa-filter"></i> Campañas</a></li>
</ul>

@if(request()->is('contactos/informacionesAcademicas*') || request()->is('contactos/informacionesEscolares*'))
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="{{ (request()->is('contactos/informacionesAcademicas*')) ? 'active' : '' }}">
            <a href="{{ route('contactos.informacionesAcademicas.index') }}">Historia Universitaria</a></li>
        <li class="{{ (request()->is('contactos/informacionesEscolares*')) ? 'active' : '' }}">
            <a href="{{ route('contactos.informacionesEscolares.index') }}">Historia Escolar</a></li>
    </ul>                        
</div>
@endif