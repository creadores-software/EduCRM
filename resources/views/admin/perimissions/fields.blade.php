<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/perimissions.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('guard_name', 'web') !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.perimissions.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
