@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/perfilesMedioComunicacion.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'contactos.perfilesMedioComunicacion.store']) !!}

                        @include('contactos.perfiles_medio_comunicacion.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
