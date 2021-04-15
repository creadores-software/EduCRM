<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('id', old('id', $user->id ?? '')) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', __('models/users.fields.password').':') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Permisos -->
<div class="form-group col-sm-6">
    {!! Form::label('roles', ' Roles:') !!}
    <select name="uroles[]" id="uroles" class="form-control"  multiple="multiple">
        @if(!empty($user))
            @foreach (old('uroles[]', $user->roles,null) as $rol)
                <option value="{{ $rol->id }}" selected="selected">{{ $rol->name }}</option>
            @endforeach
        @endif
    </select> 
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
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
