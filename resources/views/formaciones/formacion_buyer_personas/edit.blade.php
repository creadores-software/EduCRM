@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/formacionBuyerPersonas.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($formacionBuyerPersona, ['route' => ['formaciones.formacionBuyerPersonas.update', $formacionBuyerPersona->id], 'method' => 'patch']) !!}

                        @include('formaciones.formacion_buyer_personas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
