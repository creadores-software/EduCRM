@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/informacionesLaborales.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($informacionLaboral, ['route' => ['contactos.informacionesLaborales.update', $informacionLaboral->id], 'method' => 'patch']) !!}

                        @include('contactos.informaciones_laborales.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
