{!! Form::open(['route' => ['parametros.buyerPersonas.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('parametros.buyerPersonas.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('parametros.buyerPersonas.editar')
    <a href="{{ route('parametros.buyerPersonas.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endcan
    @can('parametros.buyerPersonas.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
