@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/interacciones.singular'): {{$oportunidad->contacto->getNombreCompleto()}} ({{$oportunidad->estadoCampania->nombre}}) 
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                                       
                   {!! Form::model($interaccion, ['route' => ['campanias.interacciones.update', $interaccion->id], 'method' => 'patch']) !!}

                        @include('campanias.interacciones.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
