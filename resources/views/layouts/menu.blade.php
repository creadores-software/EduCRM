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

<li class="{{ Request::is('parametros/actitudesServicio*') ? 'active' : '' }}">
    <a href="{{ route('parametros.actitudesServicio.index') }}"><i class="fa fa-edit"></i><span>@lang('models/actitudesServicio.plural')</span></a>
</li>

<li class="{{ Request::is('entidades/actividadesEconómicas*') ? 'active' : '' }}">
    <a href="{{ route('entidades.actividadesEconómicas.index') }}"><i class="fa fa-edit"></i><span>@lang('models/actividadesEconómicas.plural')</span></a>
</li>

<li class="{{ Request::is('entidades/actividadesEconomicas*') ? 'active' : '' }}">
    <a href="{{ route('entidades.actividadesEconomicas.index') }}"><i class="fa fa-edit"></i><span>@lang('models/actividadesEconomicas.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/actividadesOcio*') ? 'active' : '' }}">
    <a href="{{ route('parametros.actividadesOcio.index') }}"><i class="fa fa-edit"></i><span>@lang('models/actividadesOcio.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/beneficios*') ? 'active' : '' }}">
    <a href="{{ route('parametros.beneficios.index') }}"><i class="fa fa-edit"></i><span>@lang('models/beneficios.plural')</span></a>
</li>

<li class="{{ Request::is('formaciones/camposEducacion*') ? 'active' : '' }}">
    <a href="{{ route('formaciones.camposEducacion.index') }}"><i class="fa fa-edit"></i><span>@lang('models/camposEducacion.plural')</span></a>
</li>

<li class="{{ Request::is('entidades/categoriasActividadEconomica*') ? 'active' : '' }}">
    <a href="{{ route('entidades.categoriasActividadEconomica.index') }}"><i class="fa fa-edit"></i><span>@lang('models/categoriasActividadEconomica.plural')</span></a>
</li>

<li class="{{ Request::is('formaciones/categoriasCampoEducacion*') ? 'active' : '' }}">
    <a href="{{ route('formaciones.categoriasCampoEducacion.index') }}"><i class="fa fa-edit"></i><span>@lang('models/categoriasCampoEducacion.plural')</span></a>
</li>

<li class="{{ Request::is('contactos/contactosTipoContacto*') ? 'active' : '' }}">
    <a href="{{ route('contactos.contactosTipoContacto.index') }}"><i class="fa fa-edit"></i><span>@lang('models/contactosTipoContacto.plural')</span></a>
</li>

<li class="{{ Request::is('entidades/entidades*') ? 'active' : '' }}">
    <a href="{{ route('entidades.entidades.index') }}"><i class="fa fa-edit"></i><span>@lang('models/entidades.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/estadosCiviles*') ? 'active' : '' }}">
    <a href="{{ route('parametros.estadosCiviles.index') }}"><i class="fa fa-edit"></i><span>@lang('models/estadosCiviles.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/estadosDisposicion*') ? 'active' : '' }}">
    <a href="{{ route('parametros.estadosDisposicion.index') }}"><i class="fa fa-edit"></i><span>@lang('models/estadosDisposicion.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/estatusLealtad*') ? 'active' : '' }}">
    <a href="{{ route('parametros.estatusLealtad.index') }}"><i class="fa fa-edit"></i><span>@lang('models/estatusLealtad.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/estatusUsuario*') ? 'active' : '' }}">
    <a href="{{ route('parametros.estatusUsuario.index') }}"><i class="fa fa-edit"></i><span>@lang('models/estatusUsuario.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/estilosVida*') ? 'active' : '' }}">
    <a href="{{ route('parametros.estilosVida.index') }}"><i class="fa fa-edit"></i><span>@lang('models/estilosVida.plural')</span></a>
</li>

<li class="{{ Request::is('formaciones/formaciones*') ? 'active' : '' }}">
    <a href="{{ route('formaciones.formaciones.index') }}"><i class="fa fa-edit"></i><span>@lang('models/formaciones.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/frecuenciasUso*') ? 'active' : '' }}">
    <a href="{{ route('parametros.frecuenciasUso.index') }}"><i class="fa fa-edit"></i><span>@lang('models/frecuenciasUso.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/generaciones*') ? 'active' : '' }}">
    <a href="{{ route('parametros.generaciones.index') }}"><i class="fa fa-edit"></i><span>@lang('models/generaciones.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/generos*') ? 'active' : '' }}">
    <a href="{{ route('parametros.generos.index') }}"><i class="fa fa-edit"></i><span>@lang('models/generos.plural')</span></a>
</li>

<li class="{{ Request::is('contactos/informacionesAcademicas*') ? 'active' : '' }}">
    <a href="{{ route('contactos.informacionesAcademicas.index') }}"><i class="fa fa-edit"></i><span>@lang('models/informacionesAcademicas.plural')</span></a>
</li>

<li class="{{ Request::is('contactos/informacionesEscolares*') ? 'active' : '' }}">
    <a href="{{ route('contactos.informacionesEscolares.index') }}"><i class="fa fa-edit"></i><span>@lang('models/informacionesEscolares.plural')</span></a>
