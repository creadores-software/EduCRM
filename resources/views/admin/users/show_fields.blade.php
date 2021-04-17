<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/users.fields.created_at').':') !!}
    <p>{{ $user->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/users.fields.updated_at').':') !!}
    <p>{{ $user->updated_at }}</p>
</div>

<!-- Permisos -->
<div class="form-group col-sm-12">
    {!! Form::label('roles', ' Roles:') !!}
    <select name="uroles[]" id="uroles" class="form-control"  multiple="multiple" disabled=true>
        @foreach (old('uroles[]', $user->roles,null) as $rol)
            <option value="{{ $rol->id }}" selected="selected">{{ $rol->name }}</option>
        @endforeach
    </select> 
</div>

@push('scripts')
    <script type="text/javascript">            
        $(document).ready(function() {             
            $('#uroles').select2({
                tags: true,
                multiple: true,
                tokenSeparators: [','],
                placeholder: "Seleccionar",
                allowClear: true,
                createTag: function(params) {return undefined;},
                ajax: {
                    url: '{{ route("admin.roles.dataAjax") }}',
                    dataType: 'json',
                },
            });
        });
    </script>
@endpush


