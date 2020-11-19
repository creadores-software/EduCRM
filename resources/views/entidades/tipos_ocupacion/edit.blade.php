@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/tiposOcupacion.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoOcupacion, ['route' => ['entidades.tiposOcupacion.update', $tipoOcupacion->id], 'method' => 'patch']) !!}

                        @include('entidades.tipos_ocupacion.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
