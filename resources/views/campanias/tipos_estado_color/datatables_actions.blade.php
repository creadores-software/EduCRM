{!! Form::open(['route' => ['campanias.tiposEstadoColor.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('campanias.tiposEstadoColor.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('campanias.tiposEstadoColor.editar')
    <a href="{{ route('campanias.tiposEstadoColor.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endcan    
</div>
{!! Form::close() !!}
