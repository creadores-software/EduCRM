<div class="modal" tabindex="-1" role="dialog" id="advanced_filter">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Filtros Detallados</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
          <!-- Origen Id Field -->
          <div class="form-group col-sm-12" id="div_origen">
              {!! Form::label('origen_id', __('models/contactos.fields.origen_id').':') !!}
              <select name="origen_id" id="origen_id" class="form-control">
                <option></option>  
                @if(!empty(old('origen_id', $contacto->origen_id ?? '' )))
                      <option value="{{ old('origen_id', $contacto->origen_id ?? '' ) }}" selected> {{ App\Models\Parametros\Origen::find(old('origen_id', $contacto->origen_id ?? '' ))->nombre }} </option>
                  @endif
              </select> 
          </div>
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
            $('#origen_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.origenes.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });    
        $('#botonFiltrar').click(function(e) {
            $('#dataTableBuilder').DataTable().draw();
            e.preventDefault();
            $('#advanced_filter').modal('hide');
        });      
    </script>
@endpush
