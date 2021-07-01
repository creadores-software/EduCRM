{!! Form::open(['route' => ['contactos.parentescos.destroy', $id], 'method' => 'delete']) !!}
{!! Form::hidden('idContacto',$idContacto) !!}
<div class='btn-group'>
    <a gloss="Ver contacto" href="{{ route('contactos.contactos.show', $idPariente) }}" class='mytooltip btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-user"></i>
    </a>
    <a href="{{ route('contactos.parentescos.show', [$id,'idContacto'=>$idContacto]) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('contactos.parentescos.editar')
    <a href="{{ route('contactos.parentescos.edit', [$id,'idContacto'=>$idContacto]) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-pencil"></i>
    </a>
    @endcan
    @can('contactos.parentescos.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
