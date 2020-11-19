@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/contactosTipoContacto.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contactoTipoContacto, ['route' => ['contactos.contactosTipoContacto.update', $contactoTipoContacto->id], 'method' => 'patch']) !!}

                        @include('contactos.contactos_tipo_contacto.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
