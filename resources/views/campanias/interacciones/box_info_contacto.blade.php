
<div class="col-xs-12">
    <div class="box box-solid box-default">
      <div class="box-header">  
        @can('campanias.oportunidades.editar')
        <a data-toggle="tooltip" title="Editar oportunidad" style="color:white;margin-left:5px" class="mytt btn btn-primary pull-right btn-sm" target="_black" href="{{ route('campanias.oportunidades.edit',[$oportunidad->id,'idCampania'=>$oportunidad->campania->id]) }}">
            <i class="glyphicon glyphicon-filter"></i>
        </a> 
        @endcan
        <a data-toggle="tooltip" title="Información familiar" style="color:white;margin-left:5px" class="mytt btn btn-primary pull-right btn-sm" target="_black" href="{{ route('contactos.parentescos.index',['idContacto'=>$oportunidad->contacto->id]) }}">
            <i class="fa fa-users"></i>
        </a>         
        <a data-toggle="tooltip" title="Ver detalles"  style="color:white;margin-left:5px" class="mytt btn btn-primary pull-right btn-sm" target="_black" href="{{ route('contactos.contactos.show',$oportunidad->contacto->id) }}">
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>            
        <h3 class="box-title" style="margin-top:5px">Información de contacto</h3>
      </div>
      <div class="box-body">
        <!-- Celular -->
        <div class="col-sm-3">
            {!! Form::label('celular','Celular') !!}
            <p>{{ $oportunidad->contacto->celular }}</p>
        </div>
        <!-- Teléfono -->
        <div class="col-sm-3">
            {!! Form::label('telefono','Teléfono') !!}
            <p>{{ $oportunidad->contacto->telefono? $oportunidad->contacto->telefono:"No registrado"}}</p>
        </div>
        <!-- Correo personal -->
        <div class="col-sm-3">
            {!! Form::label('correo_personal','Correo personal') !!}
            <p>{{ $oportunidad->contacto->correo_personal }}</p>
        </div>
        <!-- Correo institucion -->
        <div class="col-sm-3">
            {!! Form::label('correo_institucional','Correo institucional') !!}
            <p>{{ $oportunidad->contacto->correo_institucional?$oportunidad->contacto->correo_institucional:"No registrado" }}</p>
        </div>  
        
        <!-- Estado -->
        <div class="col-sm-3">
            {!! Form::label('estado','Estado') !!}
            <p>{{ $oportunidad->estadoCampania->nombre }}</p>
        </div>
        <!-- Razon estado -->
        <div class="col-sm-3">
            {!! Form::label('razon','Razón') !!}
            <p>{{ $oportunidad->justificacionEstadoCampania->nombre}}</p>
        </div>
        <!-- Capacidad -->
        <div class="col-sm-3">
            {!! Form::label('capacidad','Capacidad') !!}
            <p>{!! $oportunidad->categoriaOportunidad->stars($oportunidad->capacidad) !!}</p>
        </div>
        <!-- Interes -->
        <div class="col-sm-3">
            {!! Form::label('interes','Interés') !!}
            <p>{!! $oportunidad->categoriaOportunidad->stars($oportunidad->interes) !!}</p>
        </div>  
      </div>
    </div>
</div>