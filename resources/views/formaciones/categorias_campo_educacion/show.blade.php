@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/categoriasCampoEducacion.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('formaciones.categorias_campo_educacion.show_fields')
                    <a href="{{ route('formaciones.categoriasCampoEducacion.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
