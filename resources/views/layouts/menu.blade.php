<li id="administracion" class="treeview opcion-menu menu-padre">
    <a class="app-menu__item" href="#"><i class="fa fa-cog"></i><span>Administración</span></a>
    <ul class="treeview-menu">                
    </ul> 
</li>
<li id="contactos" class="treeview opcion-menu menu-padre">
    <a class="app-menu__item" href="#"><i class="fa fa-users"></i><span>Contactos</span></a>
    <ul class="treeview-menu">
        <li id="contactos-parametros-basicos" class="treeview opcion-menu menu-hijo">
            <a class="app-menu__item" href="#"><i class="fa fa-circle-o"></i><span>Parámetros Básicos</span></a>
            <ul class="treeview-menu">
                <li id="parametros-estados-civiles" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.estadosCiviles.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/estadosCiviles.plural')</span></a>
                </li>               
                <li id="parametros-generos" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.generos.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/generos.plural')</span></a>
                </li>
                <li id="parametros-lugares" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.lugares.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/lugares.plural')</span></a>
                </li>                
                <li id="parametros-prefijos" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.prefijos.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/prefijos.plural')</span></a>
                </li>               
                <li id="parametros-tipos-contacto" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.tiposContacto.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/tiposContacto.plural')</span></a>
                </li>
                <li id="parametros-tipos-documento" class="treeview-item opcion-menumenu-nieto">
                    <a href="{{ route('parametros.tiposDocumento.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/tiposDocumento.plural')</span></a>
                </li>
                <li id="parametros-tipos-parentesco" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.tiposParentesco.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/tiposParentesco.plural')</span></a>
                </li>
            </ul> 
        </li>    
        <li id="contactos-parametros-relacionales" class="treeview opcion-menu menu-hijo">
            <a class="app-menu__item" href="#"><i class="fa fa-circle-o"></i><span>Parámetros Relacionales</span></a>
            <ul class="treeview-menu">
                <li id="parametros-actitudes-servicio" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.actitudesServicio.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/actitudesServicio.plural')</span></a>
                </li>    
                <li id="parametros-actividades-ocio" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.actividadesOcio.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/actividadesOcio.plural')</span></a>
                </li>  
                <li id="parametros-beneficios" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.beneficios.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/beneficios.plural')</span></a>
                </li>                
                <li id="parametros-estados-disposicion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.estadosDisposicion.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/estadosDisposicion.plural')</span></a>
                </li>   
                <li id="parametros-estatus-lealtad" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.estatusLealtad.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/estatusLealtad.plural')</span></a>
                </li>
                <li id="parametros-estatus-usuario" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.estatusUsuario.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/estatusUsuario.plural')</span></a>
                </li>
                <li id="parametros-estilos-vida" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.estilosVida.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/estilosVida.plural')</span></a>
                </li>
                <li id="parametros-frecuencias-uso" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.frecuenciasUso.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/frecuenciasUso.plural')</span></a>
                </li>
                <li id="parametros-generaciones" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.generaciones.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/generaciones.plural')</span></a>
                </li>               
                <li id="parametros-medios-comunicacion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.mediosComunicacion.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/mediosComunicacion.plural')</span></a>
                </li>
                <li id="parametros-origenes" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.origenes.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/origenes.plural')</span></a>
                </li>               
                <li id="parametros-personalidades" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.personalidades.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/personalidades.plural')</span></a>
                </li>                
                <li id="parametros-razas" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.razas.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/razas.plural')</span></a>
                </li>
                <li id="parametros-religiones" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.religiones.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/religiones.plural')</span></a>
                </li>                
            </ul> 
        </li>   
        <li id="contactos-contactos" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('contactos.contactos.index') }}"><i class="fa fa-circle-o"></i><span>Gestión de Contactos</span></a>
        </li>                 
    </ul> 
</li>
<li id="entidades" class="treeview opcion-menu menu-padre">
    <a class="app-menu__item" href="#"><i class="fa fa-building"></i><span>Entidades</span></a>
    <ul class="treeview-menu">        
        <li id="entidades-parametros" class="treeview opcion-menu menu-hijo">
            <a  class="app-menu__item" href="#"><i class="fa fa-circle-o"></i><span>Parámetros</span></a>
            <ul class="treeview-menu">
                <li id="entidades-actividades-economicas" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('entidades.actividadesEconomicas.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/actividadesEconomicas.plural')</span></a>
                </li>  
                <li id="entidades-categorias-actividad-economica" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('entidades.categoriasActividadEconomica.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/categoriasActividadEconomica.plural')</span></a>
                </li> 
                <li id="entidades-ocupaciones" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('entidades.ocupaciones.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/ocupaciones.plural')</span></a>
                </li>   
                <li id="entidades-sectores" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('entidades.sectores.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/sectores.plural')</span></a>
                </li>  
                <li id="entidades-tipos-ocupacion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('entidades.tiposOcupacion.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/tiposOcupacion.plural')</span></a>
                </li> 
            </ul> 
        </li>
        <li id="entidades-entidades" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('entidades.entidades.index') }}"><i class="fa fa-circle-o"></i><span>Gestión de entidades</span></a>
        </li>
    </ul> 
</li>
<li id="formaciones" class="treeview opcion-menu menu-padre">
    <a class="app-menu__item" href="#"><i class="fa fa-graduation-cap"></i><span>Formaciones</span></a>
    <ul class="treeview-menu">
        <li id="formaciones-parametros" class="treeview opcion-menu opcion-menu-hijo">
            <a href="#"><i class="fa fa-circle-o"></i><span>Parámetros</span></a>
            <ul class="treeview-menu">
                <li id="formaciones-campos-educacion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('formaciones.camposEducacion.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/camposEducacion.plural')</span></a>
                </li>   
                <li id="formaciones-categorias-campo-educacion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('formaciones.categoriasCampoEducacion.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/categoriasCampoEducacion.plural')</span></a>
                </li>
                <li id="formaciones-niveles-formacion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('formaciones.nivelesFormacion.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/nivelesFormacion.plural')</span></a>
                </li>  
            </ul> 
        </li>       
        <li id="formaciones-formaciones" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('formaciones.formaciones.index') }}"><i class="fa fa-circle-o"></i><span>Gestión de formaciones</span></a>
        </li>           
    </ul> 
</li>
<li id="funnels" class="treeview opcion-menu menu-padre">
    <a class="app-menu__item" href="#"><i class="fa fa-filter"></i><span>Campañas</span></a>
    <ul class="treeview-menu">
                  
    </ul> 
</li>
<li id="reportes" class="opcion-menu opcion-menu-padre treeview">
    <a class="app-menu__item" href="#"><i class="fa fa-bar-chart"></i><span>Reportes</span></a>
    <ul class="treeview-menu">
                   
    </ul> 
</li>
<li id="manuales" class="opcion-menu opcion-menu-padre treeview">
    <a href="#"><i class="fa fa-book"></i><span>Manuales</span></a>
</li>
<li id="cerrar-sesion" class="opcion-menu opcion-menu-padre treeview">
    <a href="#"><i class="fa fa-sign-out"></i><span>Cerrar sesión</span></a>
</li>