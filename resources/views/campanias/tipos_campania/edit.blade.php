@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/tiposCampania.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoCampania, ['route' => ['campanias.tiposCampania.update', $tipoCampania->id], 'method' => 'patch']) !!}

                        @include('campanias.tipos_campania.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
