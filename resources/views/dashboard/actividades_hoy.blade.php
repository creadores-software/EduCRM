<div class="col-lg-6 col-xs-12">
    <div class="row">
        <div class="box-header text-center">
            <h3 class="box-title">Actividades para hoy</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="actividadesHoy" class="table table-striped table-bordered dataTable">
                <thead>
                    <tr role="row">
                        <th>Hora</th>                                               
                        <th>Tipo</th>
                        <th>Nombre</th>
                        <th>Observación</th> 
                        <th>Acción</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($actividadesHoy as $interaccion)
                    <tr role="row" class="odd">
                        <td>{{ date("H:i",strtotime($interaccion->fecha_inicio)) }}</td>   
                        <td>{{ $interaccion->tipoInteraccion->nombre }}</td>                                            
                        <td>{{ $interaccion->oportunidad->contacto->getNombreCompleto() }}</td>                        
                        <td>{{ $interaccion->observacion }}</td> 
                        <td>
                            <div class="btn-group">
                                <a target="_blank" href="{{ route('campanias.interacciones.edit', [$interaccion->id,'idOportunidad'=>$interaccion->oportunidad->id]) }}" class="btn btn-default btn-xs">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                            </div>
                        </td>
                    </tr> 
                    @endforeach                                                       
                </tbody>
            </table> 
        </div>                    
    </div>
</div>