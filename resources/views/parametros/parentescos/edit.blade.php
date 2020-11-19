@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/parentescos.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($parentesco, ['route' => ['parametros.parentescos.update', $parentesco->id], 'method' => 'patch']) !!}

                        @include('parametros.parentescos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
