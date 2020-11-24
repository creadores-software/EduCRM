@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/informacionesAcademicas.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($informacionAcademica, ['route' => ['contactos.informacionesAcademicas.update', $informacionAcademica->id], 'method' => 'patch']) !!}

                        @include('contactos.informaciones_academicas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection