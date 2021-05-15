<!-- Name Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('name', __('models/permissions.fields.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('guard_name', 'web') !!}
    {!! Form::hidden('id', old('id', $permission->id ?? '')) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.permissions.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
