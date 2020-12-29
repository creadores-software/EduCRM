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
        <h1>
            Vista: {{$contacto->getNombreCompleto()}}
        </h1>
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
                            @include('contactos.contactos.nav_show',['idContacto' => $contacto->id,'idRelacional' => $contacto->informacion_relacional_id])                          
                            <h1 class="pull-left">
                                <a class="btn btn-default buttons-reset btn-sm no-corner" style="margin-top: -35px;" href="{{ route('contactos.informacionesAcademicas.create',['idContacto'=>$idContacto]) }}"><span><i class="fa fa-plus"></i> Crear</span></a>
                             </h1>                             
                            <div class="tab-content">                                
                                @include('contactos.informaciones_academicas.table')   
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
@endsection

