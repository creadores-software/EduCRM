<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/buyerPersonas.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', __('models/buyerPersonas.fields.descripcion').':') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Ruta Pdf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruta_pdf', __('models/buyerPersonas.fields.ruta_pdf').':') !!}
    {!! Form::text('ruta_pdf', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('parametros.buyerPersonas.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