</li>

<li class="{{ Request::is('contactos/informacionesLaborales*') ? 'active' : '' }}">
    <a href="{{ route('contactos.informacionesLaborales.index') }}"><i class="fa fa-edit"></i><span>@lang('models/informacionesLaborales.plural')</span></a>
</li>

<li class="{{ Request::is('contactos/informacionesRelacionales*') ? 'active' : '' }}">
    <a href="{{ route('contactos.informacionesRelacionales.index') }}"><i class="fa fa-edit"></i><span>@lang('models/informacionesRelacionales.plural')</span></a>
</li>

<li class="{{ Request::is('contactos/preferenciasActividadesOcio*') ? 'active' : '' }}">
    <a href="{{ route('contactos.preferenciasActividadesOcio.index') }}"><i class="fa fa-edit"></i><span>@lang('models/preferenciasActividadesOcio.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/lugares*') ? 'active' : '' }}">
    <a href="{{ route('parametros.lugares.index') }}"><i class="fa fa-edit"></i><span>@lang('models/lugares.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/mediosComunicacion*') ? 'active' : '' }}">
    <a href="{{ route('parametros.mediosComunicacion.index') }}"><i class="fa fa-edit"></i><span>@lang('models/mediosComunicacion.plural')</span></a>
</li>

<li class="{{ Request::is('formaciones/nivelesFormacion*') ? 'active' : '' }}">
    <a href="{{ route('formaciones.nivelesFormacion.index') }}"><i class="fa fa-edit"></i><span>@lang('models/nivelesFormacion.plural')</span></a>
</li>

<li class="{{ Request::is('entidades/ocupaciones*') ? 'active' : '' }}">
    <a href="{{ route('entidades.ocupaciones.index') }}"><i class="fa fa-edit"></i><span>@lang('models/ocupaciones.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/origenes*') ? 'active' : '' }}">
    <a href="{{ route('parametros.origenes.index') }}"><i class="fa fa-edit"></i><span>@lang('models/origenes.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/parentescos*') ? 'active' : '' }}">
    <a href="{{ route('parametros.parentescos.index') }}"><i class="fa fa-edit"></i><span>@lang('models/parentescos.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/personalidades*') ? 'active' : '' }}">
    <a href="{{ route('parametros.personalidades.index') }}"><i class="fa fa-edit"></i><span>@lang('models/personalidades.plural')</span></a>
</li>

<li class="{{ Request::is('contactos/preferenciasCamposEducacion*') ? 'active' : '' }}">
    <a href="{{ route('contactos.preferenciasCamposEducacion.index') }}"><i class="fa fa-edit"></i><span>@lang('models/preferenciasCamposEducacion.plural')</span></a>
</li>

<li class="{{ Request::is('contactos/preferenciasFormaciones*') ? 'active' : '' }}">
    <a href="{{ route('contactos.preferenciasFormaciones.index') }}"><i class="fa fa-edit"></i><span>@lang('models/preferenciasFormaciones.plural')</span></a>
</li>

<li class="{{ Request::is('contactos/preferenciasMediosComunicacion*') ? 'active' : '' }}">
    <a href="{{ route('contactos.preferenciasMediosComunicacion.index') }}"><i class="fa fa-edit"></i><span>@lang('models/preferenciasMediosComunicacion.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/prefijos*') ? 'active' : '' }}">
    <a href="{{ route('parametros.prefijos.index') }}"><i class="fa fa-edit"></i><span>@lang('models/prefijos.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/razas*') ? 'active' : '' }}">
    <a href="{{ route('parametros.razas.index') }}"><i class="fa fa-edit"></i><span>@lang('models/razas.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/religiones*') ? 'active' : '' }}">
    <a href="{{ route('parametros.religiones.index') }}"><i class="fa fa-edit"></i><span>@lang('models/religiones.plural')</span></a>
</li>

<li class="{{ Request::is('entidades/sectores*') ? 'active' : '' }}">
    <a href="{{ route('entidades.sectores.index') }}"><i class="fa fa-edit"></i><span>@lang('models/sectores.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/tiposContacto*') ? 'active' : '' }}">
    <a href="{{ route('parametros.tiposContacto.index') }}"><i class="fa fa-edit"></i><span>@lang('models/tiposContacto.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/tiposDocumento*') ? 'active' : '' }}">
    <a href="{{ route('parametros.tiposDocumento.index') }}"><i class="fa fa-edit"></i><span>@lang('models/tiposDocumento.plural')</span></a>
</li>

<li class="{{ Request::is('entidades/tiposOcupacion*') ? 'active' : '' }}">
    <a href="{{ route('entidades.tiposOcupacion.index') }}"><i class="fa fa-edit"></i><span>@lang('models/tiposOcupacion.plural')</span></a>
</li>

<li class="{{ Request::is('parametros/tiposParentesco*') ? 'active' : '' }}">
    <a href="{{ route('parametros.tiposParentesco.index') }}"><i class="fa fa-edit"></i><span>@lang('models/tiposParentesco.plural')</span></a>
</li>

