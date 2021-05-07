@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/justificacionesEstadoCampania.singular'): {{ $nombreEstado}}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($justificacionEstadoCampania, ['route' => ['campanias.justificacionesEstadoCampania.update', $justificacionEstadoCampania->id], 'method' => 'patch']) !!}

                        @include('campanias.justificaciones_estado_campania.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
