{!! Form::open(['route' => ['contactos.contactos.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('contactos.contactos.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('contactos.contactos.editar')
    <a href="{{ route('contactos.contactos.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endcan
    @can('contactos.contactos.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
