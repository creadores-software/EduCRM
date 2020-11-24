@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/actitudesServicio.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($actitudServicio, ['route' => ['parametros.actitudesServicio.update', $actitudServicio->id], 'method' => 'patch']) !!}

                        @include('parametros.actitudes_servicio.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection