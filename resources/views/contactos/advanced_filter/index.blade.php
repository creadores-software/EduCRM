<div class="modal" tabindex="-1" role="dialog" id="advanced_filter">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <form>
                            {!! Form::label('segmento', 'Segmento') !!}
                            <select name="segmento_seleccionado" id="segmento_seleccionado" class="form-control">
                                <option></option>
                                @if (!empty(old('segmento_seleccionado')))
                                    <option value="{{ old('segmento_seleccionado') }}" selected>
                                        {{ App\Models\Contactos\Segmento::find(old('segmento_seleccionado'))->nombre }}
                                    </option>
                                @endif
                            </select>
                        </form>
                    </div>
                    <div id="nuevo_segmento">
                        <form>
                        <!-- Nombre Field -->
                        <div class="form-group col-sm-6 required">
                            {!! Form::label('nombre', __('models/segmentos.fields.nombre')) !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                        </div>
                        <!-- Descripcion Field -->
                        <div class="form-group col-sm-6 required">
                            {!! Form::label('descripcion', __('models/segmentos.fields.descripcion')) !!}
                            {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
                        </div>
                        <!-- Global Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('global', __('models/segmentos.fields.global')) !!}
                            <select name="global" id="global" class="form-control">
                              <option value="0" selected>NO</option>
                              <option value="1">SI</option>
                            </select> 
                        </div>
                    </form>
                    </div>
                    <div class="col-md-12">
                        <form id="form_filtros">
                            @include('contactos.segmentos.filtros') 
                            <div class="form-group col-sm-12" id="boton-guardar">
                                <button type="button" id="botonGuardar" class="btn btn-success"
                                    type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <div class="form-group col-sm-12" id="errores">
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
            filtrarDataTable();
        });
        $('#botonRestablecer').click(function(e) {
            e.preventDefault();
            restablecerCampos(false);
            filtrarDataTable();            
        });
        $('#botonGuardar').click(function(e) {
            e.preventDefault();
            guardarSegmento();
        });
        $('#segmento_seleccionado').change(function() {
            var seleccionado = $('#segmento_seleccionado :selected').val();
            if (seleccionado == 'nuevo') {
                restablecerCampos(true);                
                $('#nuevo_segmento').show();
                $('#boton-guardar').show();
            } else {
                actualizarSegmentoEnFormulario(seleccionado);               
            }
        });

        $(document).ready(function() {
            $('#boton-guardar').hide();
            let searchParams = new URLSearchParams(window.location.search);
            if(searchParams.has('vistaPrevia')){
                idSegmento=null;
                if(searchParams.has('idSegmento')){
                    idSegmento=searchParams.get('idSegmento');
                }
                actualizarCamposConFiltroTexto(idSegmento);
            }            
            $('#nuevo_segmento').hide();
            $('#global').select2(); 
            $('#segmento_seleccionado').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route('contactos.segmentos.dataAjax') }}',
                    dataType: 'json',
                    data: function(params) {
                        return {
                            q: params.term,
                            conNuevo: 1,
                        };
                    },
                },
            });
        });

        function guardarSegmento() {
            let url = "{{ route('contactos.segmentos.store') }}";
            nombre=$('#nombre').val();
             $.ajax({
                url: url,
                type: "POST",
                dataType: "json",
                data: {
                        nombre: nombre,
                        descripcion: $('#descripcion').val(),
                        filtros_texto: $("[name='filtros_texto']").val(),
                        filtros: [{"campo":"filtros","valor":1}],
                        global: $('#global').val(),
                },
                success: function(json) {
                  var $nuevaOpcion = $("<option selected='selected'></option>").val(json.id).text(nombre);
                  $("#segmento_seleccionado").append($nuevaOpcion).trigger('change');                  
                  actualizarSegmentoEnFormulario(json.id);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    data = XMLHttpRequest.responseJSON;
                    errores = data.errors;
                    let mensaje = "<ul class='alert alert-danger' style='list-style-type: none'>";
                    $.each(errores, function(index, detalles) {
                        $.each(detalles, function(index, detalle) {
                            mensaje += "<li>" + detalle + "</li>";
                        })
                    });
                    mensaje += "</ul>";
                    $(mensaje).appendTo('#errores');
                }
            });
        };
        
        function actualizarSegmentoEnFormulario(idSegmento) {  
            $('#nuevo_segmento').hide();
            $('#boton-guardar').hide();
            restablecerCampos(true);
            $("#form_filtros :input").prop("disabled", true);
            actualizarSegmento(idSegmento);            
        };
    </script>
@endpush
