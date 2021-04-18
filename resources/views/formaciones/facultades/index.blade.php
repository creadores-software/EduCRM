@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            @lang('models/facultades.plural')
        </h1>
        @can('formaciones.facultades.crear')
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('formaciones.facultades.create') }}">@lang('crud.add_new')</a>
        </h1>
        @endcan
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('formaciones.facultades.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

