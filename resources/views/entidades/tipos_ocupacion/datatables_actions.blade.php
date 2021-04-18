{!! Form::open(['route' => ['entidades.tiposOcupacion.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('entidades.tiposOcupacion.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('entidades.tiposOcupacion.editar')
    <a href="{{ route('entidades.tiposOcupacion.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('entidades.tiposOcupacion.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
