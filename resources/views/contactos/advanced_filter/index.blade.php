<div class="modal" tabindex="-1" role="dialog" id="advanced_filter">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <form id="form_segmento">
                            {!! Form::label('segmento', 'Segmento:') !!}
                            <select name="segmento_seleccionado" id="segmento_seleccionado" class="form-control">
                                <option></option>
                                @if (!empty(old('segmento_seleccionado')))
                                    <option value="{{ old('segmento_seleccionado') }}" selected>
                                        {{ App\Models\Contactos\Segmento::find(old('segmento_seleccionado'))->nombre }}
                                    </option>
                                @endif
                            </select>
                    </div>
                    <div id="nuevo_segmento">
                        <!-- Nombre Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('nombre', __('models/segmentos.fields.nombre') . ':') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                        </div>
                        <!-- Descripcion Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('descripcion', __('models/segmentos.fields.descripcion') . ':') !!}
                            {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
                        </div>
                        <!-- Global Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('global', __('models/segmentos.fields.global') . ':') !!}
                            <select name="global" id="global" class="form-control">
                              <option value="0" selected>NO</option>
                              <option value="1">SI</option>
                            </select> 
                        </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <form id="form_filtros">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#general"><i
                                                class="fa fa-user"></i></a></li>
                                    <li><a data-toggle="tab" href="#relacional"><i class="fa fa-heart"></i></a></li>
                                    <li><a data-toggle="tab" href="#academico"><i class="fa fa-graduation-cap"></i></a>
                                    </li>
                                    <li><a data-toggle="tab" href="#laboral"><i class="fa fa-briefcase"></i></a></li>
                                    <li><a data-toggle="tab" href="#familiar"><i class="fa fa-users"></i></a></li>
                                    <li><a data-toggle="tab" href="#interacciones"><i class="fa fa-comment"></i></a>
                                    </li>
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
                                    <button type="button" id="botonGuardar" class="btn btn-success"
                                        type="submit">Guardar</button>
                                </div>
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
        $('#segmento_seleccionado').change(function() {
            var seleccionado = $('#segmento_seleccionado :selected').val();
            if (seleccionado == 'nuevo') {
                restablecerCampos();
                $("#form_filtros :input").prop("disabled", false);
                $('#nuevo_segmento').show();
                $('#boton-guardar').show();
            } else {
                actualizarSegmento(seleccionado);               
            }
        });

        $(document).ready(function() {
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
                        filtros: arrayFiltrosActuales(),
                        global: $('#global').val(),
                },
                success: function(json) {
                  var $nuevaOpcion = $("<option selected='selected'></option>").val(json.id).text(nombre)
                  $("#segmento_seleccionado").append($nuevaOpcion).trigger('change');
                  actualizarSegmento(json.id);
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
                    console.log(mensaje);
                    $(mensaje).appendTo('#errores');
                }
            });
        };

        function arrayFiltrosActuales() {
            let filtros = {};
            let contador = 0;
            $('#form_filtros *').filter(':input').each(function() {
                var $this = $(this);
                if ($(this).val() && $(this).val().length !== 0) {
                    filtros[contador] = {
                        "campo": $this.attr('id'),
                        "valor": $this.val()
                    };
                    contador++;
                }
            });
            return filtros;
        }

        function actualizarSegmento(idSegmento) {            
            $("#form_filtros :input").prop("disabled", true);
            $('#nuevo_segmento').hide();
            $('#boton-guardar').hide();

            let url = "{{ route('contactos.segmentos.filtros', ['id' => '_idSegmento']) }}";
            url = url.replace('_idSegmento', idSegmento);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(campos) {
                    actualizarCamposSegmento(campos);
                }
            });
        };

        function actualizarCamposSegmento(campos) {
            restablecerCampos();
            $.each(campos, function(index, filtro) {
                $("#" + filtro['campo']).val(filtro['valor']);
                //Para select2 es necesario llamar este método
                $("#" + filtro['campo']).trigger('change');
            });
        };

        function restablecerCampos() {
            //Resetea todos los input del segmento
            $('#form_segmento')[0].reset();
            //Resetea todos los input de filtros
            $('#form_filtros')[0].reset();
            //Resetea todos los select2 menos el segmento seleccionado
            $(".select2-hidden-accessible").not('#segmento_seleccionado').not('#global').val(null).trigger("change");
        }

    </script>
@endpush
