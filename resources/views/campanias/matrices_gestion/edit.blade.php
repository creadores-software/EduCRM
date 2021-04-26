@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/matricesGestion.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($matrizGestion, ['route' => ['campanias.matricesGestion.update', $matrizGestion->id], 'method' => 'patch']) !!}

                        @include('campanias.matrices_gestion.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
