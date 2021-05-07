{!! Form::open(['route' => ['formaciones.tiposAcceso.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('formaciones.tiposAcceso.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('formaciones.tiposAcceso.editar')
    <a href="{{ route('formaciones.tiposAcceso.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endcan
    @can('formaciones.tiposAcceso.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
