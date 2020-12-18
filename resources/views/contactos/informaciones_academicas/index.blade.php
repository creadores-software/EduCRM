@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            @lang('models/informacionesAcademicas.plural')
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
                            <div class="tab-content">                                
                                @include('contactos.informaciones_academicas.table')   
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

