@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/preferenciasMediosComunicacion.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'contactos.preferenciasMediosComunicacion.store']) !!}

                        @include('contactos.preferencias_medios_comunicacion.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
