@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/nivelesAcademicos.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nivelAcademico, ['route' => ['formaciones.nivelesAcademicos.update', $nivelAcademico->id], 'method' => 'patch']) !!}

                        @include('formaciones.niveles_academicos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
