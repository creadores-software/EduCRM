@if(strpos(Session::get('textoPermisos'), 'admin.')!==false)
<li id="administracion" class="treeview opcion-menu menu-padre">
    <a class="app-menu__item" href="#"><i class="fa fa-cog"></i><span>Administración</span></a>
    <ul class="treeview-menu">  
        @if(strpos(Session::get('textoPermisos'), 'admin.equiposMercadeo.')!==false)
        <li id="equiposMercadeo" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('admin.equiposMercadeo.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/equiposMercadeo.plural')</span></a>
        </li> 
        @endif               
        @if(strpos(Session::get('textoPermisos'), 'admin.permissions.')!==false) 
        <li id="permissions" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('admin.permissions.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/permissions.plural')</span></a>
        </li> 
        @endif 
        @if(strpos(Session::get('textoPermisos'), 'admin.roles.')!==false)        
        <li id="roles" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('admin.roles.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/roles.plural')</span></a>
        </li> 
        @endif  
        @if(strpos(Session::get('textoPermisos'), 'admin.users.')!==false)
        <li id="users" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('admin.users.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/users.plural')</span></a>
        </li> 
        @endif                          
    </ul> 
</li>
@endif
@if(strpos(Session::get('textoPermisos'), 'contactos.')!==false || strpos(Session::get('textoPermisos'), 'parametros.')!==false)
<li id="contactos" class="treeview opcion-menu menu-padre">
    <a class="app-menu__item" href="#"><i class="fa fa-users"></i><span>Contactos</span></a>
    <ul class="treeview-menu">
        @if(strpos(Session::get('textoPermisos'), 'parametros.')!==false)        
        <li id="contactos-parametros-basicos" class="treeview opcion-menu menu-hijo">
            <a class="app-menu__item" href="#"><i class="fa fa-circle-o"></i><span>Parámetros Básicos</span></a>
            <ul class="treeview-menu">
                @if(strpos(Session::get('textoPermisos'), 'parametros.estadosCiviles.')!==false)        
                <li id="parametros-estados-civiles" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.estadosCiviles.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/estadosCiviles.plural')</span></a>
                </li>  
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.generos.')!==false)              
                <li id="parametros-generos" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.generos.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/generos.plural')</span></a>
                </li>
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.lugares.')!==false) 
                <li id="parametros-lugares" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.lugares.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/lugares.plural')</span></a>
                </li>      
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.prefijos.')!==false)          
                <li id="parametros-prefijos" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.prefijos.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/prefijos.plural')</span></a>
                </li> 
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.razas.')!==false)                           
                <li id="parametros-razas" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.razas.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/razas.plural')</span></a>
                </li>
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.religiones.')!==false)                           
                <li id="parametros-religiones" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.religiones.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/religiones.plural')</span></a>
                </li> 
                @endif    
                @if(strpos(Session::get('textoPermisos'), 'parametros.sisbenes.')!==false)
                <li id="sisbenes" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.sisbenes.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/sisbenes.plural')</span></a>
                </li> 
                @endif           
                @if(strpos(Session::get('textoPermisos'), 'parametros.tiposContacto.')!==false)               
                <li id="parametros-tipos-contacto" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.tiposContacto.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/tiposContacto.plural')</span></a>
                </li>
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.tiposDocumento.')!==false)               
                <li id="parametros-tipos-documento" class="treeview-item opcion-menumenu-nieto">
                    <a href="{{ route('parametros.tiposDocumento.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/tiposDocumento.plural')</span></a>
                </li>
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.tiposParentesco.')!==false)               
                <li id="parametros-tipos-parentesco" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.tiposParentesco.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/tiposParentesco.plural')</span></a>
                </li>
                @endif                
            </ul> 
        </li>  
        @endif
        @if(strpos(Session::get('textoPermisos'), 'parametros.')!==false)  
        <li id="contactos-parametros-relacionales" class="treeview opcion-menu menu-hijo">
            <a class="app-menu__item" href="#"><i class="fa fa-circle-o"></i><span>Parámetros Relacionales</span></a>
            <ul class="treeview-menu">
                @if(strpos(Session::get('textoPermisos'), 'parametros.actitudesServicio.')!==false) 
                <li id="parametros-actitudes-servicio" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.actitudesServicio.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/actitudesServicio.plural')</span></a>
                </li>
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.actividadesOcio.')!==false)     
                <li id="parametros-actividades-ocio" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.actividadesOcio.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/actividadesOcio.plural')</span></a>
                </li>  
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.beneficios.')!==false)
                <li id="parametros-beneficios" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.beneficios.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/beneficios.plural')</span></a>
                </li>    
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.buyerPersonas.')!==false)
                <li id="parametros-buyer-persona" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.buyerPersonas.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/buyerPersonas.plural')</span></a>
                </li>   
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.estadosDisposicion.')!==false)            
                <li id="parametros-estados-disposicion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.estadosDisposicion.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/estadosDisposicion.plural')</span></a>
                </li>   
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.estatusLealtad.')!==false)            
                <li id="parametros-estatus-lealtad" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.estatusLealtad.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/estatusLealtad.plural')</span></a>
                </li>
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.estatusUsuario.')!==false)            
                <li id="parametros-estatus-usuario" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.estatusUsuario.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/estatusUsuario.plural')</span></a>
                </li>
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.estilosVida.')!==false)     
                <li id="parametros-estilos-vida" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.estilosVida.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/estilosVida.plural')</span></a>
                </li>
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.frecuenciasUso.')!==false)     
                <li id="parametros-frecuencias-uso" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.frecuenciasUso.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/frecuenciasUso.plural')</span></a>
                </li>
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.generaciones.')!==false)     
                <li id="parametros-generaciones" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.generaciones.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/generaciones.plural')</span></a>
                </li>     
                @endif  
                @if(strpos(Session::get('textoPermisos'), 'parametros.mediosComunicacion.')!==false)             
                <li id="parametros-medios-comunicacion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.mediosComunicacion.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/mediosComunicacion.plural')</span></a>
                </li>
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.origenes.')!==false)             
                <li id="parametros-origenes" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.origenes.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/origenes.plural')</span></a>
                </li> 
                @endif
                @if(strpos(Session::get('textoPermisos'), 'parametros.personalidades.')!==false)                  
                <li id="parametros-personalidades" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('parametros.personalidades.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/personalidades.plural')</span></a>
                </li>  
                @endif 
            </ul> 
        </li>
        @endif
        @if(strpos(Session::get('textoPermisos'), 'contactos.contactos')!==false) 
        <li id="contactos-contactos" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('contactos.contactos.index') }}"><i class="fa fa-circle-o"></i><span>Gestión de Contactos</span></a>
        </li>
        @endif
        @if(strpos(Session::get('textoPermisos'), 'contactos.segmentos')!==false) 
        <li id="contactos-segmentos" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('contactos.segmentos.index') }}"><i class="fa fa-circle-o"></i><span>Gestión de Segmentos</span></a>
        </li>        
        @endif                 
    </ul> 
