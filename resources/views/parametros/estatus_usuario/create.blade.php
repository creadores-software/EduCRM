@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/estatusUsuario.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'parametros.estatusUsuario.store']) !!}

                        @include('parametros.estatus_usuario.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection