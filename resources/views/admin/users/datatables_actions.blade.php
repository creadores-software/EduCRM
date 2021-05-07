{!! Form::open(['route' => ['admin.users.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.users.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('admin.users.editar')
    <a href="{{ route('admin.users.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endcan
    @can('admin.users.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
