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
        @if(!empty($contacto))
            <h1>Vista: {{$contacto->getNombreCompleto()}}</h1>
        @else
            <h1 class="pull-left">
                @lang('models/oportunidades.plural'): {{$campania->nombre}}    
            </h1>
            @can('campanias.oportunidades.crear')
                <h1 class="pull-right">
                    <a class="btn btn-primary pull-right" style="margin: -10px 5px 0px 5px;" href="{{ route('campanias.oportunidades.create',['idCampania'=>$campania->id]) }}">@lang('crud.add_new')</a>
                </h1>
            @endcan
            <h1 class="pull-right">                
                <a class="btn btn-success pull-right" style="margin: -10px 5px 0px 5px;" href="{{ route('campanias.campanias.index') }}">Importar</a>
                <a class="btn btn-success pull-right" style="margin: -10px 5px 0px 5px;" href="{{ route('campanias.campanias.index') }}">Sincronizar</a>
                <a class="btn btn-default pull-right" style="margin: -10px 5px 0px 5px;" href="{{ route('campanias.campanias.index') }}">@lang('crud.back')</a>
            </h1>
        @endif 
</section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="nav-tabs-custom">
                            @if(!empty($contacto))
                                @include('contactos.contactos.nav_show',['idContacto' => $contacto->id,'idRelacional' => $contacto->informacion_relacional_id])    
                            @endif                    
                            @can('campanias.oportunidades.crear')
                                <h1 class="pull-left">
                                    @if(!empty($contacto))
                                        <a class="btn btn-default buttons-reset btn-sm no-corner" style="margin-top: -35px;" href="{{ route('campanias.oportunidades.create',['idContacto'=>$contacto->id]) }}"><span><i class="fa fa-plus"></i> Crear</span></a>
                                    @endif
                                </h1> 
                            @endcan                            
                            <div class="tab-content">                                
                                @include('campanias.oportunidades.table')   
                            </div>
                        </div>
                    </div>
               </div>                
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

