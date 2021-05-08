@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/campanias.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <h2 class="pull-right">
                    <a href="{{ route('campanias.campanias.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a> 
                </h2>
                <div class="row" style="padding-left: 20px">                    
                    <h2 class="page-header">Datos</h2>
                    @include('campanias.campanias.show_fields')
                    @include('layouts.audit')                    
                </div>
            </div>
        </div>
    </div>
@endsection
