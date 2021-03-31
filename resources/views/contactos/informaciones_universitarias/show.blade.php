@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vista: {{$contacto->getNombreCompleto()}}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            @include('contactos.contactos.nav_show',['idContacto' => $contacto->id,'idRelacional' => $contacto->informacion_relacional_id])                          
                            <div class="tab-content">
                                <h2 class="pull-right">                                    
                                    <a href="{{ route('contactos.informacionesUniversitarias.edit',[$informacionUniversitaria->id,'idContacto'=>$contacto->id]) }}" class="btn btn-primary">
                                        @lang('crud.edit')
                                    </a>  
                                    <a href="{{ route('contactos.informacionesUniversitarias.index',['idContacto'=>$contacto->id]) }}" class="btn btn-default">
                                        @lang('crud.back')
                                    </a> 
                                </h2>      
                                <h2 class="page-header">Datos</h2> 
                                @include('contactos.informaciones_universitarias.show_fields')                                                              
                                @include('layouts.audit')    
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
@endsection