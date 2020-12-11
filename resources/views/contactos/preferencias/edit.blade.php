@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edición: {{$contacto->getNombreCompleto()}}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            @include('contactos.contactos.nav_edit',['idContacto' => $contacto->id,'idRelacional' => $contacto->informacionRelacional->id])                          
                            <div class="tab-content">
                                <div class="tab-pane fade in active">                                   
                                </div>                               
                            </div>
                        </div>
                    </div>                   
               </div>
           </div>
       </div>
   </div>
@endsection
