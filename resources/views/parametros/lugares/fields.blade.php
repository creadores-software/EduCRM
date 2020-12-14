<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/lugares.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', __('models/lugares.fields.tipo').':') !!}
    {!! Form::select('tipo',[''=>'','P'=>'Pais','D'=>'Departamento','C'=>'Ciudad'], old('tipo'), ['class' => 'form-control']) !!}
</div>

<!-- Padre Id Field -->
<div class="form-group col-sm-6" id="div_padre_id">
    {!! Form::label('padre_id', __('models/lugares.fields.padre_id').':') !!}
    <select name="padre_id" id="padre_id" class="form-control">
        <option></option>
        @if(!empty(old('padre_id', $lugar->padre_id ?? '' )))
            <option value="{{ old('padre_id', $lugar->padre_id ?? '' ) }}" selected> {{ App\Models\Parametros\Lugar::find(old('padre_id', $lugar->padre_id ?? '' ))->nombre }} </option>
        @endif
    </select>  
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('parametros.lugares.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#tipo').change(function(){
           if($('#tipo').val()=='P'){
                $('#div_padre_id').hide();    
           }else{
                $('#div_padre_id').show();    
           }
        }); 
        $(document).ready(function() {  
            $('#padre_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("parametros.lugares.dataAjax") }}',
                    dataType: 'json',
                    data: function (params) {
                        tipo_seleccionado = $('#tipo').val();
                        return {
                            q: params.term, 
                            tipo: tipo_seleccionado,
                        };
                    },
                },
            });
            if($('#tipo').val()=='P'){
                $('#div_padre_id').hide();    
            }  
        });        
    </script>
@endpush