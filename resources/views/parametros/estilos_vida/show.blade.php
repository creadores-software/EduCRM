@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/estilosVida.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('parametros.estilos_vida.show_fields')
                    <a href="{{ route('parametros.estilosVida.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
