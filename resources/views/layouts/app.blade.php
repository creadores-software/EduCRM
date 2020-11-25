<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRM IES</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">    

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    @yield('css')

    <style>  
        .brand-link .brand-image {
            float: left;
            line-height: .8;
            margin-left: .8rem;
            margin-right: .5rem;
            margin-top: 10px;
            max-height: 33px;
            width: auto;
        }
        .menu-abierto {
            display: block;
        } 

        menu .treeview-menu > li.active > a, .skin-blue-light .sidebar-menu .treeview-menu > li > a:hover {
            background: #e3dddc;
            text-decoration: none;
            color: #555452;
        }

        .skin-blue-light .sidebar-menu .treeview-menu > li.active > a, .skin-blue-light .sidebar-menu .treeview-menu > li > a:hover{
            background: #e3dddc;
            text-decoration: none;
            color: #555452;
        }

        .skin-blue-light .sidebar-menu > li:hover > a, .skin-blue-light .sidebar-menu > li.active > a{
            border-left-color: #0696f5;
            text-decoration: none;
            color: #555452;    
        }

        .skin-blue-light .sidebar-menu .treeview-menu>li>a span { 
            word-wrap:break-word !important; 
        }
    </style>
    
</head>

<body class="skin-blue-light sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="/" class="logo brand-link" style="text-align: left; padding:0;">
                <img style="width: auto" src="/logo.png" alt="CRM IES" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span> CRM <b>IES</b></span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i><span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu" style="width:100px">                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Cerrar sesión
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2020 <a href="#">CRM IES</a>.</strong> Todos los derechos reservados.
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- jQuery 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>    
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/i18n/es.js"></script>
    <!-- Buscador del menú -->    
    <script type="text/javascript">
        $(document).ready(function () {
            $.fn.select2.defaults.set('language', 'es');
            $.fn.select2.defaults.set( "theme", "bootstrap" );
            $("#buscador_menu").keyup(function () {
                var filter = $(this).val(),
                        count = 0;
                $(".opcion-menu").each(function () {
                    if (filter == "") {
                        $(this).css("visibility", "visible");
                        $(this).fadeIn();
                        $(this).parent().parent().removeClass('menu-abierto');
                        $(this).parent().removeClass('menu-abierto');
                    } else if ($(this).find('a').find('span').text().search(new RegExp(filter, "i")) < 0) {
                        $(this).css("visibility", "hidden");
                        $(this).fadeOut();
                    } else {
                        $(this).css("visibility", "visible");
                        $(this).fadeIn();
                        $(this).parent().parent().addClass('menu-abierto');
                        $(this).parent().addClass('menu-abierto');
                    }
                });
            });
            $('[data-toggle="popover"]').popover();
            $("li").click(function (e) {                
                if ($(this).attr('class') && $(this).attr('class').indexOf('menu-padre') != -1) {
                    localStorage.setItem('menu_padre_seleccionado', $(this).attr('id'));
                } else if ($(this).attr('class') && $(this).attr('class').indexOf('menu-hijo') != -1) {
                    localStorage.setItem('menu_hijo_seleccionado', $(this).attr('id'));
                } else if ($(this).attr('class') && $(this).attr('class').indexOf('menu-nieto') != -1) {
                    localStorage.setItem('menu_nieto_seleccionado', $(this).attr('id'));
                } else {                    
                    localStorage.removeItem('menu_padre_seleccionado');
                    localStorage.removeItem('menu_hijo_seleccionado');
                    localStorage.removeItem('menu_nieto_seleccionado');
                }
            });
            var menu_padre_seleccionado = localStorage.getItem('menu_padre_seleccionado');
            var menu_hijo_seleccionado = localStorage.getItem('menu_hijo_seleccionado');
            var menu_nieto_seleccionado = localStorage.getItem('menu_nieto_seleccionado');
            if (menu_padre_seleccionado) {
                $('#' + menu_padre_seleccionado).children('ul').addClass('menu-abierto');
                $('#' + menu_padre_seleccionado).addClass('active');
            }
            if (menu_hijo_seleccionado) {
                $('#' + menu_hijo_seleccionado).children('ul').addClass('menu-abierto');
                $('#' + menu_hijo_seleccionado).addClass('active');
            }
            if (menu_nieto_seleccionado){
                $('#' + menu_nieto_seleccionado).addClass('active');
            }
        });
    </script>    
    @stack('scripts')
</body>
</html>