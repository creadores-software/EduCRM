{!! Form::open(['route' => ['formaciones.camposEducacion.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('formaciones.camposEducacion.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('formaciones.camposEducacion.editar')
    <a href="{{ route('formaciones.camposEducacion.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endcan
    @can('formaciones.camposEducacion.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
