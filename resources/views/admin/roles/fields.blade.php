<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/roles.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('guard_name', 'web') !!}
    {!! Form::hidden('id', old('id', $role->id ?? '')) !!}
</div>

<!-- Permisos -->
<div class="form-group col-sm-12">
    {!! Form::label('permissions', ' Permisos:') !!}
    <select name="permissions[]" id="permissions" class="form-control"  multiple="multiple">
        @if(!empty($role))
            @foreach (old('permissions[]', $role->permissions,null) as $permiso)
                <option value="{{ $permiso->id }}" selected="selected">{{ $permiso->name }}</option>
            @endforeach
        @endif
    </select> 
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.roles.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script type="text/javascript">            
        $(document).ready(function() {             
            $('#permissions').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("admin.permissions.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });
    </script>
@endpush
