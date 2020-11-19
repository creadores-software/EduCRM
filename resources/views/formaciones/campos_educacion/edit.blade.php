@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/camposEducacion.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($campoEducacion, ['route' => ['formaciones.camposEducacion.update', $campoEducacion->id], 'method' => 'patch']) !!}

                        @include('formaciones.campos_educacion.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
