@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/actividadesEconómicas.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($actividadEconomica, ['route' => ['entidades.actividadesEconómicas.update', $actividadEconomica->id], 'method' => 'patch']) !!}

                        @include('entidades.actividades_económicas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
