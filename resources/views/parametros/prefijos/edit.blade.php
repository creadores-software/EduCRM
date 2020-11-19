@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/prefijos.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($prefijo, ['route' => ['parametros.prefijos.update', $prefijo->id], 'method' => 'patch']) !!}

                        @include('parametros.prefijos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
