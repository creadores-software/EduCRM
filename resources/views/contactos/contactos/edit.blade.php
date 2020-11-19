@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/contactos.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contacto, ['route' => ['contactos.contactos.update', $contacto->id], 'method' => 'patch']) !!}

                        @include('contactos.contactos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
