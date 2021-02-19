<div class="modal" tabindex="-1" role="dialog" id="advanced_filter">
    <div class="modal-dialog" role="document">
      <div class="modal-content">       
        <div class="modal-body"> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <form id="form_segmentos">
          <div class="row">
            <div class="form-group col-sm-12">
              {!! Form::label('segmento', 'Segmento:') !!}
              <select name="segmento_seleccionado" id="segmento_seleccionado" class="form-control">
                  <option></option>
                  @if(!empty(old('segmento_seleccionado')))
                      <option value="{{ old('segmento_seleccionado') }}" selected> {{ App\Models\Contactos\Segmento::find(old('segmento_seleccionado'))->nombre }} </option>
                  @endif
              </select>  
            </div>
            <div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#general"><i class="fa fa-user"></i></a></li>
                  <li><a data-toggle="tab" href="#relacional"><i class="fa fa-heart"></i></a></li>   
                  <li><a data-toggle="tab" href="#academico"><i class="fa fa-graduation-cap"></i></a></li>
                  <li><a data-toggle="tab" href="#laboral"><i class="fa fa-briefcase"></i></a></li>
                  <li><a data-toggle="tab" href="#familiar"><i class="fa fa-users"></i></a></li>
                  <li><a data-toggle="tab" href="#interacciones"><i class="fa fa-comment"></i></a></li>
                  <li><a data-toggle="tab" href="#campañas"><i class="fa fa-filter"></i></a></li>
                </ul>            
              </div> 
              <div class="tab-content">   
                <div id="general" class="tab-pane fade in active">
                  @include('contactos.advanced_filter.filtro_general') 
                </div>   
                <div id="relacional" class="tab-pane fade">   
                  @include('contactos.advanced_filter.filtro_relacional')                        
                </div>
                <div id="academico" class="tab-pane fade">   
                  @include('contactos.advanced_filter.filtro_academico')                        
                </div>
                <div class="form-group col-sm-12"> 
                  <button type="button" class="btn btn-success" type="submit">Guardar</button>                          
                </div>
              </div> 
            </div>
          </div>  
        </form>        
        </div>
        <div class="modal-footer">
          <button type="button" id="botonRestablecer" class="btn btn-default" type="submit">Restablecer</button>    
          <button type="button" id="botonFiltrar" class="btn btn-primary" type="submit">Filtrar</button>            
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

@push('scripts')
    <script type="text/javascript">  
        $('#botonFiltrar').click(function(e) {
            $('#dataTableBuilder').DataTable().draw();
            e.preventDefault();
            $('#advanced_filter').modal('hide');
        }); 
        $('#botonRestablecer').click(function(e) {
            e.preventDefault();
            if($("#form_segmentos").length){
                //Resetea todos los input
                $('#form_segmentos')[0].reset();
                //Resetea todos los select2
                $(".select2-hidden-accessible").val(null).trigger("change");
            }    
            if($("#segmentos").length){
                //Elimina segmento seleccionado
                $("#segmentos").DataTable().rows().deselect();
            }  
        });   
        $(document).ready(function() { 
          $('#segmento_seleccionado').select2({
              placeholder: "Seleccionar",
              allowClear: true,
              ajax: {
                  url: '{{ route("contactos.segmentos.dataAjax") }}',
                  dataType: 'json',
              },
          });
        }
    </script>
@endpush
