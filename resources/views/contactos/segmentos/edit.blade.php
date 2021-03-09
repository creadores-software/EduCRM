@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/segmentos.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($segmento, ['route' => ['contactos.segmentos.update', $segmento->id], 'method' => 'patch']) !!}

                        @include('contactos.segmentos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@push('scripts')
    <script type="text/javascript">
       $(document).ready(function() {
            actualizarSegmento({{ $segmento->id }});
        });
    </script>
@endpush
