@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/tiposCampaniaEstados.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <h2 class="page-header">Datos</h2>
                    @include('campanias.tipos_campania_estados.show_fields')
                    @include('layouts.audit')
                    <a href="{{ route('campanias.tiposCampaniaEstados.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
