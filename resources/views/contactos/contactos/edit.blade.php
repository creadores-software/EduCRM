@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/contactos.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_general" data-toggle="tab" aria-expanded="true"><i class="fa fa-user"></i> General</a></li>
                                <li class=""><a href="{{ route('contactos.informacionesRelacionales.index') }}"><i class="fa fa-thumbs-up"></i> Relacional</a></li>
                                <li class=""><a href="#tab_academica" data-toggle="tab" aria-expanded="false"><i class="fa fa-graduation-cap"></i> Académica</a></li>
                                <li class=""><a href="#tab_laboral" data-toggle="tab" aria-expanded="false"><i class="fa fa-briefcase"></i> Laboral</a></li>
                                <li class=""><a href="#tab_familiar" data-toggle="tab" aria-expanded="false"><i class="fa fa-users"></i> Familiar</a></li>
                                <li class=""><a href="#tab_interacicciones" data-toggle="tab" aria-expanded="false"><i class="fa fa-comment"></i> Interacciones</a></li>
                                <li class=""><a href="#tab_funnel" data-toggle="tab" aria-expanded="false"><i class="fa fa-filter"></i> Campañas</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab_general">
                                    {!! Form::model($contacto, ['route' => ['contactos.contactos.update', $contacto->id], 'method' => 'patch']) !!}
                                        @include('contactos.contactos.fields')
                                    {!! Form::close() !!}
                                </div>                               
                            </div>
                        </div>
                    </div>
               </div>
           </div>
       </div>
   </div>
@endsection
