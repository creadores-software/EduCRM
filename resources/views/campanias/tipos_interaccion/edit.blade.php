@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/tiposInteraccion.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoInteraccion, ['route' => ['campanias.tiposInteraccion.update', $tipoInteraccion->id], 'method' => 'patch']) !!}

                        @include('campanias.tipos_interaccion.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
