<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/permissions.fields.name').':') !!}
    <p>{{ $permission->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/permissions.fields.created_at').':') !!}
    <p>{{ $permission->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/permissions.fields.updated_at').':') !!}
    <p>{{ $permission->updated_at }}</p>
</div>

