@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vista: {{$informacionRelacional->contacto->getNombreCompleto()}}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            @include('contactos.contactos.nav_show',['idContacto' => $informacionRelacional->contacto->id,'idRelacional' => $informacionRelacional->id])                          
                            <div class="tab-content">
                                <h2 class="pull-right">
                                    <a href="{{ route('contactos.informacionesRelacionales.edit',$informacionRelacional->id) }}" class="btn btn-primary">
                                        @lang('crud.edit')
                                    </a>  
                                    <a href="{{ route('contactos.contactos.index') }}" class="btn btn-default">
                                        @lang('crud.back')
                                    </a> 
                                </h2>      
                                <h2 class="page-header">Datos</h2> 
                                @include('contactos.informaciones_relacionales.show_fields')
                                @include('layouts.audit')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
