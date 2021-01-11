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


@push('scripts')
    <script type="text/javascript">        
        $(document).ready(function() {
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
    </script>
@endpush
