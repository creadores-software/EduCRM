<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/roles.fields.name').':') !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/roles.fields.created_at').':') !!}
    <p>{{ $role->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/roles.fields.updated_at').':') !!}
    <p>{{ $role->updated_at }}</p>
</div>

<!-- Permisos -->
<div class="form-group col-sm-12">
    {!! Form::label('permissions', ' Permisos:') !!}
    <select name="permissions_select[]" id="permissions_select" class="form-control"  multiple="multiple" disabled=true>
        @foreach (old('permissions_select[]', $role->permissions,null) as $permiso)
                <option value="{{ $permiso->id }}" selected="selected">{{ $permiso->name }}</option>
        @endforeach
    </select> 
</div>

@push('scripts')
    <script type="text/javascript">            
        $(document).ready(function() {             
            $('#permissions_select').select2({
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

