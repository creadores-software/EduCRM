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
                    {!! Form::open(['route' => 'contactos.segmentos.store', 'id'=>'formSegmento']) !!}

                        @include('contactos.segmentos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if(isset($id)) 
    <!-- Para duplicar -->
    <script type="text/javascript">
       $(document).ready(function() {
            actualizarSegmento({{ $id }});
        });    
    </script>
    @endif
@endpush

