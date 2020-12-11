<ul class="nav nav-tabs">
    <li class="{{ (request()->is('contactos/contactos*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.contactos.edit',$idContacto) }}"><i class="fa fa-user"></i> General</a></li>
    <li class="{{ (request()->is('contactos/informacionesRelacionales*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.informacionesRelacionales.edit',$idRelacional) }}"><i class="fa fa-heart"></i> Relacional</a></li>
    <li class="{{ (request()->is('contactos/preferencia*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.preferenciasFormaciones.index',['idContacto'=>$idContacto]) }}"><i class="fa fa-thumbs-up"></i> Preferencias</a></li>
    <li class="{{ (request()->is('contactos/informacionesAcademicas*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.informacionesAcademicas.index',['idContacto'=>$idContacto]) }}"><i class="fa fa-graduation-cap"></i> Académica</a></li>
    <li class="{{ (request()->is('contactos/informacionesLaborales*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.informacionesLaborales.index',['idContacto'=>$idContacto]) }}"><i class="fa fa-briefcase"></i> Laboral</a></li>
    <li class="{{ (request()->is('contactos/parentescos*')) ? 'active' : '' }}">
        <a href="{{ route('contactos.parentescos.index',['idContacto'=>$idContacto]) }}"><i class="fa fa-users"></i> Familiar</a></li>
    <li class="">
        <a href="#"><i class="fa fa-comment"></i> Interacciones</a></li>
    <li class="">
        <a href="#"><i class="fa fa-filter"></i> Campañas</a></li>
</ul>