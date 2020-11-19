@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/categoriasCampoEducacion.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($categoriaCampoEducacion, ['route' => ['formaciones.categoriasCampoEducacion.update', $categoriaCampoEducacion->id], 'method' => 'patch']) !!}

                        @include('formaciones.categorias_campo_educacion.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
