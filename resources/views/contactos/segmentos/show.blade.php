@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/segmentos.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row col-md-12" style="padding-left: 20px">
                    <h2 class="pull-right">
                        <a class="btn btn-primary" target="_blank" href="{{ route('contactos.contactos.index',['vistaPrevia'=>1,'idSegmento'=>$segmento->id]) }}">Vista previa</a> 
                    </h2> 
                    <h2 class="page-header">Datos</h2>                    
                    @include('contactos.segmentos.show_fields')
                    @include('layouts.audit')
                    <a href="{{ route('contactos.segmentos.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
