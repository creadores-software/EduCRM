@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/estadosCampania.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estadoCampania, ['route' => ['campanias.estadosCampania.update', $estadoCampania->id], 'method' => 'patch']) !!}

                        @include('campanias.estados_campania.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