</li>
@endif
@if(strpos(Session::get('textoPermisos'), 'entidades.')!==false)
<li id="entidades" class="treeview opcion-menu menu-padre">
    <a class="app-menu__item" href="#"><i class="fa fa-building"></i><span>Entidades</span></a>
    <ul class="treeview-menu">        
        <li id="entidades-parametros" class="treeview opcion-menu menu-hijo">
            <a  class="app-menu__item" href="#"><i class="fa fa-circle-o"></i><span>Parámetros</span></a>
            <ul class="treeview-menu">
                @if(strpos(Session::get('textoPermisos'), 'entidades.actividadesEconomicas.')!==false)
                <li id="entidades-actividades-economicas" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('entidades.actividadesEconomicas.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/actividadesEconomicas.plural')</span></a>
                </li>  
                @endif
                @if(strpos(Session::get('textoPermisos'), 'entidades.categoriasActividadEconomica.')!==false)
                <li id="entidades-categorias-actividad-economica" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('entidades.categoriasActividadEconomica.index') }}"><i class="fa fa-circle-o"></i><span>Categorías Actividad<br>Económica</span></a>
                </li> 
                @endif
                @if(strpos(Session::get('textoPermisos'), 'entidades.ocupaciones.')!==false)
                <li id="entidades-ocupaciones" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('entidades.ocupaciones.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/ocupaciones.plural')</span></a>
                </li>   
                @endif
                @if(strpos(Session::get('textoPermisos'), 'entidades.sectores.')!==false)
                <li id="entidades-sectores" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('entidades.sectores.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/sectores.plural')</span></a>
                </li>
                @endif
                @if(strpos(Session::get('textoPermisos'), 'entidades.tiposOcupacion.')!==false)  
                <li id="entidades-tipos-ocupacion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('entidades.tiposOcupacion.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/tiposOcupacion.plural')</span></a>
                </li> 
                @endif
            </ul> 
        </li>
        @if(strpos(Session::get('textoPermisos'), 'entidades.entidades.')!==false)  
        <li id="entidades-entidades" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('entidades.entidades.index') }}"><i class="fa fa-circle-o"></i><span>Gestión de entidades</span></a>
        </li>
        @endif
    </ul> 
