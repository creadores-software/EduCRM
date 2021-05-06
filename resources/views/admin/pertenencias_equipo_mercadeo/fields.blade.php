{!! Form::hidden('idEquipo',$idEquipo) !!}
{!! Form::hidden('equipo_mercadeo_id',$idEquipo) !!}
{!! Form::hidden('id', old('id', $pertenenciaEquipoMercadeo->id ?? '')) !!}

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', __('models/pertenenciasEquipoMercadeo.fields.users_id').':') !!}
    <select name="users_id" id="users_id" class="form-control">
        <option></option>
        @if(!empty(old('users_id', $pertenenciaEquipoMercadeo->users_id ?? '' )))
            <option value="{{ old('users_id', $pertenenciaEquipoMercadeo->users_id ?? '' ) }}" selected> {{ App\Models\Admin\User::find(old('users_id', $pertenenciaEquipoMercadeo->users_id ?? '' ))->name }} </option>
        @endif
    </select> 
</div>

<!-- Es Lider Field -->
<div class="form-group col-sm-6">
    {!! Form::label('es_lider', __('models/pertenenciasEquipoMercadeo.fields.es_lider').':') !!}
    {!! Form::select('es_lider',[0=>'NO',1=>'SI'], old('es_lider'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.pertenenciasEquipoMercadeo.index',['idEquipo'=>$idEquipo]) }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">
         $(document).ready(function() { 
            $('#es_lider').select2(); 
            $('#users_id').select2({
                placeholder: "Seleccionar",
                allowClear: true,
                ajax: {
                    url: '{{ route("admin.users.dataAjax") }}',
                    dataType: 'json',
                },
            });
        }); 
    </script>
@endpush

