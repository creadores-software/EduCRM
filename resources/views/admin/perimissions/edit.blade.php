@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/perimissions.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($permission, ['route' => ['admin.perimissions.update', $permission->id], 'method' => 'patch']) !!}

                        @include('admin.perimissions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
