{!! Form::open(['route' => ['parametros.actitudesServicio.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('parametros.actitudesServicio.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('parametros.actitudesServicio.editar')
    <a href="{{ route('parametros.actitudesServicio.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endcan
    @can('parametros.actitudesServicio.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
