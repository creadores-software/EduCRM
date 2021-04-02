@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/tiposAcceso.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoAcceso, ['route' => ['formaciones.tiposAcceso.update', $tipoAcceso->id], 'method' => 'patch']) !!}

                        @include('formaciones.tipos_acceso.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
