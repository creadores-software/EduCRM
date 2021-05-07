{!! Form::open(['route' => ['parametros.estadosDisposicion.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('parametros.estadosDisposicion.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('parametros.estadosDisposicion.editar')
    <a href="{{ route('parametros.estadosDisposicion.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endcan
    @can('parametros.estadosDisposicion.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
