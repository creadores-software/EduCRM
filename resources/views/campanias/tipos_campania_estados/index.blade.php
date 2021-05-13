@extends('layouts.app')

@push('css')
<style> 
div.dataTables_wrapper div.dataTables_filter {
    float: right;
    text-align: right;
    visibility: hidden;
}
</style> 
@endpush

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            @lang('models/tiposCampaniaEstados.plural'): {{ $nombreTipo}}
        </h1>
        @can('campanias.tiposCampaniaEstados.crear')
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin: -10px 5px 0px 5px;" href="{{ route('campanias.tiposCampaniaEstados.create',['idTipo'=>$idTipo]) }}">@lang('crud.add_new')</a>
        </h1>
        @endcan
        <h1 class="pull-right">
            <a class="btn btn-default pull-right" style="margin: -10px 5px 0px 5px;" href="{{ route('campanias.tiposCampania.index') }}">@lang('crud.back')</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('campanias.tipos_campania_estados.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection
