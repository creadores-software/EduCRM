@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/sisbenes.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sisben, ['route' => ['parametros.sisbenes.update', $sisben->id], 'method' => 'patch']) !!}

                        @include('parametros.sisbenes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
