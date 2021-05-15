{!! Form::hidden('contacto_origen', old('contacto_origen', $parentesco->contacto_origen ?? $idContacto)) !!}
{!! Form::hidden('idContacto',$idContacto) !!}
{!! Form::hidden('id', old('id', $parentesco->id ?? '')) !!}

<!-- Contacto Destino Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('contacto_destino', __('models/parentescos.fields.contacto_destino')) !!}
    <div class="input-group">
        <select name="contacto_destino" id="contacto_destino" class="form-control">
            <option></option>
            @if(!empty(old('contacto_destino', $parentesco->contacto_destino ?? '' )))
                <option value="{{ old('contacto_destino', $parentesco->contacto_destino ?? '' ) }}" selected> {{ App\Models\Contactos\Contacto::find(old('contacto_destino', $parentesco->contacto_destino ?? '' ))->getNombreCompleto() }} </option>
            @endif
        </select>   
        <div class="btn btn-default input-group-addon">
            <a target="_blank" href="{{ route('contactos.contactos.create',['esPariente'=>$idContacto]) }}">@lang('crud.add_new')</a>
        </div> 
    </div>   
</div>

<!-- Tipo Parentesco Id Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('tipo_parentesco_id', __('models/parentescos.fields.tipo_parentesco_id')) !!}
    <select name="tipo_parentesco_id" id="tipo_parentesco_id" class="form-control">
        <option></option>
        @if(!empty(old('tipo_parentesco_id', $parentesco->tipo_parentesco_id ?? '' )))
            <option value="{{ old('tipo_parentesco_id', $parentesco->tipo_parentesco_id ?? '' ) }}" selected> {{ App\Models\Parametros\TipoParentesco::find(old('tipo_parentesco_id', $parentesco->tipo_parentesco_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Acudiente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('acudiente', __('models/parentescos.fields.acudiente')) !!}
    {!! Form::select('acudiente',[0=>'NO',1=>'SI'], old('acudiente'), ['class' => 'form-control']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
         $(document).ready(function() { 
            $('#acudiente').select2(); 
        }); 
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.parentescos.index',['idContacto'=>$idContacto]) }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">      
        $(document).ready(function() {    
            $('#tipo_parentesco_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.tiposParentesco.dataAjax") }}',
                    dataType: 'json',
                },
            });  
            $('#contacto_destino').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("contactos.contactos.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {  
                        id_actual = $("[name='contacto_origen']").val();
                        return {
                            q: params.term, 
                            contacto_excluir: id_actual,
                            page: params.page || 1,
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data.results,
                            pagination: {
                                more: data.more
                            }
                        };
                    }
                },
            });            
        }); 
    </script>
@endpush
