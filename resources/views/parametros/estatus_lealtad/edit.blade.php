@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/estatusLealtad.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estatusLealtad, ['route' => ['parametros.estatusLealtad.update', $estatusLealtad->id], 'method' => 'patch']) !!}

                        @include('parametros.estatus_lealtad.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
