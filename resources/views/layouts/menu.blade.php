<li class="nav treeview {{ Request::is('administracion/*') ? 'menu-open' : '' }}">
    <a href="#"><i class="fa fa-lock"></i><span>Administración</span></a>
</li>
<li class="nav treeview {{ Request::is('parametros/*') ? 'menu-open' : '' }}">
    <a href="#"><i class="fa fa-cog"></i><span>Parámetros</span></a>   
    <ul class="nav treeview-menu" style="display:{{ Request::is('parametros/*') ? 'block' : 'none' }};">
        <li class="{{ Request::is('parametros/tiposDocumento*') ? 'active' : '' }}">
            <a href="{{ route('parametros.tiposDocumento.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/tiposDocumento.plural')</span></a>
        </li>             
    </ul> 
</li>
<li class="nav treeview {{ Request::is('contactos/*') ? 'menu-open' : '' }}">
    <a href="#"><i class="fa fa-users"></i><span>Contactos</span></a>
</li>
<li class="nav treeview {{ Request::is('campaña/*') ? 'menu-open' : '' }}">
    <a href="#"><i class="fa fa-filter"></i><span>Campañas</span></a>
</li>
<li class="nav treeview {{ Request::is('campaña/*') ? 'menu-open' : '' }}">
    <a href="#"><i class="fa fa-bar-chart"></i><span>Reportes</span></a>
</li>
<li class="nav treeview {{ Request::is('campaña/*') ? 'menu-open' : '' }}">
    <a href="#"><i class="fa fa-book"></i><span>Manuales</span></a>
</li>
<li class="nav treeview {{ Request::is('campaña/*') ? 'menu-open' : '' }}">
    <a href="#"><i class="fa fa-sign-out"></i><span>Cerrar sesión</span></a>
</li>

