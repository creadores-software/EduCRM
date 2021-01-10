@extends('layouts.app')

@push('css')
<style> 
.container {
            max-width: 500px;
}
dl, ol, ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
</style> 
@endpush

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            Subir contactos masivamente
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">            
            <div class="box-body">   
                <div class="row">
                    {!! Form::open(['route' => 'contactos.contactos.cargarImportacion','files' => true]) !!}
                
                        <div class="form-group col-sm-12">    
                            <p>El archivo debe estar en formato csv o excel, conservando en la primera línea los titulos de los campos tal como están en base de datos.</p>
                            <a target="_blank" href="{{ route('contactos.contactos.archivoEjemplo') }}">Descargar plantilla</a>
                        </div>
                        <!-- Archivo -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('archivo', 'Seleccionar archivo') !!}
                            {!! Form::file('archivo', null, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Cargar importación', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('contactos.contactos.index') }}" class="btn btn-default">@lang('crud.back')</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
    @include('contactos.contactos.advanced_filter')
   
@endsection

@push('scripts')
@endpush

