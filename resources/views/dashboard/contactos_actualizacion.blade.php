<div class="col-lg-6 col-xs-12">
    <div class="row">
        <div class="box-header text-center">
            <h3 class="box-title">Contactos por última actualización</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="contactosActualizacion" class="table table-striped table-bordered dataTable">
                <thead>
                    <tr role="row">
                        <th>Campaña</th>                                               
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Dias</th> 
                        <th>Acción</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactosActualizacion as $oportunidad)
                    <tr role="row" class="odd">
                        <td>{{ $oportunidad->campania->nombre }}</td>                                               
                        <td>{{ $oportunidad->contacto->getNombreCompleto() }}</td>
                        <td>{{ $oportunidad->estadoCampania->nombre }}</td>
                        <td>{!! $oportunidad->getDiasUltimaActualizacion(true) !!}</td>
                        <td>
                            <div class="btn-group">
                                <a target="_blank" href="{{ route('campanias.oportunidades.edit', [$oportunidad->id,'idCampania'=>$oportunidad->campania->id]) }}" class="btn btn-default btn-xs">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                <a target="_blank" href="{{ route('campanias.interacciones.index', ['idOportunidad'=>$oportunidad->id]) }}" class="btn btn-default btn-xs">
                                    <i class="glyphicon glyphicon-comment"></i>
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