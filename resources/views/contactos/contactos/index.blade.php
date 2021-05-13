@extends('layouts.app')

@push('css')
<style> 
div.dataTables_wrapper div.dataTables_filter {
    float: right;
    text-align: right;
    visibility: hidden;
}
.select2-container {
    width: 100% !important;
    padding: 0;
}
</style> 
@endpush

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            @lang('models/contactos.plural')
        </h1>
        @can('contactos.contactos.crear')
        <h1 class="pull-right">            
           <a class="btn btn-primary pull-right" style="margin: -10px 5px 0px 5px;" href="{{ route('contactos.contactos.create') }}">@lang('crud.add_new')</a>           
        </h1>
        @endcan
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">            
            <div class="box-body">   
                @include('contactos.contactos.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
    @include('contactos.advanced_filter.index')
   
@endsection

@push('scripts')
@endpush

