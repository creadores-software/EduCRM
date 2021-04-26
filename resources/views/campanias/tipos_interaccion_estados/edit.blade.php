@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/tiposInteraccionEstados.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoInteraccionEstados, ['route' => ['campanias.tiposInteraccionEstados.update', $tipoInteraccionEstados->id], 'method' => 'patch']) !!}

                        @include('campanias.tipos_interaccion_estados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
