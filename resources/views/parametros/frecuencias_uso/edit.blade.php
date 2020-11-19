@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/frecuenciasUso.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($frecuenciaUso, ['route' => ['parametros.frecuenciasUso.update', $frecuenciaUso->id], 'method' => 'patch']) !!}

                        @include('parametros.frecuencias_uso.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
