@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/estadosDisposicion.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estadoDisposicion, ['route' => ['parametros.estadosDisposicion.update', $estadoDisposicion->id], 'method' => 'patch']) !!}

                        @include('parametros.estados_disposicion.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection