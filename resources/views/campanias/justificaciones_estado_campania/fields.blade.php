{!! Form::hidden('idEstado',$idEstado) !!}
{!! Form::hidden('estado_campania_id',$idEstado) !!}
{!! Form::hidden('id', old('id', $justificacionEstadoCampania->id ?? '')) !!}

<!-- Nombre Field -->
<div class="form-group col-sm-6 required">
    {!! Form::label('nombre', __('models/justificacionesEstadoCampania.fields.nombre')) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campanias.justificacionesEstadoCampania.index',['idEstado'=>$idEstado]) }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
