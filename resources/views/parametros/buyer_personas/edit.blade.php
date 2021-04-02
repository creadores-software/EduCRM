@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/buyerPersonas.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($buyerPersona, ['route' => ['parametros.buyerPersonas.update', $buyerPersona->id], 'method' => 'patch']) !!}

                        @include('parametros.buyer_personas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
