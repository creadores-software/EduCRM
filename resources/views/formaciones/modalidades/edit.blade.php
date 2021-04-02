@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/modalidades.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($modalidad, ['route' => ['formaciones.modalidades.update', $modalidad->id], 'method' => 'patch']) !!}

                        @include('formaciones.modalidades.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
