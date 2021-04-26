@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/periodosAcademico.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($periodoAcademico, ['route' => ['formaciones.periodosAcademico.update', $periodoAcademico->id], 'method' => 'patch']) !!}

                        @include('formaciones.periodos_academico.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
