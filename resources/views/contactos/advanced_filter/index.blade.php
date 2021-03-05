<div class="modal" tabindex="-1" role="dialog" id="advanced_filter">
    <div class="modal-dialog" role="document">
      <div class="modal-content">       
        <div class="modal-body"> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>          
          <div class="row">
            <form id="form_segmento">
              <div class="form-group col-sm-12">
                {!! Form::label('segmento', 'Segmento:') !!}
                <select name="segmento_seleccionado" id="segmento_seleccionado" class="form-control">
                    <option></option>
                    @if(!empty(old('segmento_seleccionado')))
                        <option value="{{ old('segmento_seleccionado') }}" selected> {{ App\Models\Contactos\Segmento::find(old('segmento_seleccionado'))->nombre }} </option>
                    @endif
                </select>  
              </div>
              <div id="nuevo_segmento">
                <!-- Nombre Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('nombre', __('models/segmentos.fields.nombre').':') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                </div>          
                <!-- Descripcion Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('descripcion', __('models/segmentos.fields.descripcion').':') !!}
                    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
                </div>
                <!-- Global Field -->
                <div class="form-group col-sm-6">
                  {!! Form::label('global', __('models/segmentos.fields.global').':') !!}
                  <label class="checkbox-inline">
                      {!! Form::hidden('global', 0) !!}
                      {!! Form::checkbox('global', 1, null) !!}  &nbsp;
                  </label>
                </div>
              </div>
            </form>
            <form id="form_filtros">
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
                  <div class="form-group col-sm-12" id="boton-guardar"> 
                    <button type="button" id="botonGuardar" class="btn btn-success" type="submit">Guardar</button>                          
                  </div>
                </div> 
              </div>
            </form>
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
            restablecerCampos();  
        });  
        $('#botonGuardar').click(function(e) {
            e.preventDefault();
            guardarSegmento(); 
        });  
        $('#segmento_seleccionado').change(function(){
          var seleccionado=$('#segmento_seleccionado :selected').val(); 
          if(seleccionado == 'nuevo'){ 
            restablecerCampos();   
            $("#form_filtros :input").prop("disabled", false); 
            $('#nuevo_segmento').show();      
            $('#boton-guardar').show();    
          }else{
            //se restablece una vez se tienen toda la informacións
            getCamposSegmento(seleccionado);
            $("#form_filtros :input").prop("disabled", true);
            $('#nuevo_segmento').hide();
            $('#boton-guardar').hide(); 
          }           
        });
 
        $(document).ready(function() { 
          $('#nuevo_segmento').hide();
          $('#segmento_seleccionado').select2({
              placeholder: "Seleccionar",
              allowClear: true,
              ajax: {
                  url: '{{ route("contactos.segmentos.dataAjax") }}',
                  dataType: 'json',
                  data: function (params) {  
                        return {
                            q: params.term, 
                            conNuevo: 1,
                        };
                    },
              },
          });                  
        });

        function guardarSegmento(){
          let url = "{{ route('contactos.segmentos.store') }}"; 
            $.ajax({
                url:url,
                type: "POST",
                dataType: "json",
                data: function (params) {  
                    return {
                        nombre: $('#nombre').val(),
                        descripcion: $('#descripcion').val(),
                        filtros: arrayFiltrosActuales(),
                        global: $('#global').val(),
                    };
                },
                success:function(campos) {
                    actualizarCamposSegmento(campos);
                }
            });
        };

        function arrayFiltrosActuales(){
          let filtros={};
          let contador=0;
          $('#form_filtros *').filter(':input').each(function(){
            var $this=$(this);
            if($(this).val().length !== 0){
              filtros[contador]={"campo": $this.attr('id'), "valor":$this.val()};
              contador++;
            }            
          });
          return filtros;  
        }

        function getCamposSegmento(idSegmento){
          let url = "{{ route('contactos.segmentos.filtros',['id'=>'_idSegmento']) }}"; 
          url = url.replace('_idSegmento', idSegmento);
            $.ajax({
                url:url,
                type: "GET",
                dataType: "json",
                success:function(campos) {
                    actualizarCamposSegmento(campos);
                }
            });
        };

        function actualizarCamposSegmento(campos){    
          restablecerCampos();      
          $.each(campos, function( index, filtro ) {
            console.log(filtro);
            $("#" + filtro['campo']).val(filtro['valor']);
            //Para select2 es necesario llamar este método
            $("#" + filtro['campo']).trigger('change');
          });
        };        

        function restablecerCampos(){
          //Resetea todos los input del segmento
          $('#form_segmento').not('#segmento_seleccionado')[0].reset();
          //Resetea todos los input de filtros
          $('#form_filtros')[0].reset();
          //Resetea todos los select2
          $(".select2-hidden-accessible").not('#segmento_seleccionado').val(null).trigger("change");          
        }
    </script>
@endpush
