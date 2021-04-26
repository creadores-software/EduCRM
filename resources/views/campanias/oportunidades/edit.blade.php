@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/oportunidades.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($oportunidad, ['route' => ['campanias.oportunidades.update', $oportunidad->id], 'method' => 'patch']) !!}

                        @include('campanias.oportunidades.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
