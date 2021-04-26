@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/tiposEstadoColor.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'campanias.tiposEstadoColor.store']) !!}

                        @include('campanias.tipos_estado_color.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
