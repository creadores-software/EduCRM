@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/ocupaciones.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ocupacion, ['route' => ['entidades.ocupaciones.update', $ocupacion->id], 'method' => 'patch']) !!}

                        @include('entidades.ocupaciones.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
