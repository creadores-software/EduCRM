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
                <div class="alert alert-info">
                    <p><span class="text-weight-bold"><i class="fa fa-info-circle"></i></span> <b>Instrucciones</b></p> 
                    <p>El archivo debe estar en formato Excel (xlsx,xls) conservando en la primera línea los nombres de los campos.
                            <a class="alert-info" target="_blank" href="{{ route('contactos.contactos.archivoEjemplo') }}">Descargar plantilla</a>
                    </p>
                    <p>Tener en cuenta que no se debe poner el nombre de atributos relacionados sino el identificador (id).</p>
                    <p>Los campos mínimos a diligenciar son: <b>nombres, apellidos, celular, correo_personal, origen_id</b></p>
                </div> 
                <div class="row">
                    {!! Form::open(['route' => 'contactos.contactos.cargarImportacion','files' => true]) !!}               
                          
                        <!-- Archivo -->
                        <div class="form-group col-sm-12">
                            {!! Form::file('archivo', null, ['class' => 'form-control btn btn-primary']) !!}
                        </div>

                        <div class="form-group col-sm-12">
                            <p>Seleccione el archivo y posteriomente haga clic en "Cargar importación"</p>
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
    </div>
@endsection