</li>
@endif
@if(strpos(Session::get('textoPermisos'), 'formaciones.')!==false)  
<li id="formaciones" class="treeview opcion-menu menu-padre">
    <a class="app-menu__item" href="#"><i class="fa fa-graduation-cap"></i><span>Formaciones</span></a>
    <ul class="treeview-menu">
        <li id="formaciones-parametros" class="treeview opcion-menu opcion-menu-hijo">
            <a href="#"><i class="fa fa-circle-o"></i><span>Parámetros</span></a>
            <ul class="treeview-menu">
                @if(strpos(Session::get('textoPermisos'), 'formaciones.camposEducacion.')!==false)  
                <li id="formaciones-campos-educacion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('formaciones.camposEducacion.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/camposEducacion.plural')</span></a>
                </li>  
                @endif
                @if(strpos(Session::get('textoPermisos'), 'formaciones.categoriasCampoEducacion.')!==false)   
                <li id="formaciones-categorias-campo-educacion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('formaciones.categoriasCampoEducacion.index') }}"><i class="fa fa-circle-o"></i><span>Categorías Campo<br>Educación</span></a>
                </li>
                @endif
                @if(strpos(Session::get('textoPermisos'), 'formaciones.facultades.')!==false)   
                <li id="formaciones-facultades" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('formaciones.facultades.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/facultades.plural')</span></a>
                </li>
                @endif
                @if(strpos(Session::get('textoPermisos'), 'formaciones.jornadas.')!==false)
                <li id="jornadas" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('formaciones.jornadas.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/jornadas.plural')</span></a>
                </li> 
                @endif
                @if(strpos(Session::get('textoPermisos'), 'formaciones.modalidades.')!==false)   
                <li id="formaciones-modalidades" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('formaciones.modalidades.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/modalidades.plural')</span></a>
                </li>
                @endif
                @if(strpos(Session::get('textoPermisos'), 'formaciones.nivelesAcademicos.')!==false)   
                <li id="formaciones-niveles-academicos" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('formaciones.nivelesAcademicos.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/nivelesAcademicos.plural')</span></a>
                </li>  
                @endif
                @if(strpos(Session::get('textoPermisos'), 'formaciones.nivelesFormacion.')!==false)   
                <li id="formaciones-niveles-formacion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('formaciones.nivelesFormacion.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/nivelesFormacion.plural')</span></a>
                </li>  
                @endif
                @if(strpos(Session::get('textoPermisos'), 'formaciones.periodicidades.')!==false) 
                <li id="formaciones-periodicidades" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('formaciones.periodicidades.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/periodicidades.plural')</span></a>
                </li>  
                @endif
                @if(strpos(Session::get('textoPermisos'), 'formaciones.periodosAcademico.')!==false)
                <li id="periodosAcademico" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('formaciones.periodosAcademico.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/periodosAcademico.plural')</span></a>
                </li> 
                @endif
                @if(strpos(Session::get('textoPermisos'), 'formaciones.reconocimientos.')!==false) 
                <li id="formaciones-reconocimientos" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('formaciones.reconocimientos.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/reconocimientos.plural')</span></a>
                </li> 
                @endif
                @if(strpos(Session::get('textoPermisos'), 'formaciones.tiposAcceso.')!==false)  
                <li id="formaciones-tipos-acceso" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('formaciones.tiposAcceso.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/tiposAcceso.plural')</span></a>
                </li>  
                @endif   
            </ul> 
        </li>    
        @if(strpos(Session::get('textoPermisos'), 'formaciones.formaciones.')!==false)     
        <li id="formaciones-formaciones" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('formaciones.formaciones.index') }}"><i class="fa fa-circle-o"></i><span>Gestión de formaciones</span></a>
        </li>           
        @endif
    </ul> 
