@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/informacionesLaborales.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <h2 class="page-header">Datos</h2>
                    @include('contactos.informaciones_laborales.show_fields')
                    @include('layouts.audit')
                </div>
            </div>
        </div>
    </div>
@endsection
