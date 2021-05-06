@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/pertenenciasEquipoMercadeo.singular'): {{ $nombreEquipo }}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pertenenciaEquipoMercadeo, ['route' => ['admin.pertenenciasEquipoMercadeo.update', $pertenenciaEquipoMercadeo->id], 'method' => 'patch']) !!}

                        @include('admin.pertenencias_equipo_mercadeo.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
