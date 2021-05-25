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
                        <th>Dias</th>
                        <th>Estado</th>
                        <th>Nombre</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contactosActualizacion as $interaccion)
                    <tr role="row" class="odd">
                        <td>{{ $interaccion->oportunidad->ultima_actualizacion }}</td>
                        <td>{{ $interaccion->oportunidad->estadoCampania->nombre }}</td>
                        <td>{{ $interaccion->oportunidad->contacto->nombres }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="btn btn-default btn-xs">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                    <a href="#" class="btn btn-default btn-xs">
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