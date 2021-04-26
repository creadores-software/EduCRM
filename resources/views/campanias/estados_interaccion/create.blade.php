@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/estadosInteraccion.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'campanias.estadosInteraccion.store']) !!}

                        @include('campanias.estados_interaccion.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
