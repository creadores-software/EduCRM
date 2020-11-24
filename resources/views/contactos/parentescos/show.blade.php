@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/parentescos.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <h2 class="page-header">Datos</h2>
                    @include('contactos.parentescos.show_fields')
                    @include('layouts.audit')
                    <a href="{{ route('contactos.parentescos.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
