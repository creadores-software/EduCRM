<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/segmentos.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', __('models/segmentos.fields.descripcion').':') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Filtros Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('filtros', __('models/segmentos.fields.filtros').':') !!}
    <div class="row">
        <div class="col-md-2">
            Filtro:
        </div>
        <div class="col-md-4">
            Valor:
        </div>
    </div>
    @for ($i=0; $i <= 4; $i++)
    <div class="row">
        <div class="col-md-2">
            <input type="text" name="filtros[{{ $i }}][campo]" class="form-control" value="{{ old('filtros['.$i.'][campo]',$segmento->filtros[$i]['campo'] ?? '') }}">
        </div>
        <div class="col-md-4">
            <input type="text" name="filtros[{{ $i }}][valor]" class="form-control" value="{{ old('filtros['.$i.'][valor]',$segmento->filtros[$i]['valor'] ?? '') }}">
        </div>
    </div>
    @endfor
</div>

<!-- Global Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activo', __('models/segmentos.fields.global').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('global', 0) !!}
        {!! Form::checkbox('global', 1, old('global', $contacto->global ?? 1)) !!}  &nbsp;
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactos.segmentos.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
