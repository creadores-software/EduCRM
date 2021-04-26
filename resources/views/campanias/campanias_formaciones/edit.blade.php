@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/campaniasFormaciones.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($campaniaFormaciones, ['route' => ['campanias.campaniasFormaciones.update', $campaniaFormaciones->id], 'method' => 'patch']) !!}

                        @include('campanias.campanias_formaciones.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
