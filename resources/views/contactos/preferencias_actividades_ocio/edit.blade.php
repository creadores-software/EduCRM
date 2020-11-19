@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/preferenciasActividadesOcio.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($preferenciaActividadOcio, ['route' => ['contactos.preferenciasActividadesOcio.update', $preferenciaActividadOcio->id], 'method' => 'patch']) !!}

                        @include('contactos.preferencias_actividades_ocio.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
