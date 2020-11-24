@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/preferenciasCamposEducacion.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($preferenciaCampoEducacion, ['route' => ['contactos.preferenciasCamposEducacion.update', $preferenciaCampoEducacion->id], 'method' => 'patch']) !!}

                        @include('contactos.preferencias_campos_educacion.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection