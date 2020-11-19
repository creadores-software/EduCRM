@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/origenes.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($origen, ['route' => ['parametros.origenes.update', $origen->id], 'method' => 'patch']) !!}

                        @include('parametros.origenes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
