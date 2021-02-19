<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/segmentos.fields.nombre').':') !!}
    <p>{{ $segmento->nombre }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/segmentos.fields.descripcion').':') !!}
    <p>{{ $segmento->descripcion }}</p>
</div>

<!-- Filtros Field -->
<div class="form-group">
    {!! Form::label('filtros', __('models/segmentos.fields.filtros').':') !!}
    <p>
        @foreach ($segmento->filtros as $filtro)
            <b>{{ $filtro['campo'] }}</b>: {{ $filtro['valor'] }}<br />
        @endforeach
    </p>
</div>

<!-- Global Field -->
<div class="form-group col-sm-12" >
    {!! Form::label('global', __('models/segmentos.fields.global').':') !!}
    <p>{{ $segmento->global? 'Si' : 'No' }}</p>
</div>

<!-- Usuario Id Field -->
<div class="form-group">
    {!! Form::label('usuario_id', __('models/segmentos.fields.usuario_id').':') !!}
    <p>{{ $segmento->usuario->name }}</p>
</div>

