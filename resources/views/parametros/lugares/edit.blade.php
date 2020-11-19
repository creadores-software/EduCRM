@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/lugares.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($lugar, ['route' => ['parametros.lugares.update', $lugar->id], 'method' => 'patch']) !!}

                        @include('parametros.lugares.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
