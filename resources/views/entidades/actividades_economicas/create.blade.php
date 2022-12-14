@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/actividadesEconomicas.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'entidades.actividadesEconomicas.store','data-toggle'=>'validator']) !!}

                        @include('entidades.actividades_economicas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
