@extends('layouts.app')

@push('css')
    @include('layouts.datatables_css')
    <style>
    .box-header {
        color: #333;
        padding: 10px 0px 0px 0px;
    }
    .select2-container {
        width: 100% !important;
        padding: 0;
    }
    </style>
@endpush

@section('content')
<div class="content">
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body row"> 
            @include('dashboard.indicadores')
            @include('dashboard.actividades_hoy')
            @include('dashboard.contactos_actualizacion')     
        </div> 
        <div class="row"> 
            <a id="button-filtrar" class="btn btn-default pull-right" style="margin: 0px 25px 10px 5px;" href="#">Filtrar</a>                         
        </div>         
    </div>  
    
</div>
@include('dashboard.filtro')
@endsection

@push('scripts')    
    @include('layouts.datatables_js')     
    <script type="text/javascript">
        localStorage.removeItem('menu_abuelo_seleccionado');
        localStorage.removeItem('menu_padre_seleccionado');
        localStorage.removeItem('menu_hijo_seleccionado');        
        
        $(document).ready(function() {  
            $('#button-filtrar').on( "click", function() {
                $('#advanced_filter').modal('show');
            });  
        });
    </script>
@endpush