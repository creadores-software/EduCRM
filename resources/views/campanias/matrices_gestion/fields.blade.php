<!-- Accion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accion', __('models/matricesGestion.fields.accion').':') !!}
    {!! Form::text('accion', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', __('models/matricesGestion.fields.descripcion').':') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Interes Minimo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interes_minimo', __('models/matricesGestion.fields.interes_minimo').':') !!}
    {!! Form::number('interes_minimo', null, ['class' => 'form-control']) !!}
</div>

<!-- Interes Maximo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interes_maximo', __('models/matricesGestion.fields.interes_maximo').':') !!}
    {!! Form::number('interes_maximo', null, ['class' => 'form-control']) !!}
</div>

<!-- Probabilidad Minima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('probabilidad_minima', __('models/matricesGestion.fields.probabilidad_minima').':') !!}
    {!! Form::number('probabilidad_minima', null, ['class' => 'form-control']) !!}
</div>

<!-- Probabilidad Maxima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('probabilidad_maxima', __('models/matricesGestion.fields.probabilidad_maxima').':') !!}
    {!! Form::number('probabilidad_maxima', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Hexadecimal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color_hexadecimal', __('models/matricesGestion.fields.color_hexadecimal').':') !!}
    {!! Form::text('color_hexadecimal', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.matricesGestion.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
