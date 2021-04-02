@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/facultadesBuyerPersona.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($facultadBuyerPersona, ['route' => ['formaciones.facultadesBuyerPersona.update', $facultadBuyerPersona->id], 'method' => 'patch']) !!}

                        @include('formaciones.facultades_buyer_persona.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
