@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/modalidades.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'formaciones.modalidades.store']) !!}

                        @include('formaciones.modalidades.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
