<div class="modal" tabindex="-1" role="dialog" id="advanced_filter">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Segmentos</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
          <form id="form_segmentos">
          <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#filtro_nuevo">Nuevo segmento</a></li>
                    <li><a data-toggle="tab" href="#listado">Listar segmentos</a></li>
                  </ul>                
                    <div class="tab-content">
                      <div id="filtro_nuevo" class="tab-pane fade in active">                        
                        <div class="form-group col-sm-12" id="div_origen">
                          {!! Form::label('origen_id', __('models/contactos.fields.origen_id').':') !!}
                          <select name="s2_origenes[]" id="s2_origenes" class="form-control" multiple="multiple">                           
                          </select> 
                        </div>                      
                      </div>
                      <div id="listado" class="tab-pane fade">
                        <div class="col-sm-12">
                          <input id="segmento_seleccionado" type="hidden" value="" name="segmento_seleccionado">
                          <table id="segmentos" class="table table-striped table-bordered" style="width:100%" >
                              <thead>
                                <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Descripción</th>
                                  <th scope="col">Ámbito</th>
                                  <th scope="col" width="100px">Acciones</th>
                                </tr>
                              </thead>
                              <tbody id="audits">
                                <tr>
                                  <td>1</td>
                                  <td>Cumpleaños</td>
                                  <td>Contactos que cumplen años el día actual</td>
                                  <td>Global</td>
                                  <td>
                                    <form method="POST" action="#" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="Ogwmdgy9HiK48l38yKgFcZlLHV8TYvFkK8d1Duhp">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-default btn-xs">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>                                        
                                    </div>
                                    </form>
                                  </td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>Interesados Facebook</td>
                                  <td>Contactos que aún no son usuarios, están interesadas y provienen de facebook</td>
                                  <td>Global</td>
                                  <td>
                                    <form method="POST" action="#" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="Ogwmdgy9HiK48l38yKgFcZlLHV8TYvFkK8d1Duhp">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-default btn-xs">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>                                       
                                    </div>
                                    </form>
                                  </td>
                                  <tr>
                                    <td>3</td>
                                    <td>Estudiantes UAM</td>
                                    <td>Contactos con correo institucional que están dentro del grupo de estudiantes</td>
                                    <td>Particular</td>
                                    <td>
                                      <form method="POST" action="#" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="Ogwmdgy9HiK48l38yKgFcZlLHV8TYvFkK8d1Duhp">
                                      <div class="btn-group">
                                          <a href="#" class="btn btn-default btn-xs">
                                              <i class="glyphicon glyphicon-eye-open"></i>
                                          </a>
                                          <a href="#" class="btn btn-default btn-xs">
                                              <i class="glyphicon glyphicon-edit"></i>
                                          </a>
                                          <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm(&quot;¿Está seguro?&quot;)"><i class="glyphicon glyphicon-trash"></i></button>
                                      </div>
                                      </form>
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                      </div>                      
                    </div>
                </div>
            </div>
          </div>  
        </form>        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" type="submit">Guardar Segmento</button>
            <button type="button" id="botonFiltrar" class="btn btn-primary" type="submit">Filtrar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

@push('scripts')
    <script type="text/javascript">        
        $(document).ready(function() { 
            $('#s2_origenes').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.origenes.dataAjax") }}',
                    dataType: 'json',
                },
            });
            var segmentosT =$('#segmentos').DataTable({
              "select": true,
              "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json",
              }              
            }); 

            $('#segmentos tbody').on('click', 'tr', function () {
                var data = segmentosT.row( this ).data();
                $('#segmento_seleccionado').val(data[0]);
            });       
        });    
        $('#botonFiltrar').click(function(e) {
            $('#dataTableBuilder').DataTable().draw();
            e.preventDefault();
            $('#advanced_filter').modal('hide');
        });   
    </script>
@endpush
