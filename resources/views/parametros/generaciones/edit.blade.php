@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/generaciones.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($generacion, ['route' => ['parametros.generaciones.update', $generacion->id], 'method' => 'patch']) !!}

                        @include('parametros.generaciones.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
