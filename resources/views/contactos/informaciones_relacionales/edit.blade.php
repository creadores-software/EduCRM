@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/informacionesRelacionales.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($informacionRelacional, ['route' => ['contactos.informacionesRelacionales.update', $informacionRelacional->id], 'method' => 'patch']) !!}

                        @include('contactos.informaciones_relacionales.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
