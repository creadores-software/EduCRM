@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/tiposParentesco.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoParentesco, ['route' => ['parametros.tiposParentesco.update', $tipoParentesco->id], 'method' => 'patch']) !!}

                        @include('parametros.tipos_parentesco.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
