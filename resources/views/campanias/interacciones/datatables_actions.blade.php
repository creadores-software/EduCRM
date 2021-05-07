{!! Form::open(['route' => ['campanias.interacciones.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('campanias.interacciones.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('campanias.interacciones.editar')
    <a href="{{ route('campanias.interacciones.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endcan
    @can('campanias.interacciones.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
