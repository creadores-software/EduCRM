@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/estadosCiviles.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estadoCivil, ['route' => ['parametros.estadosCiviles.update', $estadoCivil->id], 'method' => 'patch']) !!}

                        @include('parametros.estados_civiles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
