@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/perfilesMedioComunicacion.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('contactos.perfiles_medio_comunicacion.show_fields')
                    <a href="{{ route('contactos.perfilesMedioComunicacion.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
