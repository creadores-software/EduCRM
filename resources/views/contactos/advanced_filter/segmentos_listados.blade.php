<div class="col-sm-12">
    <input id="segmento_seleccionado" type="hidden" value="" name="segmento_seleccionado">
    <table id="segmentos_listados" class="table table-striped table-bordered" style="width:100%" >
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Global</th>
          </tr>
        </thead>
        <tbody>
          @foreach((array) request()->get('segmentos') as $segmento)
          <tr>
            <td>{{ $segmento->nombre }}</td>
            <td>{{ $segmento->descripcion }}</td>
            <td>{{ $segmento->global? 'Si' : 'No' }}</td>            
          </tr> 
          @endforeach         
        </tbody>
    </table>
</div>


@push('scripts')
    <script type="text/javascript">        
        $(document).ready(function() {
            var segmentosT =$('#segmentos_listados').DataTable({
              "select": true,
              "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json",
              }              
            }); 

            $('#segmentos_listados tbody').on('click', 'tr', function () {
                var data = segmentosT.row( this ).data();
                $('#segmento_seleccionado').val(data[0]);
            });       
        }); 
    </script>
@endpush
