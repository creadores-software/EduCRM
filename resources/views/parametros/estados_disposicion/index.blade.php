@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            @lang('models/estadosDisposicion.plural')
        </h1>
        @can('parametros.estadosDisposicion.crear')
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin: -10px 5px 0px 5px;" href="{{ route('parametros.estadosDisposicion.create') }}">@lang('crud.add_new')</a>
        </h1>
        @endcan
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('parametros.estados_disposicion.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

