@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/categoriasActividadEconomica.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'entidades.categoriasActividadEconomica.store']) !!}

                        @include('entidades.categorias_actividad_economica.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
