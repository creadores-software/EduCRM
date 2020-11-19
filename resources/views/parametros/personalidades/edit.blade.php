@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/personalidades.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($personalidad, ['route' => ['parametros.personalidades.update', $personalidad->id], 'method' => 'patch']) !!}

                        @include('parametros.personalidades.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
