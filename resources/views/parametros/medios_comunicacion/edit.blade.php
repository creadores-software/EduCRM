@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/mediosComunicacion.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($medioComunicacion, ['route' => ['parametros.mediosComunicacion.update', $medioComunicacion->id], 'method' => 'patch']) !!}

                        @include('parametros.medios_comunicacion.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
