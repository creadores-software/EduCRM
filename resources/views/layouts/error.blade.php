@extends('layouts.app')

@section('content')
<div class="content">  
    <div class="alert alert-danger">        
        <h4><i class="icon fa fa-ban"></i> Se ha generado un error</h4>
        <p>No es posible realizar la acción.</p>
        <p style="padding-left:20px">{{$message}}</p>
        <p>Si tienes inquietudes o el error persiste, contacta al administrador.</p>
    </div>
</div>    
@endsection
