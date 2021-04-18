{!! Form::open(['route' => ['contactos.informacionesEscolares.destroy', $id], 'method' => 'delete']) !!}
{!! Form::hidden('idContacto',$idContacto) !!}
<div class='btn-group'>
    <a href="{{ route('contactos.informacionesEscolares.show', [$id,'idContacto'=>$idContacto]) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('contactos.informacionesEscolares.editar')
    <a href="{{ route('contactos.informacionesEscolares.edit', [$id,'idContacto'=>$idContacto]) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('contactos.informacionesEscolares.eliminar')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
