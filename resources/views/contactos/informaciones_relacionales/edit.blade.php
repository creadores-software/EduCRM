@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edición: {{$informacionRelacional->contacto->getNombreCompleto()}}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            @include('contactos.contactos.nav_edit',['idContacto' => $informacionRelacional->contacto->id,'idRelacional' => $informacionRelacional->id])                          
                            <div class="tab-content">
                                <div class="tab-pane fade in active">
                                    {!! Form::model($informacionRelacional, ['route' => ['contactos.informacionesRelacionales.update', $informacionRelacional->id], 'method' => 'patch']) !!}
                                            @include('contactos.informaciones_relacionales.fields')
                                    {!! Form::close() !!}
                                </div>                               
                            </div>
                        </div>
                    </div>                   
               </div>
           </div>
       </div>
   </div>
@endsection
