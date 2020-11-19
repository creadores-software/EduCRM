@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/nivelesFormacion.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nivelFormacion, ['route' => ['formaciones.nivelesFormacion.update', $nivelFormacion->id], 'method' => 'patch']) !!}

                        @include('formaciones.niveles_formacion.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
