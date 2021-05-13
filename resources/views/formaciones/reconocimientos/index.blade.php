@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            @lang('models/reconocimientos.plural')
        </h1>
        @can('formaciones.reconocimientos.crear')
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin: -10px 5px 0px 5px;" href="{{ route('formaciones.reconocimientos.create') }}">@lang('crud.add_new')</a>
        </h1>
        @endcan
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('formaciones.reconocimientos.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

