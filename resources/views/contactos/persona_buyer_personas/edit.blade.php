@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/personaBuyerPersonas.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($personaBuyerPersona, ['route' => ['contactos.personaBuyerPersonas.update', $personaBuyerPersona->id], 'method' => 'patch']) !!}

                        @include('contactos.persona_buyer_personas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
