@extends('layouts.app')

@push('css')
    @include('layouts.datatables_css')
    <style>
    .box-header {
        color: #333;
        padding: 10px 0px 0px 0px;
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
            <a class="btn btn-default pull-right" style="margin: 0px 25px 10px 5px;" href="{{ route('contactos.contactos.create') }}">Filtrar</a>                         
        </div>         
    </div>  
    
</div>
@include('dashboard.filtro')
@endsection

@push('scripts')
    @include('layouts.datatables_js')
    <script src="/js/funnel/chart.funnel.bundled.js"></script>
    
    <script type="text/javascript">
    localStorage.removeItem('menu_abuelo_seleccionado');
    localStorage.removeItem('menu_padre_seleccionado');
    localStorage.removeItem('menu_hijo_seleccionado');
        
    window.onload = function() {        
        $('#contactosActualizacion').DataTable({
            "searching": false,
            "lengthChange": false,
            "pageLength": 3,
            "pagingType": "simple",
            "language": {
                info: "Mostrando de _START_ hasta el _END_ de _TOTAL_ registros",
                infoEmpty:  "Total registros: 0",                
                paginate: {
                    first:      "Prim.",
                    previous:   "«",
                    next:       "»",
                    last:       "Ult."
                },
            },
        });
        $('#campaniasAbiertas').DataTable({
            "searching": false,
            "lengthChange": false,
            "pageLength": 3,
            "pagingType": "simple",
            "language": {
                info: "Mostrando de _START_ hasta el _END_ de _TOTAL_ registros",
                infoEmpty:  "Total registros: 0",                
                paginate: {
                    first:      "Prim.",
                    previous:   "«",
                    next:       "»",
                    last:       "Ult."
                },
            },
        });
        $('#campania_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("campanias.campanias.dataAjax") }}',
                    dataType: 'json',
                },
            });
        };
        $('#responsable_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("admin.users.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                       //La campaña determinará los equipos
                       campania = $("[name='campania_id']").val();
                       return {
                            q: params.term, 
                            page: params.page || 1,
                            campania: campania,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.results,
                            pagination: {
                                more: data.more
                            }
                        };
                    }
                },
            });
    </script>
@endpush