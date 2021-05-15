{!! Form::hidden('idTipo',$idTipo) !!}
{!! Form::hidden('tipo_campania_id',$idTipo) !!}
{!! Form::hidden('id', old('id', $tipoCampaniaEstados->id ?? '')) !!}


<!-- Estado Campania Id Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('estado_campania_id', __('models/tiposCampaniaEstados.fields.estado_campania_id')) !!}
    <select name="estado_campania_id" id="estado_campania_id" class="form-control">
        <option></option>
        @if(!empty(old('estado_campania_id', $tipoCampaniaEstados->estado_campania_id ?? '' )))
            <option value="{{ old('estado_campania_id', $tipoCampaniaEstados->estado_campania_id ?? '' ) }}" selected> {{ App\Models\Campanias\EstadoCampania::find(old('estado_campania_id', $tipoCampaniaEstados->estado_campania_id ?? '' ))->nombre }} </option>
        @endif
    </select> 
</div>

<!-- Orden Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('orden', __('models/tiposCampaniaEstados.fields.orden')) !!}
    {!! Form::text('orden', null, ['class' => 'form-control']) !!}
</div>

<!-- Dias Cambio Field -->
<div class="form-group col-sm-6 required">
    <i class="fa fa-question-circle mytt" data-toggle="tooltip" title="Dias en los que se espera que la oportunidad cambie hacia el próximo estado. Si es el último estado poner cero."></i>
    {!! Form::label('dias_cambio', __('models/tiposCampaniaEstados.fields.dias_cambio')) !!}
    {!! Form::text('dias_cambio', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.tiposCampaniaEstados.index',['idTipo'=>$idTipo]) }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.mytt').tooltip();
            $('#estado_campania_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("campanias.estadosCampania.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });
    </script>
@endpush
