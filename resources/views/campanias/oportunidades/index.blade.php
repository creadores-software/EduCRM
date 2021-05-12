@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @if(!empty($contacto))
                Vista: {{$contacto->getNombreCompleto()}}
            @else
                @lang('models/oportunidades.plural'): {{$campania->nombre}}    
            @endif           
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
                            @if(!empty($contacto))
                                @include('contactos.contactos.nav_show',['idContacto' => $contacto->id,'idRelacional' => $contacto->informacion_relacional_id])    
                            @endif                    
                            @can('contactos.informacionesEscolares.crear')
                                <h1 class="pull-left">
                                    @if(!empty($contacto))
                                        <a class="btn btn-default buttons-reset btn-sm no-corner" style="margin-top: -35px;" href="{{ route('campanias.oportunidades.create',['idContacto'=>$contacto->id]) }}"><span><i class="fa fa-plus"></i> Crear</span></a>
                                    @else
                                        <a class="btn btn-default buttons-reset btn-sm no-corner" style="margin-top: -35px;" href="{{ route('campanias.oportunidades.create',['idCampania'=>$campania->id]) }}"><span><i class="fa fa-plus"></i> Crear</span></a>  
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

