@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/tiposCampaniaEstados.singular'): {{ $nombreTipo}}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoCampaniaEstados, ['route' => ['campanias.tiposCampaniaEstados.update', $tipoCampaniaEstados->id], 'method' => 'patch']) !!}

                        @include('campanias.tipos_campania_estados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
