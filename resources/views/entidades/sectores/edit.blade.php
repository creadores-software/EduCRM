@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/sectores.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sector, ['route' => ['entidades.sectores.update', $sector->id], 'method' => 'patch']) !!}

                        @include('entidades.sectores.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
