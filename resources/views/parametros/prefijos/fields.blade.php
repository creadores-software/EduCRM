<!-- Genero Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('genero_id', __('models/prefijos.fields.genero_id').':') !!}
    <div class="input-group">
        <select name="genero_id" id="genero_id" class="form-control">
            @if(!empty(old('genero_id', $prefijo->genero_id ?? '' )))
                <option value="{{ old('genero_id', $prefijo->genero_id ?? '' ) }}" selected> {{ App\Models\Parametros\Genero::find(old('genero_id', $prefijo->genero_id ?? '' ))->nombre }} </option>
            @endif
        </select>        
    </div>
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/prefijos.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>  

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('parametros.prefijos.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {            
            $('#genero_id').select2({
                ajax: {
                    url: '{{ route("parametros.generos.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });
    </script>
@endpush
