{!! Form::open(['route' => ['formaciones.reconocimientos.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('formaciones.reconocimientos.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('formaciones.reconocimientos.editar')
    <a href="{{ route('formaciones.reconocimientos.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endcan
    @can('formaciones.reconocimientos.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
