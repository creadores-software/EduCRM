@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/actividadesOcio.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($actividadOcio, ['route' => ['parametros.actividadesOcio.update', $actividadOcio->id], 'method' => 'patch']) !!}

                        @include('parametros.actividades_ocio.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
