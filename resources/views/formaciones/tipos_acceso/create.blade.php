@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/tiposAcceso.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'formaciones.tiposAcceso.store']) !!}

                        @include('formaciones.tipos_acceso.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