</li>
@endif
@if(strpos(Session::get('textoPermisos'), 'campanias.')!==false)
<li id="campanias" class="treeview opcion-menu menu-padre">
    <a class="app-menu__item" href="#"><i class="fa fa-filter"></i><span>Campañas</span></a>
    <ul class="treeview-menu">
        <li id="campania-parametros" class="treeview opcion-menu opcion-menu-hijo">
            <a href="#"><i class="fa fa-circle-o"></i><span>Parámetros</span></a>
            <ul class="treeview-menu">
                @if(strpos(Session::get('textoPermisos'), 'campanias.categoriasOportunidad.')!==false)
                <li id="categoriasOportunidad" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('campanias.categoriasOportunidad.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/categoriasOportunidad.plural')</span></a>
                </li> 
                @endif
                @if(strpos(Session::get('textoPermisos'), 'campanias.estadosCampania.')!==false)
                <li id="estadosCampania" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('campanias.estadosCampania.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/estadosCampania.plural')</span></a>
                </li> 
                @endif
                @if(strpos(Session::get('textoPermisos'), 'campanias.estadosInteraccion.')!==false)
                <li id="estadosInteraccion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('campanias.estadosInteraccion.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/estadosInteraccion.plural')</span></a>
                </li> 
                @endif    
                @if(strpos(Session::get('textoPermisos'), 'campanias.matricesGestion.')!==false)
                <li id="matricesGestion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('campanias.matricesGestion.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/matricesGestion.plural')</span></a>
                </li> 
                @endif               
                @if(strpos(Session::get('textoPermisos'), 'campanias.tiposCampania.')!==false)
                <li id="tiposCampania" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('campanias.tiposCampania.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/tiposCampania.plural')</span></a>
                </li> 
                @endif                
                @if(strpos(Session::get('textoPermisos'), 'campanias.tiposEstadoColor.')!==false)
                <li id="tiposEstadoColor" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('campanias.tiposEstadoColor.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/tiposEstadoColor.plural')</span></a>
                </li> 
                @endif
                @if(strpos(Session::get('textoPermisos'), 'campanias.tiposInteraccion.')!==false)
                <li id="tiposInteraccion" class="treeview-item opcion-menu menu-nieto">
                    <a href="{{ route('campanias.tiposInteraccion.index') }}"><i class="fa fa-circle-o"></i><span>@lang('models/tiposInteraccion.plural')</span></a>
                </li> 
                @endif                 
            </ul>
        </li>
        @if(strpos(Session::get('textoPermisos'), 'campanias.campanias.')!==false)
        <li id="campanias-campanias" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('campanias.campanias.index') }}"><i class="fa fa-circle-o"></i><span>Gestión de Campañas</span></a>
        </li> 
        @endif
    </ul> 
</li>
@endif
<li id="reportes" class="opcion-menu opcion-menu-padre treeview">
    <a class="app-menu__item" href="#"><i class="fa fa-bar-chart"></i><span>Reportes</span></a>
    <ul class="treeview-menu">  
        <li id="reporte-funnel" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('reportes.funnel') }}"><i class="fa fa-circle-o"></i><span>Funnel de venta</span></a>
        </li>  
        <li id="reporte-interacciones" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('reportes.interacciones') }}"><i class="fa fa-circle-o"></i><span>Interacciones por estado</span></a>
        </li> 
        <li id="dashboar" class="treeview-item opcion-menu menu-hijo">
            <a href="{{ route('reportes.dashboard') }}"><i class="fa fa-circle-o"></i><span>Dashboard</span></a>
        </li>               
    </ul> 
</li>
<li id="manuales" class="opcion-menu opcion-menu-padre treeview">
    <a href="#"><i class="fa fa-book"></i><span>Manual</span></a>
</li>
<li id="cerrar-sesion" class="opcion-menu opcion-menu-padre treeview">
    <a href="#"><i class="fa fa-sign-out"></i><span>Cerrar sesión</span></a>
</li>