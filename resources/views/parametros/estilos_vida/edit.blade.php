@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/estilosVida.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estiloVida, ['route' => ['parametros.estilosVida.update', $estiloVida->id], 'method' => 'patch']) !!}

                        @include('parametros.estilos_vida.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
