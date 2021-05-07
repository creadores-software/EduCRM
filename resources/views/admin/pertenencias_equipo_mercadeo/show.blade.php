@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/pertenenciasEquipoMercadeo.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <h2 class="page-header">Datos</h2>
                    @include('admin.pertenencias_equipo_mercadeo.show_fields')
                    @include('layouts.audit')
                    <a href="{{ route('admin.pertenenciasEquipoMercadeo.index',['idEquipo'=>$pertenenciaEquipoMercadeo->equipo_mercadeo_id]) }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
