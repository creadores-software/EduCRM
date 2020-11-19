@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/generos.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($genero, ['route' => ['parametros.generos.update', $genero->id], 'method' => 'patch']) !!}

                        @include('parametros.generos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
