<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRM UAM</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-toggle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/css/AdminLTE_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="/css/iCheck_all.css">

    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/select2-bootstrap.min.css">    

    <!-- Ionicons -->
    <link rel="stylesheet" href="/css/ionicons.min.css">
    <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">

    @stack('css')

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

        .location-pre:after {
		    content: ' >> ';
        }
        .location-pre {
            padding-right: 3px;
            cursor: pointer;
        }

        tfoot input {
            width: 100%;
            font-weight: normal;
        }

        .nav-tabs-custom{
            box-shadow: none;
        }

        .select2-results__option[aria-selected=true] {
            display: none;
        }

        .content-header > h1.pull-left  {
            margin-bottom: 12px;
        }

        .mytooltip {
            display: inline;
            position: relative;
            text-align: unset;
        }

        .mytooltip:hover:after {
            font-size: 1rem;
            background: #333;
            background: rgba(0, 0, 0, .8);
            border-radius: 5px;
            bottom: -34px;
            color: #fff;
            content: attr(gloss);
            left: 20%;
            padding: 5px 15px;
            position: absolute;
            z-index: 98;
            width: 80px;
        }

        .mytooltip:hover:before {
            border: solid;
            border-color: #333 transparent;
            border-width: 0 6px 6px 6px;
            bottom: -4px;
            content: "";
            left: 50%;
            position: absolute;
            z-index: 99;
        }

        .alert-info{
            color:#31708f !important; 
            background-color:#d9edf7 !important;
            border-color:#bce8f1 !important;
        }

        form .required label:after {
            color: #e32;
            content: ' *';
            display:inline;
            font-weight: bold;
        }
        
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
</head>

<body class="skin-blue-light sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="/" class="logo brand-link" style="text-align: left; padding:0;">
                <img style="width: auto" src="/logo.png" alt="CRM UAM" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span> CRM <b>UAM</b></span>
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
                                <i class="fa fa-user"></i><span class="hidden-xs">{{ !empty(Auth::user())? Auth::user()->name:'' }}</span>
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
            <strong>Copyright © 2020 <a href="#">CRM UAM</a>.</strong> Todos los derechos reservados.
        </footer>

    </div>

    <!-- jQuery 3.1.1 -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/moment_es.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/js/bootstrap-toggle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/js/adminlte.min.js"></script>
    <script src="/js/icheck.min.js"></script> 
    <!-- Select2 -->
    <script src="/js/select2.min.js"></script>
    <script src="/js/select2_es.js"></script>
    <!-- Buscador del menú -->    
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('.mytt').tooltip();
            $.fn.select2.defaults.set('language', 'es');
            $.fn.select2.defaults.set( "theme", "bootstrap" );
            $("#buscador_menu").keyup(function () {
                var filter = $(this).val();
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
            $(".sidebar-menu li").click(function (e) {                
                if ($(this).attr('class') && $(this).attr('class').indexOf('menu-padre') != -1) {
                    localStorage.setItem('menu_padre_seleccionado', $(this).attr('id'));
                } else if ($(this).attr('class') && $(this).attr('class').indexOf('menu-hijo') != -1) {
                    localStorage.setItem('menu_hijo_seleccionado', $(this).attr('id'));
                } else if ($(this).attr('class') && $(this).attr('class').indexOf('menu-nieto') != -1) {
                    localStorage.setItem('menu_nieto_seleccionado', $(this).attr('id'));
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